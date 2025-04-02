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

class CompteController extends Controller
{

    public function compte()
    {
      
      $user = auth()->user(); 

      $commandes = $user->commandes; // Supposons que la relation commandes existe
      $adresses = $user->adresses; // Supposons que la relation adresses existe
  

      return view('front.comptes.dashboard', compact('user', 'commandes', 'adresses'));
    

    }

 


}
