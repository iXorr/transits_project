<h3 class="mb-3">Мои поставки</h3>

@forelse ($user->shippings as $shipping)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            @if($user->role->title === 'client')
                <p><strong>Водитель:</strong> {{ $shipping->vehicle->driver->name ?? "Не назначен" }}</p>
            @elseif ($user->role->title === 'driver')
                <p><strong>Клиент:</strong> {{ $shipping->user->name }} {{ $shipping->user->surname }}</p>
            @endif

            <p><strong>Статус отправки:</strong> {{ $shipping->delivery_status->loc_title }}</p>
            <p><strong>Статус получения:</strong> {{ $shipping->receipt_status->loc_title }}</p>

            <p class="mb-1"><strong>Откуда:</strong> {{ $shipping->sender_address->city }}, {{ $shipping->sender_address->street }}, {{ $shipping->sender_address->building }}{{ $shipping->sender_address->apartment ? ', ' . $shipping->sender_address->apartment : '' }}</p>
            <p class="mb-2"><strong>Куда:</strong> {{ $shipping->delivery_address->city }}, {{ $shipping->delivery_address->street }}, {{ $shipping->delivery_address->building }}{{ $shipping->delivery_address->apartment ? ', ' . $shipping->delivery_address->apartment : '' }}</p>

            <div class="d-flex gap-2">
                <a href="{{ url("dashboard/delete-shipping/" . $shipping->id) }}" class="btn btn-outline-danger btn-sm">Удалить</a>
                <a href="{{ url("dashboard/change-shipping/" . $shipping->id) }}" class="btn btn-outline-primary btn-sm">Изменить статус</a>
            </div>
        </div>
    </div>
@empty
    <div class="alert alert-info text-center">У вас пока нет поставок.</div>
@endforelse
