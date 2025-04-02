<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\{Order, Product, User};
use Carbon\Carbon;

new #[Title('Statistics')] #[Layout('components.layouts.admin')] class extends Component {
    public bool $openGlance = true;
    public bool $openOrders = false;
    public bool $openUsers = false;
    public bool $openProducts = false;
    public array $ordersChart = [];
    public array $productsChart = [];

    public array $usersChart = [];

    public int $selectedYear;
    public array $years = [];

    public function mount(): void
    {
        $this->selectedYear = date('Y');
        $olderYear = Order::whereRelation('state', 'indice', '>', 3)->oldest()->first()->created_at->format('Y');

        $this->years = [];
        for ($year = now()->format('Y'); $year >= $olderYear; $year--) {
            $this->years[] = ['id' => $year, 'name' => $year];
        }
        $this->updatedSelectedYear();
    }

    public function updatedSelectedYear()
    {
        $this->orders = Order::whereYear('created_at', $this->selectedYear)->whereRelation('state', 'indice', '>', 3)->with('products')->get();

        $this->ordersChart = $this->getOrdersChart();
        $this->productsChart = $this->getProductsChart();

        $this->users = User::whereYear('created_at', $this->selectedYear)->get();
        $this->usersChart = $this->getUsersChart();
    }

    // public function updatedSelectedUser() //
    public function getUsersChart(): array
    {
        // Trier les utilisateurs par date d'inscription
        $sortedUsers = $this->users->sortBy('created_at');

        // Grouper les utilisateurs par mois d'inscription
        $groupedUsers = $sortedUsers->groupBy(fn($user) => $user->created_at->format('M'));

        // Créer une collection de labels pour chaque mois
        $labels = $groupedUsers->keys()->map(fn($month) => Carbon::createFromFormat('M', $month)->translatedFormat('F'));

        return [
            'type' => 'bar', // Type de graphique
            'data' => [
                'labels' => $labels->values(), // Labels des mois
                'datasets' => [
                    [
                        'label' => __('New Users'), // Étiquette du dataset
                        'data' => $groupedUsers->map(fn($group) => $group->count())->values(), // Nombre d'inscriptions par mois
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Couleur de fond
                        'borderColor' => 'rgba(255, 99, 132, 1)', // Couleur de bordure
                        'borderWidth' => 1, // Largeur de la bordure
                    ],
                ],
            ],
        ];
    }

    public function getOrdersChart(): array
    {
        // Trie les commandes par date de création
        $sortedOrders = $this->orders->sortBy('created_at');

        // Groupe les commandes triées par mois de création
        $groupedOrders = $sortedOrders->groupBy(fn($order) => $order->created_at->format('M'));

        // Crée une collection de labels pour chaque mois, traduit en format long (ex: "Janvier")
        $labels = $groupedOrders->keys()->map(fn($month) => Carbon::createFromFormat('M', $month)->translatedFormat('F'));

        // Retourne un tableau contenant les données pour un graphique à barres
        return [
            'type' => 'bar', // Type de graphique : barres
            'data' => [
                'labels' => $labels->values(), // Les labels des mois
                'datasets' => [
                    [
                        'label' => __('Sales revenue'), // Étiquette du dataset
                        'data' => $groupedOrders->map(fn($group) => $group->sum('total'))->values(), // Données : somme des totaux par mois
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)', // Couleur de fond des barres
                        'borderColor' => 'rgba(75, 192, 192, 1)', // Couleur de bordure des barres
                        'borderWidth' => 1, // Largeur de la bordure
                    ],
                ],
            ],
        ];
    }

    public function getProductsChart(): array
    {
        // Transforme la collection de commandes en une collection de produits
        $productSales = $this->orders
            ->flatMap(function ($order) {
                return $order->products; // Extrait les produits de chaque commande
            })
            ->groupBy('name') // Groupe les produits par nom
            ->map(function ($items) {
                return [
                    'product' => $items->first()->name, // Nom du produit
                    'total_quantity' => $items->sum('quantity'), // Quantité totale vendue
                ];
            })
            ->sortByDesc('total_quantity') // Trie les produits par quantité totale décroissante
            ->take(10); // Prend les 10 premiers produits

        // Retourne un tableau contenant les données pour un graphique en secteurs (pie chart)
        return [
            'type' => 'pie', // Type de graphique : secteurs
            'data' => [
                'labels' => $productSales->pluck('product'), // Les labels des produits
                'datasets' => [
                    [
                        'label' => __('Quantity Sold'), // Étiquette du dataset
                        'data' => $productSales->pluck('total_quantity'), // Données : quantité totale vendue par produit
                    ],
                ],
            ],
        ];
    }

    public function with(): array
    {
        return [
            'ordersCount' => $this->orders->count(),
            'averageBasket' => $this->orders->avg('total'),
            'salesRevenue' => $this->orders->sum('total'),
            'usersCount' => $this->users->count(),

            'ordersChart' => $this->ordersChart,
        ];
    }
}; ?>

<div>
    <x-header title="{{ __('Statistics') }}" separator progress-indicator>
        <x-slot:actions>
            <x-select wire:model="selectedYear" :options="$years" wire:change="$refresh" />
            <x-button icon="s-building-office-2" label="{{ __('Dashboard') }}" class="btn-outline lg:hidden"
                link="{{ route('admin') }}" />
        </x-slot:actions>
    </x-header>
    <x-collapse wire:model="openGlance" class="shadow-md">
        <x-slot:heading>
            @lang('In a glance')
        </x-slot:heading>
        <x-slot:content class="flex flex-wrap gap-4">
            <div class="flex-grow">
                <x-stat title="{{ __('Successful orders') }}" description="" value="{{ $ordersCount }}"
                    icon="s-shopping-bag" class="shadow-hover" />
            </div>

            <div class="flex-grow">
                <x-stat title="{{ __('Users') }}" description="" value="{{ $usersCount }}" icon="s-user"
                    class="shadow-hover" />
            </div>


            <div class="flex-grow">
                <x-stat title="{{ __('Average basket') }}" description=""
                    value="{{ number_format($averageBasket, 2, ',', ' ') . ' €' }}" value2="{{ $averageBasket }}"
                    icon="s-shopping-cart" class="shadow-hover" />
            </div>
            <div class="flex-grow">
                <x-stat title="{!! __('Sales revenue') !!}" description=""
                    value="{{ number_format($salesRevenue, 2, ',', ' ') . ' €' }}" value2="{{ $salesRevenue }}"
                    icon="s-currency-euro" class="shadow-hover" />
            </div>
        </x-slot:content>
    </x-collapse><br>
    <x-collapse wire:model="openOrders" class="shadow-md">
        <x-slot:heading>
            @lang('Sales revenue')
        </x-slot:heading>
        <x-slot:content>
            <x-chart wire:model="ordersChart" class="w-full" />
        </x-slot:content>
    </x-collapse><br>
    <x-collapse wire:model="openProducts" class="shadow-md">
        <x-slot:heading>
            @lang('Most Sold Products')
        </x-slot:heading>
        <x-slot:content class="flex justify-center">
            <div class="max-w-md w-full">
                <x-chart wire:model="productsChart" class="w-full" />
            </div>
        </x-slot:content>
    </x-collapse> <br>

    <x-collapse wire:model="openUsers" class="shadow-md">
        <x-slot:heading>
            @lang('User Registrations')
        </x-slot:heading>
        <x-slot:content>
            <x-chart wire:model="usersChart" class="w-full" />
        </x-slot:content>
    </x-collapse><br>

</div>
