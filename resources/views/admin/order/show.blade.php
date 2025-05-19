@extends('admin.layout.app')

@section('title', __('pages.order_details'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-3">

            <h3>{{ __('pages.order_details') }} - #{{ $order->id }}</h3>

            <h5>{{ __('pages.user') }}: {{ $order->user->name ?? '-' }}</h5>
            <p><strong>{{ __('pages.phone') }}:</strong> {{ $order->phone }}</p>
            <p><strong>{{ __('pages.email') }}:</strong> {{ $order->email }}</p>
            <p><strong>{{ __('pages.address') }}:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->country }}</p>
            <p><strong>{{ __('pages.delivery_day') }}:</strong> {{ $order->delivery_day }}</p>
            <p><strong>{{ __('pages.delivery_time') }}:</strong> {{ $order->delivery_time }}</p>
            <p><strong>{{ __('pages.note') }}:</strong> {{ $order->note }}</p>

            <hr>
<div class="d-flex gap-2 mb-3">
    @if($order->status === "Pending")
    <form action="{{ route('admin.orders.updateStatus', ['lang' => app()->getLocale(), 'order' => $order->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" value="Sent">
        <button type="submit" class="btn btn-primary">
            {{ __('pages.sent') }}
        </button>
    </form>
    @elseif ($order->status === "Sent")
    <span style="color:green;">Done Sent</span>
    @else

    @endif
    
    @if($order->status === "Sent")
    <form action="{{ route('admin.orders.updateStatus', ['lang' => app()->getLocale(), 'order' => $order->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" value="Delivered">
        <button type="submit" class="btn btn-success">
            {{ __('pages.delivered') }}
        </button>
    </form>
    
    @elseif ($order->status === "Delivered")
    <span style="color:green;">Done delivered</span>
    @else

    @endif
</div>
<hr>
            <h4>{{ __('pages.products') }}</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('pages.product_name') }}</th>
                        <th>{{ __('pages.color') }}</th>
                        <th>{{ __('pages.size') }}</th>
                        <th>{{ __('pages.quantity') }}</th>
                        <th>{{ __('pages.price') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->{'name_' . app()->getLocale()} ?? '-' }}</td>
                        <td>{{ $item->color ?? '-' }}</td>
                        <td>{{ $item->size ?? '-' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
