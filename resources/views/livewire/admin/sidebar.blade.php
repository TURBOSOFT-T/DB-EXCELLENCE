<?php

use Illuminate\Support\Facades\{Auth, Session};
use Livewire\Volt\Component;

new class() extends Component {
	public function logout(): void
	{
		Auth::guard('web')->logout();

		Session::invalidate();
		Session::regenerateToken();

		$this->redirect('/');
	}
}; ?>

<div style="background-color: #c4bfac; color: rgb(15, 15, 15);">
    
    <x-menu activate-by-route>
        <x-menu-separator />
        <x-list-item :item="Auth::user()" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
            <x-slot:actions>
                <x-button icon="o-power" wire:click="logout" class="btn-circle btn-ghost btn-xs"
                    tooltip-left="{{ __('Logout') }}" no-wire-navigate />
            </x-slot:actions>
        </x-list-item>
        <x-menu-separator />
        <x-menu-item title="{{ __('Dashboard') }}" icon="s-building-office-2"  link="{{ route('admin') }}" />
        <x-menu-sub title="{{ __('Posts') }}" icon="s-document-text">
            <x-menu-item title="{{ __('All posts') }}" link="{{ route('posts.index') }}" />
            <x-menu-item title="{{ __('Add a post') }}" link="{{ route('posts.create') }}" />
            @if (Auth::user()->isAdmin())
                <x-menu-item title="{{ __('Categories') }}" link="{{ route('categories.index') }}" />
            @endif
        </x-menu-sub>
        @if (Auth::user()->isAdmin())
            <x-menu-sub title="{{ __('Pages') }}" icon="s-document">
                <x-menu-item title="{{ __('All pages') }}" link="{{ route('pages.index') }}" />
                <x-menu-item title="{{ __('Add a page') }}" link="{{ route('pages.create') }}" />
            </x-menu-sub>
            <x-menu-item icon="s-user" title="{{ __('Accounts') }}" link="{{ route('users.index') }}" />
           

        @endif
        <x-menu-item icon="s-building-storefront" title="{{ __('Catalog') }}" link="{{ route('admin.products.index') }}" />
        <x-menu-item title="{{ __('Order status') }}" icon="m-eye" link="{{ route('admin.parameters.states.index') }}" />
        <x-menu-item title="{{ __('Countries') }}" icon="c-map-pin" link="{{ route('admin.parameters.countries.index') }}" />
      
        <x-menu-sub title="{{ __('Shipments') }}" icon="s-truck">
            <x-menu-item title="{{ __('Ranges') }}" icon="o-circle-stack" link="{{ route('admin.parameters.shipping.ranges') }}" />
            <x-menu-item title="{{ __('Rates') }}" icon="s-currency-euro" link="{{ route('admin.parameters.shipping.rates') }}" />
        </x-menu-sub>
         <x-menu-item title="{{ __('Orders') }}" icon="s-shopping-bag" link="{{ route('admin.orders.index') }}" />
         <x-menu-sub title="{{ __('Customers') }}" icon="s-users">
            <x-menu-item title="{{ __('Datas') }}" icon="s-list-bullet" link="{{ route('admin.customers.index') }}" />
            <x-menu-item title="{{ __('Addresses') }}" icon="c-map-pin" link="{{ route('admin.addresses') }}" />
        </x-menu-sub>
        <x-menu-item icon="c-chat-bubble-left" title="{{ __('Comments') }}" link="{{ route('comments.index') }}" />
        @if (Auth::user()->isAdmin())
            {{-- <x-menu-sub title="{{ __('Menus') }}" icon="m-list-bullet">
                <x-menu-item title="{{ __('Navbar') }}" link="{{ route('menus.index') }}" />
                <x-menu-item title="{{ __('Footer') }}" link="{{ route('menus.footers') }}" />
            </x-menu-sub> --}}
          {{--   <x-menu-item icon="c-photo" title="{{ __('Images') }}" link="{{ route('images.index') }}" /> --}}
         {{--    <x-menu-item icon="m-cog-8-tooth" title="{{ __('Settings') }}" link="{{ route('settings') }}" :class="App::isDownForMaintenance() ? 'bg-red-300' : ''" />
      --}}     {{--   <x-menu-item title="{{ __('Maintenance') }}" icon="c-wrench-screwdriver" link="{{ route('admin.maintenance') }}" :class="App::isDownForMaintenance() ? 'bg-red-300' : ''" />
         --}}    <x-menu-item title="{{ __('Statistics') }}" icon="s-chart-pie" link="{{ route('admin.stats') }}" /> 

         <x-menu-sub title="{{ __('Settings') }}" icon="s-cog-8-tooth">
            <x-menu-item title="{{ __('Store') }}" icon="c-building-storefront" link="{{ route('admin.parameters.store') }}" />
            <x-menu-item icon="c-photo" title="{{ __('Images') }}" link="{{ route('images.index') }}" />
            <x-menu-item icon="m-cog-8-tooth" title="{{ __('Settings') }}" link="{{ route('settings') }}" :class="App::isDownForMaintenance() ? 'bg-red-300' : ''" />

           
        </x-menu-sub>
        @endif
        <x-menu-item icon="m-arrow-right-end-on-rectangle" title="{{ __('Go on site') }}" link="/" />
        {{-- <x-menu-item>
            <x-theme-toggle />
        </x-menu-item> --}}

     {{--    <x-theme-toggle /> --}}

<x-theme-toggle class="btn" @theme-changed="console.log($event.detail)" />
     
    </x-menu>
</div>