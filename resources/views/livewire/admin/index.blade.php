<?php

use App\Models\{Comment, Page, Post, User, Order, Product, Setting,};




use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\{Layout, Title};
use App\Services\OrderService;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use App\Traits\ManageOrders;

new #[Title('Dashboard')] #[Layout('components.layouts.admin')] class extends Component {
	use Toast;
    use ManageOrders;

	public array $headersPosts;
	public bool $openGlance = true;
    public bool $openOrders = false;
    public bool $paginationOrders = false;



    public function headersProducts(): array
    {
        return [
            ['key' => 'image', 'label' => ''],
            ['key' => 'name', 'label' => __('Name')],
            ['key' => 'quantity_alert', 'label' => __('Quantity alert'), 'class' => 'text-right'],
            ['key' => 'quantity', 'label' => __('Quantity'), 'class' => 'text-right'],
        ];
    }
	public function mount(): void
	{
		$this->headersPosts = [['key' => 'date', 'label' => __('Date')], ['key' => 'title', 'label' => __('Title')]];
        $this->headersProducts1 = [ ['key' => 'image', 'label' => ''],
            ['key' => 'name', 'label' => __('Name')],
            ['key' => 'quantity_alert', 'label' => __('Quantity alert'), 'class' => 'text-right'],
            ['key' => 'quantity', 'label' => __('Quantity'), 'class' => 'text-right'],
    ];

	}

	public function deleteComment(Comment $comment): void
	{
		$comment->delete();

		$this->warning('Comment deleted', __('Good bye!'), position: 'toast-bottom');
	}

	public function with(): array
	{
		$user    = Auth::user();
		$isRedac = $user->isRedac();
		$userId  = $user->id;
        $orders = (new OrderService($this))->req()->take(6)->get();
        $orders = $this->setPrettyOrdersIndexes($orders);
        $promotion = Setting::where('key', 'promotion')->firstOrCreate(['key' => 'promotion']);
        $textPromotion = '';

        if ($promotion->value) {
            $now = now();
            if ($now->isBefore($promotion->date1)) {
                $textPromotion = transL('Coming soon');
            } elseif ($now->between($promotion->date1, $promotion->date2)) {
                $textPromotion = trans('in progress');
            } else {
                $textPromotion = transL('Expired_feminine');
            }
        }

		return [
            'productsCount' => Product::count(),
			'ordersCount'   => Order::whereRelation('state', 'indice', '>', 3)
                                    ->whereRelation('state', 'indice', '<', 6)
                                    ->count(),
			'pages'          => Page::select('id', 'title', 'slug')->get(),
			'posts'          => Post::select('id', 'title', 'slug', 'user_id', 'created_at', 'updated_at')->when($isRedac, fn (Builder $q) => $q->where('user_id', $userId))->latest()->get(),
			'commentsNumber' => Comment::when($isRedac, fn (Builder $q) => $q->whereRelation('post', 'user_id', $userId))->count(),
			'comments'       => Comment::with('user', 'post:id,title,slug')->when($isRedac, fn (Builder $q) => $q->whereRelation('post', 'user_id', $userId))->latest()->take(5)->get(),
			'users'          => User::count(),
            'usersCount'    => User::count(),
            'orders' => $orders->collect(),
            'promotion' => $promotion,
            'textPromotion' => $textPromotion,
            'orders'        => Order::with('user', 'state', 'addresses')
                                    ->orderBy(...array_values($this->sortBy))
                                    ->take(6)
                                    ->get(),
            'headersOrders' => $this->headersOrders(),
            'productsDown' => Product::whereColumn('quantity', '<=', 'quantity_alert')->orderBy('quantity', 'asc')->get(),
           'headersProducts' => $this->headersProducts(),
           'row_decoration' => [
                'bg-red-400' => fn(Product $product) => $product->quantity == 0,
            ]
            
		];
	}
}; ?>

<div>
    <x-collapse wire:model="openGlance" class="shadow-md">
        <x-slot:heading>
            @lang('In a glance')
        </x-slot:heading>
        
        <x-slot:content class="flex flex-wrap gap-4">

            <a href="{{ route('posts.index') }}" class="flex-grow">
                <x-stat title="{{ __('Posts') }}" description="" value="{{ $posts->count() }}" icon="s-document-text"
                    class="shadow-hover" />
            </a>
            <a href="/" class="flex-grow">
                <x-stat 
                    title="{{ __('Active products') }}" 
                    description="" 
                    value="{{ $productsCount }}" 
                    icon="s-shopping-bag"
                    class="shadow-hover" />
            </a>

            <a href="/" class="flex-grow">
                <x-stat 
                    title="{{ __('Successful orders') }}" 
                    description="" 
                    value="{{ $ordersCount }}" 
                    icon="s-shopping-cart"
                    class="shadow-hover" />
            </a>

           
          
            @if (Auth::user()->isAdmin())
                <a href="{{ route('pages.index') }}" class="flex-grow">
                    <x-stat title="{{ __('Pages') }}" value="{{ $pages->count() }}" icon="s-document"
                        class="shadow-hover" />
                </a>
                <a href="{{ route('users.index') }}" class="flex-grow">
                    <x-stat title="{{ __('Users') }}" value="{{ $users }}" icon="s-user"
                        class="shadow-hover" />
                </a>
                <a href="{{ route('admin.customers.index') }}" class="flex-grow">
                    <x-stat title="{{ __('Accounts') }}" description="" value="{{ $usersCount }}" icon="s-user"
                        class="shadow-hover" />
                </a>
            @endif
            
            <a href="{{ route('comments.index') }}" class="flex-grow">
                <x-stat title="{{ __('Comments') }}" value="{{ $commentsNumber }}" icon="c-chat-bubble-left"
                    class="shadow-hover" />
            </a>
        </x-slot:content>
    </x-collapse>
    
    @if(!is_null($promotion->value))
        <br>
        <x-alert title="{{ __('Global promotion') }} {{ $textPromotion }}" description="{{ __('From') }} {{ $promotion->date1->isoFormat('LL') }} {{ __('to') }} {{ $promotion->date2->isoFormat('LL') }} {{ __L('Percentage discount') }} {{ $promotion->value }}%" icon="o-currency-euro" class="alert-warning" >
            <x-slot:actions>
                <x-button label="{{ __('Edit') }}" class="btn-outline" link="{{ route('admin.products.promotion') }}" />
            </x-slot:actions>
        </x-alert>
    @endIf

    <x-header separator progress-indicator />

    @if($productsDown->isNotEmpty())
    <x-collapse class="shadow-md bg-red-500">
        <x-slot:heading>
            @lang('Stock alert')
        </x-slot:heading>       
        <x-slot:content>
            <x-card class="mt-6" title="" shadow separator>
                <x-table striped :rows="$productsDown" :headers="$headersProducts" link="/admin/products/{id}/edit" :row-decoration="$row_decoration" >
                    @scope('cell_image', $product)
                        <img src="{{ asset('storage/photos/' . $product->image) }}" width="60" alt="">
                    @endscope
                </x-table>
                <x-slot:actions>
                    <x-button label="{{ __('See all products') }}" class="btn-primary" icon="s-list-bullet"
                        link="{{ route('admin.products.index') }}" />
                </x-slot:actions>
            </x-card>
        </x-slot:content>
    </x-collapse>
    <br>
@endif


    <br>
   
    <x-collapse wire:model="openOrders" class="shadow-md">
        <x-slot:heading>
            @lang('Latest orders')
        </x-slot:heading>

        <x-slot:content>
            <x-card class="mt-6" title="" shadow separator>
                @include('livewire.admin.orders.table')
                <x-slot:actions>
                    <x-button label="{{ __('See all orders') }}" class="btn-primary" icon="s-list-bullet"
                        link="{{ route('admin.orders.index') }}" />
                </x-slot:actions>
            </x-card>
        </x-slot:content>
    </x-collapse>
    <br>

    @foreach ($comments as $comment)
        @if (!$comment->user->valid)
            <x-alert title="{!! __('Comment to valid from ') . $comment->user->name !!}" description="{!! $comment->body !!}" icon="c-chat-bubble-left"
                class="shadow-md alert-warning">
                <x-slot:actions>
                    <x-button link="{{ route('comments.index') }}" label="{!! __('Show the comments') !!}" />
                </x-slot:actions>
            </x-alert>
            <br>
        @endif
    @endforeach

    @foreach ($comments as $comment)
        @if (!$comment->user->valid)
            <x-alert title="{!! __('Comment to valid from ') . $comment->user->name !!}" description="{!! $comment->body !!}" icon="c-chat-bubble-left"
                class="shadow-md alert-warning">
                <x-slot:actions>
                    <x-button link="#" label="{!! __('Show the comments') !!}" />
                </x-slot:actions>
            </x-alert>
            <br>
        @endif
    @endforeach

    <x-collapse class="shadow-md">
        <x-slot:heading>
            @lang('Recent posts')
        </x-slot:heading>
        <x-slot:content>
            <x-table :headers="$headersPosts" :rows="$posts->take(5)" striped>
                @scope('cell_date', $post)
                    @lang('Created') {{ $post->created_at->diffForHumans() }}
                    @if ($post->updated_at != $post->created_at)
                        <br>
                        @lang('Updated') {{ $post->updated_at->diffForHumans() }}
                    @endif
                @endscope
                @scope('actions', $post)
                    <x-popover>
                        <x-slot:trigger>
                            <x-button icon="s-document-text" link="{{ route('posts.show', $post->slug) }}" spinner class="btn-ghost btn-sm" />                            
                        </x-slot:trigger>
                        <x-slot:content class="pop-small">
                            @lang('Show post')
                        </x-slot:content>
                    </x-popover>
                @endscope
            </x-table>
        </x-slot:content>
    </x-collapse>

    <br>

    <x-collapse class="shadow-md">
        <x-slot:heading>
            @lang('Recent Comments')
        </x-slot:heading>
        <x-slot:content>
            @foreach ($comments as $comment)
                <x-list-item :item="$comment" no-separator no-hover>
                    <x-slot:avatar>
                        <x-avatar :image="Gravatar::get($comment->user->email)">
                            <x-slot:title>
                                {{ $comment->user->name }}
                            </x-slot:title>
                        </x-avatar>
                    </x-slot:avatar>
                    <x-slot:value>
                        @lang ('in post:') {{ $comment->post->title }}
                    </x-slot:value>
                    <x-slot:actions>
                        <x-popover>
                            <x-slot:trigger>
                                <x-button icon="c-eye" link="{{ route('comments.edit', $comment->id) }}" spinner class="btn-ghost btn-sm" />                         
                            </x-slot:trigger>
                            <x-slot:content class="pop-small">
                                @lang('Edit or answer')
                            </x-slot:content>
                        </x-popover>
                        <x-popover>
                            <x-slot:trigger>
                                <x-button icon="s-document-text" link="{{ route('posts.show', $comment->post->slug) }}" spinner class="btn-ghost btn-sm" />                       
                            </x-slot:trigger>
                            <x-slot:content class="pop-small">
                                @lang('Show post')
                            </x-slot:content>
                        </x-popover>
                        <x-popover>
                            <x-slot:trigger>
                                <x-button icon="o-trash" wire:click="deleteComment({{ $comment->id }})"
                                    wire:confirm="{{ __('Are you sure to delete this comment?') }}" 
                                    spinner class="text-red-500 btn-ghost btn-sm" />                   
                            </x-slot:trigger>
                            <x-slot:content class="pop-small">
                                @lang('Delete')
                            </x-slot:content>
                        </x-popover>
                    </x-slot:actions>
                </x-list-item>
                <p class="ml-16">{!! Str::words(nl2br($comment->body), 20, ' ...') !!}</p>
                <br>
            @endforeach
        </x-slot:content>
    </x-collapse>
</div>
