<div>

{{--     @php
        $config = DB::table('configs')->first();

    @endphp --}}




    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row justify-content-md-center">


                <div class="col-lg-6" style="background-color:rgba(67, 62, 54, 0.06);">
                    <div class="d-flex justify-content-center" style="background-color:rgba(204, 158, 82, 0.06);">
                       {{--  <a href="#">
                            <img src="{{ url('public/Image/parametres/' . $config->logo) }}" alt="" width="5"
                                height="5">
                        </a> --}}
                    </div>

                    <div class="rbt-contact-form contact-form-style-1 max-width-auto"
                        style="background-color:rgba(124, 111, 90, 0.06);">

                        <h4 class="row justify-content-md-center" class="title">{{ csrf_field() }}Création compte</h4>


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

                        @if ($isRegistered)
                            <div class="alert alert-success">
                                Votre compte a été créé avec succès!!
                            </div>
                        @else
                            <form class="max-width-auto" wire:submit.prevent='save'>
                                <div class="form-group">
                                    <input type="text" value="{{ old('name') }}" id="name"
                                        wire:model.lazy="name" autofocus />
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <label>Votre nom *</label>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="form-group">
                                    <input type="email" value="{{ old('email') }}" id="email"
                                        wire:model.lazy="email" autofocus />
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <label>Votre Mail *</label>
                                    <span class="focus-border"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password"  wire:model.lazy="password"
                                        aria-describedby="password" />
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <label>Mot de passe *</label>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="form-group">

                                    <div class="input-group input-group-merge">
                                        <input type="password"  wire:model="password_confirmation"
                                            aria-describedby="password_confirmation" required />
                                        @if ($errors->has('password_confirmation'))
                                            <span
                                                class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                        <label>Confirmez votre mot de passe *</label>
                                    </div>
                                </div>

                                <div class="row mb--30">
                                    <div class="col-lg-6">
                                        <div class="rbt-checkbox">
                                            <input type="checkbox" id="rememberme" name="rememberme">
                                            <label for="rememberme">Se souvenir de moi</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-submit-group">
                                    @if ($errors->any())
                                        <div class="alert alert-danger small">
                                            @foreach ($errors->all() as $error)
                                                - {{ $error }} <br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                      {{--   <span wire:loading>
                                            <img src="https://i.gifer.com/ZKZg.gif" height="15" alt=""
                                                srcset="">
                                        </span>
                                        <i class="ri-save-line me-1 fs-16 lh-1"></i> --}}
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Confirmation</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        @endif

                        <br>


                        <p class="text-center">
                            <span>Avez-vous déjà un compte?</span>
                            <a href="{{ route('login') }}">
                                <span>Se connecter</span>
                            </a>
                        </p>

                    </div>
                </div>



            </div>
        </div>
    </div>



</div>