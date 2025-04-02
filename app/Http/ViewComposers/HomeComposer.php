<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{Category, Setting, Post, Product};

class HomeComposer
{
 
    public function compose(View $view)
    {
        $view->with([
          //  'categories' => Category::has('produits')->take(6)->get(),
          'posts' => Post::orderBy('created_at', 'desc')->take(9)->get(),
          'total_posts' => Post::count(),
          'total_categories' => Category::count(),
         
        'produits' =>Product::orderBy('created_at', 'asc')->take(15)->get(),
    

          'categorie'=>Category::all(),
            'configs' => Setting::all(),
           
        ]);
    }
}