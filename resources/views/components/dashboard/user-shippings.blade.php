USER SHIPPINGS

@forelse ($user->shippings as $shipping)
    @if($user->role->title === 'client')
        <p>Водитель: {{ $shipping->vehicle->driver->id ?? "Нет" }}</p>
    @elseif ($user->role->title === 'driver')
        <p>Клиент: {{ $shipping->user->name }} {{ $shipping->user->surname }}</p>
    @endif

    <p>Статус отправки: {{ $shipping->delivery_status->loc_title }}</p>
    <p>Статус получения: {{ $shipping->receipt_status->loc_title }}</p>
    
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

    <a href="{{ url("dashboard/delete-shipping/" . $shipping->id) }}">Удалить</a>
    <a href="{{ url("dashboard/change-shipping/" . $shipping->id) }}">Изменить статус</a>
@empty
    <p>NOTHING</p>
@endforelse