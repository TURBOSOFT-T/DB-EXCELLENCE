<?php

namespace App\Http\Controllers;

//require './vendor/autoload.php';


use App\Models\{commandes,config, User,produits, Category, Post, Product, Setting};
use App\Models\Banners;
use App\Models\templates;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ProduitRepository;
use App\Http\Requests\Front\SearchRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * The PostRepository instance.
     *
     * @var \App\Repositories\PostRepository
     */
    protected $postRepository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;

    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\PostRepository $postRepository
     * @return void
    */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->nbrPages = config('app.nbrPages.posts');
    }

    public function home()
    {
      
        $categories =Category::has('posts')->get();

      return view('front.index' ,compact('categories'));
    

    }

    public function shop(Request $request){
        $key = $request->input("key", null);
        $id_categorie = $request->get("id_categorie", null);
        $price_range = $request->input("price_range", null);
        $ordre_affichage = $request->input("ordre_affichage", null);
        
        $produits = Product::query();

        if(!is_null($key)){
            $produits->where('name', 'like', '%'.$key.'%')
            ->Orwhere('description', 'like', '%'.$key.'%');
        }
        if(!is_null($id_categorie)){
            $produits->where('category_id', $id_categorie);
        }
        if(!is_null($price_range)){
            $produits->whereBetween('price', explode('-', $price_range));
        }

        if($request->sort_by == 'lowest_price'){
            $$produits = Product::orderBy('price','asc')->get();
        }
        if($request->sort_by == 'highest_price'){
            $$produits = Product::orderBy('price','desc')->get();
        }
        if(!is_null($ordre_affichage)){
            //if is not null will be Asc or Desc
            $produits->orderBy('price', $ordre_affichage ? 'asc' : 'desc');
        }
        

        $produits = $produits->paginate(16);
        
        $total_produit = Product::count();
        $max_prix =Product::max('price');
      // $categories = Category::with('produits')->get();
   //   $categories =Category::has('produits')->get();

    //  $lastproduits = produits::latest()->take(5)->get();

      
    
   
        $configs= Setting::all();
        return view('front.shop.index',compact('produits', 'configs','key','total_produit','max_prix','ordre_affichage'));
    }



    public function blog(Request $request){
        $key = $request->input("key", null);
        $id_categorie = $request->get("category_id", null);
        $price_range = $request->input("price_range", null);
        $ordre_affichage = $request->input("ordre_affichage", null);
        
        $posts = Post::query();

        if(!is_null($key)){
            $posts->where('title', 'like', '%'.$key.'%')
            ->Orwhere('description', 'like', '%'.$key.'%');
        }
        if(!is_null($id_categorie)){
            $posts->where('category_id', $id_categorie);
        }
      
        

        $posts = $posts->orderBy('created_at', 'desc')
        ->paginate(6);
        $recentPosts = Post::latest()->take(5)->get();
        
        $total_post = Post::count();
        $popularPosts = Post::select('posts.*')
        ->selectSub(function ($query) {
            $query->selectRaw('COUNT(comments.id)')
                  ->from('comments')
                  ->whereColumn('comments.post_id', 'posts.id');
        }, 'comment_count')
        ->orderBy('comment_count', 'desc')
        ->limit(5)
        ->get();

        //$tags = Tag::all();
        $recentPostsWithTags = Post::select('*')
        ->latest()
        ->take(3)
        ->get();

       // dd($total_post);
       
      
      $categories =Category::has('posts')->get();

      $search = $request->search;
      $posts = Post::orderBy('created_at', 'desc')
      ->where('title', 'like', '%'.$search.'%')
      //  ->orWhere('body', 'like', '%'.$search.'%')
        ->paginate(10);
   /// $title = __('Produits nont trouvé avec la recherche: ') . '<strong>' . $search . '</strong>';
    
   
    
        return view('front.actualites.actualites',compact('recentPostsWithTags','posts', 'categories','key','total_post', 'recentPosts','popularPosts'));
    }


    public function posts($id)
    {
        $categories = Category::with('posts')->get();
        $current_category = Category::with('posts')->findOrFail($id);
       // $posts = $current_category->posts;
        $posts = $current_category->posts()->paginate(10);
        $recentPosts = Post::latest()->take(10)->get();
       // $products = $category->products()->paginate(10);
        return view('front.actualites.actualites', compact('recentPosts','current_category', 'categories', 'posts'));
    }

    public function details($id){
     
       $post = Post::with('comments')->findOrFail($id);
    
       $recentPosts = Post::latest()->take(10)->get();
       $comments = $post->comments()->with('user')->paginate(10);
   
      
        return view('front.actualites.details', compact('post', 'recentPosts', 'comments'));
    }
    public function detailsProduits($id){
     
        $produit = Product::findOrFail($id);
     
        
    
       
         return view('front.shop.details', compact('produit'));
     }
    public function searchs(SearchRequest $request)
    {
        $search = $request->search;
        $total_post = Post::count();
     //   $recentPosts = Post::latest()->take(5)->get();
        $categories = Category::has('posts')->get();
        $posts = Post::where('title', 'like', '%'.$search.'%')
          //  ->orWhere('body', 'like', '%'.$search.'%')
            ->paginate(10);
        $title = __('Produits nont trouvé avec la recherche: ') . '<strong>' . $search . '</strong>';
     
        return view('front.actualites.actualites', compact('total_post','posts', 'title','categories'));
    }
    
    public function show(Request $request, $slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        
       $recentPosts = Post::latest()->take(5)->get();
      // $comments = $post->comments()->with('user')->paginate(10);
      
 
        return view('front.actualites.details', compact('post', 'recentPosts'));
    }


 

    
    ///////////Login///////////////////////////////////////////////////
    public function login()
    {
        return view('auth.login');
    }

    
   


    public function register()
    {
        return view('auth.register');
    }


    public function contact()
    {
        return view('front.contact.contact');
    }
 public function about(){
    return view('front.about.about');
 }
    


}
