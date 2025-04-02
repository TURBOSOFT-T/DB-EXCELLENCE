<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\panier_client;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('front.index');
}); */

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/login', [HomeController::class, 'login'])->name('login');
//Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/register', [HomeController::class,'register'])->name('register');
Route::get('contacts', [HomeController::class,'contact'])->name('contact');


////////////Posts//////

///////Blogs
Route::prefix('posts')->group(function () {
    Route::name('posts.display')->get('{slug}', [HomeController::class, 'show']);




    Route::name('posts.comments')->get('{post}/comments', [HomeController::class, 'comments']);
    Route::name('posts.comments.store')->post('{post}/comments', [HomeController::class, 'store'])->middleware('auth');
});
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('details-blog/{id}/{slug}', [HomeController::class, 'details'])->name('details-blog');
Route::get('/category/{id}', [HomeController::class, 'posts'])->where('id', '[0-9]+');
Route::name('front.comments.destroy')->delete('comments/{comment}', [HomeController::class, 'destroy']);

Route::middleware('auth')->group(function () {
 //   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 //   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  //  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 ///gestion boutique
 Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
 Route::get('ordres-croissant', [HomeController::class, 'croissant'])->name('ordres.croissant');
 Route::post('/shop', [HomeController::class, 'shop']);
 Route::get('/category/{id}', [HomeController::class, 'products'])->where('id', '[0-9]+');
 Route::get('/decroissant', [HomeController::class, 'decroissant'])
 ->name('decroissant');
 Route::get('/croissant', [HomeController::class, 'croissant'])
 ->name('croissant');
 Route::get('/promotion', [HomeController::class, 'promotion'])
 ->name('promotion');
 //Route::get('/search-product',[HomeController::class,'search_products'])->name('search.products');
 Route::get('/sort-by',[HomeController::class,'sort_by'])->name('sort.by');
 Route::get('search', [HomeController::class, 'search'])->name("search");

 
 
//////Products////////////////////
Route::get('/details-produits/{id}/{slug}', [HomeController::class, 'detailsProduits'])->name('details-produits');


////////Commandes////////////////////
Route::get('/commander', [CommandeController::class, 'commander'])->name('commander');
Route::post('/order', [CommandeController::class, 'confirmOrder'])->name('order.confirm');
Route::get('/thank-you', [CommandeController::class, 'index'])->name('thank-you');


//gestion du panier
Route::get('cart', [panier_client::class, 'cart'])->name('cart');
Route::post('/client/ajouter_au_panier', [panier_client::class, 'add']);
Route::get('/client/count_panier', [panier_client::class, 'count_panier']);
Route::get('/client/mon_panier', [panier_client::class, 'contenu_mon_panier']);
Route::get('/client/delete_produit_au_panier', [panier_client::class, 'delete_produit']);


use Livewire\Volt\Volt;
use App\Http\Middleware\{IsAdmin, IsAdminOrRedac};

//Volt::route('/', 'index');
Volt::route('/category/{slug}', 'index');
Volt::route('/posts/{slug}', 'posts.show')->name('posts.show');
Volt::route('/search/{param}', 'index')->name('posts.search');
Volt::route('/pages/{page:slug}', 'pages.show')->name('pages.show');

Route::middleware('guest')->group(function () {
//	Volt::route('/register', 'auth.register');
   // Volt::route('/login', 'auth.login')->name('login');
	Volt::route('/forgot-password', 'auth.forgot-password');
    Volt::route('/reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {
	Route::prefix('order')->group(function () {
		Volt::route('/creation', 'order.index')->name('order.index');
	});

	Route::prefix('account')->group(function () {
		Route::get('dashboard', [CompteController::class,'compte'])->name('compte');

	//	Volt::route('/profile', 'account.profile')->name('profile');
		Volt::route('/rgpd', 'account.rgpd.index')->name('rgpd');
		Volt::route('/addresses', 'account.addresses.index')->name('addresses');
		Volt::route('/addresses/create', 'account.addresses.create')->name('addresses.create');
		Volt::route('/addresses/{address}/edit', 'account.addresses.edit')->name('addresses.edit');
		Volt::route('/orders', 'account.orders.index')->name('orders');
		Volt::route('/orders/{order}', 'account.orders.show')->name('orders.show');

	
	});

///	Volt::route('/profile', 'auth.profile')->name('profile');
	Volt::route('/favorites', 'index')->name('posts.favorites');
	Route::middleware(IsAdminOrRedac::class)->prefix('admin')->group(function () {
		 /////Orders//////
		// Volt::route('/orders', 'admin.orders.index')->name('admin.orders.index');
		// Volt::route('/torders', 'admin.orders.tindex')->name('admin.torders.tindex');
		/*  Volt::route('/orders/{order}', 'admin.orders.show')->name('admin.orders.show'); */
		
	
	//	 Volt::route('/customers', 'admin.customers.index')->name('admin.customers.index');
	//	Volt::route('/customers/{user}', 'admin.customers.show')->name('admin.customers.show');
	//	Volt::route('/addresses', 'admin.customers.addresses')->name('admin.addresses');
		Volt::route('/products', 'admin.products.index')->name('admin.products.index');
		Volt::route('/products/create', 'admin.products.create')->name('admin.products.create');
		Volt::route('/products/{product}/edit', 'admin.products.edit')->name('admin.products.edit');
		Volt::route('/store', 'admin.parameters.store')->name('admin.parameters.store');
		Volt::route('/states', 'admin.parameters.states.index')->name('admin.parameters.states.index');
		Volt::route('/states/create', 'admin.parameters.states.create')->name('admin.parameters.states.create');
		Volt::route('/states/{state}/edit', 'admin.parameters.states.edit')->name('admin.parameters.states.edit');
		Volt::route('/countries', 'admin.parameters.countries.index')->name('admin.parameters.countries.index');
		Volt::route('/countries/{country}/edit', 'admin.parameters.countries.edit')->name('admin.parameters.countries.edit');
		Volt::route('/ranges', 'admin.parameters.shipping.ranges')->name('admin.parameters.shipping.ranges');
		Volt::route('/rates', 'admin.parameters.shipping.rates')->name('admin.parameters.shipping.rates');
		Volt::route('/maintenance', 'admin.maintenance')->name('admin.maintenance');
		Volt::route('/dashboard', 'admin.index')->name('admin');
		Volt::route('/posts/index', 'admin.posts.index')->name('posts.index');
		Volt::route('/posts/create', 'admin.posts.create')->name('posts.create');
		Volt::route('/posts/{post:slug}/edit', 'admin.posts.edit')->name('posts.edit');
		Volt::route('/comments/index', 'admin.comments.index')->name('comments.index');
		Volt::route('/comments/{comment}/edit', 'admin.comments.edit')->name('comments.edit');
		Route::middleware(IsAdmin::class)->group(function () {
			
			Volt::route('/torders', 'admin.orders.tindex')->name('admin.torders.tindex');
		Volt::route('/orders', 'admin.orders.index')->name('admin.orders.index');
		Volt::route('/orders/{order}', 'admin.orders.show')->name('admin.orders.show');
		Volt::route('/customers', 'admin.customers.index')->name('admin.customers.index');
		Volt::route('/customers/{user}', 'admin.customers.show')->name('admin.customers.show');
		Volt::route('/addresses', 'admin.customers.addresses')->name('admin.addresses');

			Volt::route('/categories/index', 'admin.categories.index')->name('categories.index');
			Volt::route('/categories/{category}/edit', 'admin.categories.edit')->name('categories.edit');
			Volt::route('/pages/index', 'admin.pages.index')->name('pages.index');
			Volt::route('/pages/create', 'admin.pages.create')->name('pages.create');
			Volt::route('/pages/{page:slug}/edit', 'admin.pages.edit')->name('pages.edit');
			Volt::route('/users/index', 'admin.users.index')->name('users.index');
			Volt::route('/users/{user}/edit', 'admin.users.edit')->name('users.edit');
			Volt::route('/menus/index', 'admin.menus.index')->name('menus.index');
			Volt::route('/menus/{menu}/edit', 'admin.menus.edit')->name('menus.edit');
			Volt::route('/submenus/{submenu}/edit', 'admin.menus.editsub')->name('submenus.edit');
			Volt::route('/footers/index', 'admin.menus.footers')->name('menus.footers');
			Volt::route('/footers/{footer}/edit', 'admin.menus.editfooter')->name('footers.edit');
			Volt::route('/images/index', 'admin.images.index')->name('images.index');
			Volt::route('/images/{year}/{month}/{id}/edit', 'admin.images.edit')->name('images.edit');
			Volt::route('/settings', 'admin.settings')->name('settings');
			Volt::route('/states', 'admin.parameters.states.index')->name('admin.parameters.states.index');
			Volt::route('/products/promotion', 'admin.products.promotion')->name('admin.products.promotion');
			Volt::route('/stats', 'admin.stats')->name('admin.stats');
			Volt::route('/store', 'admin.parameters.store')->name('admin.parameters.store');
		});
	});
});


require __DIR__.'/auth.php';
