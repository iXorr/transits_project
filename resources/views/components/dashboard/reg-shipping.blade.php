@props(["user", "vehicles", "shipping"])

<div class="card shadow-sm p-4">
    <h3 class="mb-3">Выбранная поставка</h3>

    <div class="mb-3">
        <p class="mb-1"><strong>Откуда:</strong> 
            {{ $shipping->sender_address->city }},
            {{ $shipping->sender_address->street }},
            {{ $shipping->sender_address->building }}
            {{ $shipping->sender_address->apartment ? ', ' . $shipping->sender_address->apartment : '' }}
        </p>
        <p class="mb-0"><strong>Куда:</strong> 
            {{ $shipping->delivery_address->city }},
            {{ $shipping->delivery_address->street }},
            {{ $shipping->delivery_address->building }}
            {{ $shipping->delivery_address->apartment ? ', ' . $shipping->delivery_address->apartment : '' }}
        </p>
    </div>

    <form action="{{ url("dashboard/reg-shipping/" . $shipping->id) }}" method="POST">
        @csrf

        @if ($vehicles->count() > 0)
            <div class="mb-3">
                <label for="vehicle_id" class="form-label">Выберите транспорт</label>
                <select name="vehicle_id" id="vehicle_id" class="form-select">
                    @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">
                            {{ $vehicle->brand }} {{ $vehicle->model }} (№ {{ $vehicle->factory_number }})
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Подтвердить выбор</button>
        @else
            <div class="alert alert-warning text-center">
                У вас нет зарегистрированного транспорта.<br>
                <a href="{{ url('dashboard/create-vehicle') }}" class="btn btn-sm btn-outline-primary mt-2">
                    Добавить транспорт
                </a>
            </div>
        @endif
    </form>
</div>
