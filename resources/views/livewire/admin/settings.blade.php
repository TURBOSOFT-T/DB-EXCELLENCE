<?php

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Livewire\Attributes\{Layout, Validate};
use Illuminate\Validation\Rules\File;

use Livewire\WithFileUploads;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new #[Title('Settings')] #[Layout('components.layouts.admin')] class extends Component {
    use Toast;

    use WithFileUploads;

    #[Validate('required|max:10000')]
    public string $description;

    #[Validate('nullable|image|mimes:jpg,jpeg,png|max:1024')]
    public $logo;
    public string $logo2;
    public string $icon2;
    //public string $logocontact2;
    public ?string $logocontact2 = null;

    // public float $frais;

    #[Validate('nullable|image|mimes:jpg,jpeg,png|max:1024')]
    public  $icon;

    #[Validate('nullable|image|mimes:jpg,jpeg,png|max:1024')]
    public $logoHeader;
    
#[Validate('nullable|image|mimes:jpg,jpeg,png|max:1024')]
    public $logocontact;
   

    public string $telephone;
    public string $email;
    public string $addresse;
    public string $facebook = '';
    public string $instagram = '';
    public string $twitter = '';
    public string $linkedin = '';
    public string $tiktok = '';
    public string $youtube = '';




    public bool $maintenance = false;
    public Collection $settings;

    public function mount(): void
    {
        $setting = Setting::first();

        $this->logo2 = $setting->logo ?? '';
        $this->icon2 = $setting->icon ?? '';
        $this->logocontact2 = $setting->logocontact ?? '';
        //  $this->frais = $setting->frais  ?? '';
        $this->logoHeader = $setting->logoHeader ?? '';

        $this->description = $setting->description ?? '';
        $this->telephone = $setting->telephone ?? '';
        $this->email = $setting->email ?? '';
        $this->addresse = $setting->addresse ?? '';
        $this->facebook = $setting->facebook ?? '';
        $this->instagram = $setting->instagram ?? '';
        $this->twitter = $setting->twitter ?? '';
        $this->linkedin = $setting->linkedin ?? '';
        $this->tiktok = $setting->tiktok ?? '';
        // $this->pinterest = $setting->pinterest ?? '';
            //    $this->logocontact = $setting->logocontact ?? '';
        $this->youtube = $setting->youtube ?? '';

        $this->settings = Setting::all();

        $this->maintenance = App::isDownForMaintenance();
    }

    public function updatedMaintenance(): void
    {
        if ($this->maintenance) {
            Artisan::call('down', ['--secret' => env('APP_MAINTENANCE_SECRET')]);
        } else {
            Artisan::call('up');
        }
    }

    public function save()
    {
        $data = $this->validate();

        $setting = Setting::first();
        $setting->description = $this->description;
        $setting->telephone = $this->telephone;
        $setting->email = $this->email;
        $setting->addresse = $this->addresse;
        $setting->facebook = $this->facebook;
        $setting->instagram = $this->instagram;
        $setting->twitter = $this->twitter;
        $setting->linkedin = $this->linkedin;
        $setting->tiktok = $this->tiktok;
        $setting->youtube = $this->youtube;
      //  $setting->pinterest = $this->pinterest;

        if ($this->logo) {
          
            if ($this->logo2) {
                Storage::disk('public')->delete($this->logo2);
            }
            $setting->logo = $this->logo->store('parametre', 'public');
        }
        if ($this->logocontact) {
            //delete old logo
            if ($this->logocontact2) {
                Storage::disk('public')->delete($this->logocontact2);
            }
            $setting->logocontact = $this->logocontact->store('parametre', 'public');
        }

        if ($this->icon) {
            //delete old icon
            if ($this->icon2) {
                Storage::disk('public')->delete($this->icon2);
            }
            $setting->icon = $this->icon->store('parametre', 'public');
        }

        $setting->save();
        // Reset all fields after saving
  //  $this->reset(['description', 'telephone', 'email', 'addresse', 'logo', 'logo2', 'logoHeader', 'logoHeader2', 'icon', 'icon2']);


        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Paramètres enregistrés avec succès!',
        ]);

        $this->success(__('Settings updated successfully!'));
    }
};

?>

<div>
    <x-header title="{{ __('Settings') }}" separator progress-indicator>
        <x-slot:actions>
            <x-button icon="s-building-office-2" label="{{ __('Dashboard') }}" class="btn-outline lg:hidden"
                link="{{ route('admin') }}" />
        </x-slot:actions>
    </x-header>
    <x-card>
        <x-card separator class="mb-6 border-4 {{ $maintenance ? 'bg-red-300' : 'bg-zinc-100' }} border-zinc-950">
            <div class="flex items-center justify-between">
                <x-toggle label="{{ __('Maintenance Mode') }}" wire:model="maintenance" wire:change="$refresh" />
                @if ($maintenance)
                    <x-button label="{{ __('Go to bypass page') }}" link="/{{ env('APP_MAINTENANCE_SECRET') }}" />
                @endif
            </div>
        </x-card>
        <x-form wire:submit="save">
            <x-card separator class="border-4 bg-zinc-100 border-zinc-950">
                <div class="flex gap-6">
                    <div class="w-1/2">
                        <div class="mb-3">
                            <label class="block text-sm font-medium mb-2">Logo</label>
                           {{--  <x-file wire:model="logo" accept="image/*" crop-after-change>
                                <img src="{{ $setting->login ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
                            </x-file> --}}
                            <input type="file" wire:model="logo" accept="image/*" class="form-control w-full border rounded-lg p-2">
                            @error('logo')
                            <span class="text-red-600 text-sm"> {{ $message }} </span>
                            @enderror 
                        </div>
                    </div>
            
                    <div class="w-1/2">
                        <div class="mb-3">
                            <label class="block text-sm font-medium mb-2">Icone</label>
                            <input type="file" wire:model="icon" accept="image/*" class="form-control w-full border rounded-lg p-2">
                            @error('icon')
                            <span class="text-red-600 text-sm"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="w-1/2">
                        <div class="mb-3">
                            <label class="block text-sm font-medium mb-2">Image page contact</label>
                            <input type="file" wire:model="logocontact" accept="image/*" class="form-control w-full border rounded-lg p-2">
                            @error('logocontact')
                            <span class="text-red-600 text-sm"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </x-card>
            

            <x-card separator class="border-4 bg-zinc-100 border-zinc-950">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                        <x-input 
                            label="{{ __('Telephone') }}" 
                            wire:model="telephone" 
                            placeholder="Entrez le téléphone" 
                            class="h-12 text-lg w-full"
                        />
                        </div>
                    </div>
            
                    <div class="col-sm-6">
                        <div class="mb-3">
                        <x-input 
                            label="{{ __('Email') }}" 
                            wire:model="email" 
                            placeholder="Entrez l'email" 
                            class="h-12 text-lg w-full"
                        />
                        </div>
                    </div>
            
                   
                </div>
                <div class="w-1/2 min-w-[400px]">
                    <x-input 
                        label="{{ __('Adresse') }}" 
                        wire:model="addresse" 
                        placeholder="Entrez l'adresse" 
                        class="h-12 text-lg w-full"
                    />
                </div>
            </x-card>
            

            <x-card separator class="border-4 bg-zinc-100 border-zinc-950">
                <div class="flex gap-5">
                    <div class="w-1/4">
                        <x-input 
                            label="{{ __('Facebook') }}" 
                            wire:model="facebook" 
                            placeholder="Entrez le  facebook" 
                            class="h-12 text-lg w-full"
                        />
                    </div>
            
                    <div class="w-1/4">
                        <x-input 
                            label="{{ __('Tiktok') }}" 
                            wire:model="tiktok" 
                            placeholder="Entrez le tiktok" 
                            class="h-12 text-lg w-full"
                        />
                    </div>
                    <div class="w-1/4">
                        <x-input 
                            label="{{ __('Instagram') }}" 
                            wire:model="instagram" 
                            placeholder="Entrez instagram" 
                            class="h-12 text-lg w-full"
                        />
                    </div>

                    <div class="w-1/4">
                        <x-input 
                            label="{{ __('Youtube') }}" 
                            wire:model="youtube" 
                            placeholder="Entrez youtube" 
                            class="h-12 text-lg w-full"
                        />
    
                    </div>

                    <div class="w-1/2">
                        <x-input 
                            label="{{ __('Linkedin') }}" 
                            wire:model="linkedin" 
                            placeholder="Entrez linkedin" 
                            class="h-12 text-lg w-full"
                        />
                    </div> 
                   
    
                </div>

                
            </x-card>
            <x-card separator class="border-4 bg-zinc-100 border-zinc-950">


                <x-textarea label="{{ __('Description') }}" wire:model="description" placeholder="Entrez la description"
                    rows="3" cols="100" />
            </x-card>





            <x-slot:actions>
                <x-button label="{{ __('Save') }}" icon="o-paper-airplane" spinner="save" type="submit"
                    class="btn-primary" />
            </x-slot:actions>
        </x-form>

    </x-card>
</div>
