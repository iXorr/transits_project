@props(["user", "vehicles", "shipping"])

<h3>Выбранная поставка</h3>

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

<form class="mt-3" action="{{ url("dashboard/reg-shipping/" . $shipping->id) }}" method="POST">
    @csrf

    @if ($vehicles->count() > 0)
        <label for="vehicle_id" class="form-label">Выберите транспорт</label>
        <div class="mb-3">
            <select name="vehicle_id" id="vehicle_id" class="form-select">
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">
                        {{ $vehicle->brand }} {{ $vehicle->model }} {{ $vehicle->factory_number }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary mt-2">Отправить</button>
        </div>
    @else
        <p class="text-muted">У вас нет транспорта. Сперва добавьте его.</p>
    @endif
</form>