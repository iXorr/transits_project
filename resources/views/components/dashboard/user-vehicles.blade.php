<h3 class="mb-3">Мой транспорт</h3>

@forelse ($vehicles as $vehicle)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <p><strong>Тип транспорта:</strong> {{ $vehicle->vehicle_type->loc_title }}</p>
            <p><strong>Вместительность:</strong> {{ $vehicle->capacity }}</p>
            <p><strong>Бренд:</strong> {{ $vehicle->brand }}</p>
            <p><strong>Модель:</strong> {{ $vehicle->model }}</p>
            <p><strong>Фабричный номер:</strong> {{ $vehicle->factory_number }}</p>

            <a href="{{ url("dashboard/delete-vehicle/" . $vehicle->id) }}" class="btn btn-outline-danger btn-sm">Удалить</a>
        </div>
    </div>
@empty
    <div class="alert alert-info text-center">Вы еще не добавили транспорт.</div>
@endforelse
