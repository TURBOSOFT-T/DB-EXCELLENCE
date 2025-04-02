<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\configs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class panier_client extends Controller
{
    
    public function count_panier()
    {
        // Vérifier si la session 'panier' existe, sinon initialiser une session vide
        if (!session()->has('cart')) {
            session(['cart' => []]);
        }

        // Récupérer le panier de la session
        $panier_temporaire = session('cart');
        $total = count($panier_temporaire);
        $montant_total = 0;
        $Html = "";
        $produits = [];

        foreach ($panier_temporaire as $data) {
          /*   $produit = Product::select('id','image','price','name')->find($data['product_id']); */
          $produit = Product::select('id', 'image', 'price', 'promotion_price', 'promotion_start_date', 'promotion_end_date', 'name')
            ->find($data['product_id']);

            if ($produit) {
                // Calculer le prix promotionnel si nécessaire
                $prix = $produit->price;
                if ($produit->promotion_price && now()->between($produit->promotion_start_date, $produit->promotion_end_date)) {
                    $prix = $produit->promotion_price;
                }

                $total_produit = $data["quantity"] * $prix;
                $montant_total += $total_produit;
    
                /* $produits[] = [
                    'product_id' => $produit->id,
                    'name' => $produit->name,
                    'image' => Storage::url($produit->image),
                    'quantity' => $data['quantity'],
              
                    'price' => $produit->price,
                    'total' => $data["quantity"] * $produit->price,
                ]; */

                $produits[] = [
                    'product_id' => $produit->id,
                    'name' => $produit->name,
                //   'image' => Storage::url($produit->image),
                   'image' => $produit->image,
                    'quantity' => $data['quantity'],
                    'price' => $prix,
                    'total' => $total_produit,
                ];
                $montant_total += $data["quantity"] * $produit->price;
            }
            $Html = view('components.cart',['produits' => $produits])->render();
        }
       

        return response()->json(
            [
                "total" => $total,
                "html" => $Html,
               "montant_total" => $montant_total 
          //   "montant_total" => number_format($montant_total, 2, '.', ' ') // Format du montant

            ]
        );
    }


 
    public function updateQuantity(Request $request)
    {
        $panier = session('cart', []);
    
        foreach ($panier as &$item) {
            if ($item['product_id'] == $request->product_id) {
                $item['quantity'] = max(1, intval($request->quantity));  // Assurer que la quantité est au moins 1
                break;
            }
        }
    
        session(['cart' => $panier]);
    
        // Retourner la mise à jour du panier
        return $this->count_panier();
    }
    


    public function cart()
    {
      //  $configs = configs::first();
        return view('front.cart.cart');
    }



    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        $type = $request->input('type', 'produit');
        $quantity = $request->input('quantity', 1);
        

        $user = Auth::user();


        $produit = Product::where('id', $product_id)
            ->first();


        //verifier que le produit existe et est disponible
        if (!$produit) {
            return response()->json([
                'statut' => false,
             'message' => __('messages.product_not_found'),
            ]);
        }


        /* if ($produit->statut == "disponible") {
            return response()->json([
                'statut' => false,
                'message' => __('messages.product_not_found'),
            ]);
        }
 */
        
 if ($produit->quantity < $quantity) {
    return response()->json([
        'statut' => false,
        'message' => "Quantité insuffisante en stock !",
    ]);
}


        //verifier que le stock demander est disponible
     /*    if ($produit->stock < $quantity) {
            return response()->json([
                'statut' => false,
                'message' => "Quantité insuffisante en stock !",
            ]);
        }
 */
       


        $panier = session('cart', []);
        $produit_existe = false;

        foreach ($panier as &$item) {
            if ($item['product_id'] == $product_id) {
                $item['quantity'] += $quantity;
                
                $produit_existe = true;
                break;
            }
        }

        if (!$produit_existe) {
            $panier[] = [
                'product_id' => $product_id,
                'quantity' => $quantity,
            ];
        }

        session(['cart' => $panier]);

        return response()->json([
            'statut' => true,
            'message' => __('messages.product_added_to_cart'),
        ]);
    }


    public function delete_produit(Request $request)
    {
        
        $product_id = $request->input('product_id');
        $panier = session('cart', []);
        foreach ($panier as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($panier[$key]);
                break;
            }
        }
        session(['cart' => $panier]);
        return response()->json([
            "statut" => true,
            'message' => __('messages.product_removed'),
        ]);
    }



    public function update($product_id, $quantity)
{
    // Find the product in the session cart and update the quantity
    $cart = session()->get('cart', []);

    foreach ($cart as &$item) {
        if ($item['product_id'] == $product_id) {
            $item['quantity'] = $quantity;
            break;
        }
    }

    // Save the updated cart back to session
    session(['cart' => $cart]);

    // Optionally, re-render the component or update the cart total
    $this->emit('cartUpdated');
}






}
