<x-card>
    <x-table 
        striped 
        :headers="$headersOrders" 
        :rows="$orders" 
        :sort-by="$sortBy" 
        per-page="perPage"
        :with-pagination="$paginationOrders"
        link="/admin/orders/{id}"
    >
      @scope('cell_user', $order)
            {{ $order->addresses->first()->company? $order->addresses->first()->company :  $order->user->name . ' ' . $order->user->firstname }}
        @endscope 
        @scope('cell_created_at', $order)
            <span class="whitespace-nowrap">
                {{ $order->created_at->isoFormat('LL') }}
                @if(!$order->created_at->isSameDay($order->updated_at))
                    <p>@lang('Change') : {{ $order->updated_at->isoFormat('LL') }}</p>
                @endif
            </span>
        @endscope
        @scope('cell_total', $order)
            <span class="whitespace-nowrap">
                {{ $order->totalOrder }} €
            </span>
        @endscope
        @scope('cell_state', $order)
        

                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                       <span style="background-color: {{  $order->state->color }}; color: white; padding: 5px 10px; border-radius: 5px;">
                        {{ $order->state->name }}
                    </span>
                </div>
        @endscope
        @scope('cell_reference', $order)
            <strong>{{ $order->reference }}</strong>
        @endscope
        @scope('cell_invoice_id', $order)
            @if ($order->invoice_id)
                <x-icon name="o-check-circle" />
            @endif
        @endscope

       
        
    </x-table>
   
</x-card>