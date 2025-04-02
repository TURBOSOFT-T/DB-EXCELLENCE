<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
class AddContact extends Component
{


      
    public $name = '';
   // public $telephone = '';
    public $email = '';
   public $sujet ='';
    public $message = '';
  //  public $age = '';




    public function save()
    {
        $this->validate([
            'email' => 'required|email',
            'name' => 'required|max:200|string',
            'sujet' => 'required|max:200|string',
            'message' => 'required|max:5000|string',
          //  'telephone' => 'required|numeric',
        //    'age' => 'required|max:200',
          
        ], [
            'email.required' => 'Veuillez entrer votre email',
            'name.required' => 'Veuillez entrer votre name',
            'sujet.required' => 'Veuillez entrer votre sujet',
            'message.required' => 'Veuillez entrer votre message',
         
          
        ]);

        $contact = new Contact();
        $contact->email = $this->email;
        $contact->name = $this->name;
        $contact->sujet = $this->sujet;
        $contact->message = $this->message;
       // $contact->telephone = $this->telephone;
       // $contact->age = $this->age;
   

        if ($contact->save()) {
          
           
          
            $this->reset(
                [
                    'email',
                    'name',
                    'sujet',
                    'message',
               //     'telephone',
                 //   'age',
                  
                
                ]
            );
            session()->flash('success', 'Votre message a été envoyé avec succès');
            return redirect()->back();
        } else {
            session()->flash('error', 'Une erreur est survenue lors de l\'envoi de votre message');
            return;
        }
    }
    public function render()
    {
        return view('livewire.contacts.add-contact');
    }
}
