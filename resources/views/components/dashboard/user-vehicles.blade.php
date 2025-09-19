USER VEHICLES

@forelse ($vehicles as $vehicle)
    <p>Тип транспорта: {{ $vehicle->vehicle_type->loc_title }}</p>
    <p>Вместительность: {{ $vehicle->capacity }}</p>
    <p>Бренд: {{ $vehicle->brand }}</p>
    <p>Модель: {{ $vehicle->model }}</p>
    <p>Фабричный номер: {{ $vehicle->factory_number }}</p>
    
    <a href="{{ url("dashboard/delete-vehicle/" . $vehicle->id) }}">Удалить</a>
@empty
    <p>NOTHING</p>
@endforelse