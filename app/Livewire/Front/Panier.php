<?php

namespace App\Livewire\Front;

use App\Models\Product;

use Livewire\Component;

class Panier extends Component
{
    public $total =0;

  //  public $paniers = [];

    public function mount()
    {
        // Récupérer les produits dans le panier à partir de la session
     //   $this->paniers = session()->get('cart', []);
    }


    public function updateQuantity($productId, $quantity)
    {

        $paniers = [];
        // Valider la quantité
        if ($quantity <= 0) {
            session()->flash('error', 'La quantité doit être supérieure à zéro.');
            return;
        }

        // Mettre à jour la quantité dans la session
        if (isset($this->paniers[$productId])) {
            $this->paniers[$productId]['quantity'] = $quantity;

            session()->put('cart', $this->paniers); // Sauvegarder dans la session
        }

        // Optionnel : Actualiser la page ou le panier
      //  $this->emit('cartUpdated'); // Émettre un événement si nécessaire
    }

    public function render()
{
    // Récupérer le panier de la session
    $paniers_session = session('cart', []);

    // Vérifier que $paniers_session est bien un tableau
    if (!is_array($paniers_session)) {
        $paniers_session = [];
    }

    $paniers = [];

    // Boucler uniquement si $paniers_session est un tableau valide
    foreach ($paniers_session as $session) {
        $produit = Product::find($session['product_id']);
        if ($produit) {
            $paniers[] = [
                'name' => $produit->name,
                'product_id' => $produit->id,

                'image' => $produit->image,
                'quantity' => $session['quantity'],
                'price' => $produit->price,
                'total' => $session['quantity'] * $produit->price,
            ];
            $this->total += $session['quantity'] * $produit->price;
        } else {
            // Supprimer l'élément du panier s'il n'existe plus
            $this->delete($session['product_id']);
        }
    }

  //  dd($paniers_session);


    return view('livewire.front.panier', compact("paniers"));
}




    public function update($product_id,$quantity){
        //find produit in session car and update quantity
        $panier = session('cart', []);
        $produit_existe = false;

        foreach ($panier as &$item) {
            if ($item['product_id'] == $product_id) {
                $item['quantity'] = $quantity;
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

        $this->total =0 ;
    }





    public function delete($product_id){
        //delete produit from cart
        $panier = session('cart', []);
        $produit_existe = false;

        foreach ($panier as $key => &$item) {
            if ($item['product_id'] == $product_id) {
                unset($panier[$key]);
                $produit_existe = true;
                break;
            }
        }

        if (!$produit_existe) {
            $panier[] = [
                'product_id' => $product_id,
                'quantity' => 1,
            ];
        }

        session(['cart' => $panier]);

        $this->total =0 ;
    }




}

