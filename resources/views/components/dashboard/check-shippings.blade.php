@props(["user", "active_shippings"])

<h3 class="mb-3">Доступные заявки</h3>

@forelse ($active_shippings as $shipping)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Поставка #{{ $shipping->id }}</h5>
            <p class="mb-1"><strong>Откуда:</strong> {{ $shipping->sender_address->city }}, {{ $shipping->sender_address->street }}, {{ $shipping->sender_address->building }}{{ $shipping->sender_address->apartment ? ', ' . $shipping->sender_address->apartment : '' }}</p>
            <p class="mb-2"><strong>Куда:</strong> {{ $shipping->delivery_address->city }}, {{ $shipping->delivery_address->street }}, {{ $shipping->delivery_address->building }}{{ $shipping->delivery_address->apartment ? ', ' . $shipping->delivery_address->apartment : '' }}</p>
            <a href="{{ url("dashboard/reg-shipping/" . $shipping->id) }}" class="btn btn-primary">Взять поставку</a>
        </div>
    </div>
@empty
    <div class="alert alert-info text-center">Доступных заявок пока нет.</div>
@endforelse
