@props(['user', 'shipping', 'receipt_statuses', 'delivery_statuses'])

EDIT SHIPPING {{ $shipping->id }}

@if($user->role->title === 'client')
    <p>Водитель: {{ $shipping->vehicle->driver->id ?? "Нет" }}</p>
    <p>Статус отправки: {{ $shipping->delivery_status->loc_title }}</p>
@elseif ($user->role->title === 'driver')
    <p>Клиент: {{ $shipping->user->name }} {{ $shipping->user->surname }}</p>
    <p>Статус получения: {{ $shipping->receipt_status->loc_title }}</p>
@endif

<p>Откуда забирать: {{ $shipping->sender_address->city }},
                {{ $shipping->sender_address->street }},
                {{ $shipping->sender_address->building }}
                {{ $shipping->sender_address->apartment
                    ? ", " . $shipping->sender_address->apartment
                    : "" }}
</p>

<p>Куда отправлять: {{ $shipping->delivery_address->city }},
                {{ $shipping->delivery_address->street }},
                {{ $shipping->delivery_address->building }}
                {{ $shipping->sender_address->apartment
                    ? ", " . $shipping->sender_address->apartment
                    : "" }}
</p>

<form class="mt-3" action="{{ url("dashboard/change-shipping/" . $shipping->id) }}" method="POST">
    @csrf

    <div class="mb-3">

    @if($user->role->title === 'client')
        <label for="to-city" class="form-label">Статус получения</label>
        <select name="updated_receipt_status" id="updated_receipt_status">
            @foreach ($receipt_statuses as $rs)
                <option {{ ($shipping->receipt_status_id == $rs->id) ? "selected" : "" }}
                    value="{{ $rs->title }}">{{ $rs->loc_title }}</option>
            @endforeach
        </select>
    @elseif ($user->role->title === 'driver')
        <label for="to-city" class="form-label">Статус отправки</label>
        <select name="updated_delivery_status" id="updated_delivery_status">
            @foreach ($delivery_statuses as $ds)
                <option {{ ($shipping->delivery_status_id == $ds->id) ? "selected" : "" }}
                    value="{{ $ds->title }}">{{ $ds->loc_title }}</option>
            @endforeach
        </select>
    @endif

    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>