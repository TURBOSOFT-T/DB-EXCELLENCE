<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
   {{--  <form wire:submit='connexion'>

    
        @if (session()->has('error'))
            <div class="alert alert-danger p-3 small">
                {{ session('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success p-3 small">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="form-group mb-6">
            <label for="user_login_email">Adresse email</label>
            <input type="email" class="form-control" id="user_login_email" wire:model="email" placeholder="Email Address" />
            @error('email')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <br>
        <div class="form-group mb-6">
            <label for="user_login_password">Mot de passe</label>
            <input type="password" class="form-control" id="user_login_password" placeholder="Password"
                wire:model="password" />
            @error('password')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary w-100 mb-7">
            <span wire:loading>
                <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
            </span>
            <i class="ri-git-repository-private-line"></i>
            Connexion
        </button>
        <br>
        <hr>
    </form> --}}


    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Connexion</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="#">Accueil</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Connexion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row justify-content-md-center">


                <div class="col-lg-6" style="background-color:rgba(67, 62, 54, 0.06);">
                    <div class="d-flex justify-content-center" style="background-color:rgba(204, 158, 82, 0.06);">
                        <br><br>
                        {{-- <a href="#">
                            <img src="{{ url('public/Image/parametres/' . $config->logo) }}" alt=""
                                width="100" height="100">
                        </a> --}}
                    </div>

                    <div class="rbt-contact-form contact-form-style-1 max-width-auto"
                        style="background-color:rgba(124, 111, 90, 0.06);">

                        <h4 class="row justify-content-md-center" class="title">Login</h4>
                        <h6 class="row justify-content-md-center">Pour se connecter, veuillez saisir votre e-mail et
                        </h6>
                        <h6 class="row justify-content-md-center"> votre mot de passe</h6>

                        @if (session()->has('error'))
                            <div class="alert alert-danger p-3 small">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success p-3 small">
                                {{ session('success') }}
                            </div>
                        @endif


                        <form class="max-width-auto" wire:submit.prevent='connexion'>
                            @csrf
                            <div class="form-group">
                                <input type="email" value="{{ old('email') }}"  wire:model.lazy="email"
                                    autofocus />
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <label>Votre Email *</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-group">
                                <input type="password"  wire:model.lazy="password"
                                     />
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <label>Mot de passe *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="row mb--30">
                                <div class="col-lg-6">
                                    <div class="rbt-checkbox">
                                        <input type="checkbox" id="rememberme" name="rememberme">
                                        <label for="rememberme">Se souvenir de moi</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="rbt-lost-password text-end">
                                        <a class="rbt-btn-link"  {{-- href="{{ route('forgotpassword') }}" --}}>Mot de passes perdu?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Connexion</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                        <br>

                        <p class="text-center">
                            <span>Nouvelle su notre platform?</span>
                            <a href="{{ route('register') }}">
                                <span>Créer un compte</span>
                            </a>
                        </p>
                    </div>
                </div>



            </div>
        </div>
    </div>

    
</div>
