@extends('front.fixe')
@section('titre', 'Contact')
@section('body')


    <main>
        @php

            $config = DB::table('settings')->first();
            $configs = DB::table('settings')->first();
        @endphp



 <!-- End Side Vav -->
 <a class="close_side_menu" href="javascript:void(0);"></a>

 <div class="rbt-conatct-area bg-gradient-11 rbt-section-gap">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title text-center mb--60">
                     <span class="subtitle bg-secondary-opacity">Contactez nous</span>
                     
                 </div>
             </div>
         </div>
         <div class="row g-5">
             <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                 <div class="rbt-address">
                     <div class="icon">
                         <i class="feather-headphones"></i>
                     </div>
                     <div class="inner">
                         <h4 class="title">Téléphone</h4>
                         <p><a
                            href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}"
                            target="_blank">
                            {{ $config->telephone ?? '' }}
                            <i class="fab fa-whatsapp"></i>

                        </a></p>
                        
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                 <div class="rbt-address">
                     <div class="icon">
                         <i class="feather-mail"></i>
                     </div>
                     <div class="inner">
                         <h4 class="title">Notre Email</h4>
                         <p> @if ($config->email)
                         
                                <span>E-mail:</span>
                                <a href="mailto:{{ $config->email }}"
                                    target="_blank">{{ $config->email }}</a>
                           
                        @endif</p>
                         
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                 <div class="rbt-address">
                     <div class="icon">
                         <i class="feather-map-pin"></i>
                     </div>
                     <div class="inner">
                         <h4 class="title">Notre Location</h4>
                         <p>{{$config->addresse}}</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="rbt-contact-address">
     <div class="container">
         <div class="row g-5">
             <div class="col-lg-6">
                 <div class="thumbnail">
                     <img class="w-100 radius-6" src="{{ Storage::url($config->logocontact ?? '') }}" alt="Contact Images">
                 </div>
             </div>

             <div class="col-lg-6">
                 <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                     <div class="section-title text-start">
                         <span class="subtitle bg-primary-opacity">La formation pour tout le monde</span>
                     </div>
                     <h3 class="title">Laissez un message </h3>
                     
                      @livewire('contacts.add-contact')  
                 </div>
             </div>
         </div>
     </div>
 </div>


 
        <style>
            .tp-contact-2-text {
                height: 30px !important;
            }
        </style>
    
    </main>
@endsection