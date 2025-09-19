@props(["user", "active_shippings"])

DRIVER: CHECK SHIPPINGS

@forelse ($active_shippings as $shipping)
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

    <a href="{{ url("dashboard/reg-shipping/" . $shipping->id) }}">Взять поставку</a>
@empty
    <p>NOTHING</p>
@endforelse