<div>
    <div>
        @livewireStyles
    
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
        <form id="contact-form" wire:submit.prevent="save" class="rainbow-dynamic-form max-width-auto">
            @csrf
            <div class="form-group">
                <input wire:model.lazy="name" type="text"  name="name" >
                @error('name')
                <span class="small text-danger">
                    {{ $message }}
                </span>
            @enderror
                <label> Votre Nom</label>
                <span class="focus-border"></span>
            </div>
            <div class="form-group">
                <input wire:model.lazy="email" type="email" name="email">
                @error('email')
                <span class="small text-danger">
                    {{ $message }}
                </span>
            @enderror
                <label> Votre Email</label>
                <span class="focus-border"></span>
            </div>
            <div class="form-group">
                <input wire:model.lazy="sujet" type="text" name="sujet" >
            @error('sujet')
            <span class="small text-danger">
                {{ $message }}
            </span>
        @enderror
                <label>Votre Subjet</label>
                <span class="focus-border"></span>
            </div>
            <div class="form-group">
                <textarea  wire:model.lazy="message" rows="10" cols="30"   ></textarea>
                @error('message')
                        <span class="small text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                <label>Message</label>
                <span class="focus-border"></span>
            </div>
            <div class="form-submit-group">
                <button name="submit" type="submit" id="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">Envoyer</span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
