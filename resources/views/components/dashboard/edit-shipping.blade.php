@props(['user', 'shipping', 'receipt_statuses', 'delivery_statuses'])

<div class="card shadow-sm p-4">
    <h3 class="mb-3">Редактирование поставки #{{ $shipping->id }}</h3>

    @if($user->role->title === 'client')
        <p><strong>Водитель:</strong> {{ $shipping->vehicle->driver->id ?? "Не назначен" }}</p>
        <p><strong>Статус отправки:</strong> {{ $shipping->delivery_status->loc_title }}</p>
    @elseif ($user->role->title === 'driver')
        <p><strong>Клиент:</strong> {{ $shipping->user->name }} {{ $shipping->user->surname }}</p>
        <p><strong>Статус получения:</strong> {{ $shipping->receipt_status->loc_title }}</p>
    @endif

    <p><strong>Откуда:</strong> {{ $shipping->sender_address->city }}, {{ $shipping->sender_address->street }}, {{ $shipping->sender_address->building }}{{ $shipping->sender_address->apartment ? ', ' . $shipping->sender_address->apartment : '' }}</p>
    <p><strong>Куда:</strong> {{ $shipping->delivery_address->city }}, {{ $shipping->delivery_address->street }}, {{ $shipping->delivery_address->building }}{{ $shipping->delivery_address->apartment ? ', ' . $shipping->delivery_address->apartment : '' }}</p>

    <form class="mt-3" action="{{ url("dashboard/change-shipping/" . $shipping->id) }}" method="POST">
        @csrf

        @if($user->role->title === 'client')
            <label class="form-label">Статус получения</label>
            <select name="updated_receipt_status" class="form-select mb-3">
                @foreach ($receipt_statuses as $rs)
                    <option {{ ($shipping->receipt_status_id == $rs->id) ? "selected" : "" }}
                        value="{{ $rs->title }}">{{ $rs->loc_title }}</option>
                @endforeach
            </select>
        @elseif ($user->role->title === 'driver')
            <label class="form-label">Статус отправки</label>
            <select name="updated_delivery_status" class="form-select mb-3">
                @foreach ($delivery_statuses as $ds)
                    <option {{ ($shipping->delivery_status_id == $ds->id) ? "selected" : "" }}
                        value="{{ $ds->title }}">{{ $ds->loc_title }}</option>
                @endforeach
            </select>
        @endif

        <button type="submit" class="btn btn-primary w-100">Сохранить изменения</button>
    </form>
</div>
