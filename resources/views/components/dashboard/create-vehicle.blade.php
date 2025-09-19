@props(['vehicle_types', 'user'])

<h3 class="mb-3">Добавление транспорта</h3>

<form action="/dashboard/create-vehicle" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Тип транспорта</label>
        <select name="vehicle_type_id" class="form-select">
            @foreach ($vehicle_types as $vt)
                <option value="{{ $vt->id }}">{{ $vt->loc_title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Вместительность</label>
        <input type="text" name="capacity" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Бренд</label>
        <input type="text" name="brand" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Модель</label>
        <input type="text" name="model" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Фабричный номер</label>
        <input type="text" name="factory_number" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Добавить</button>
</form>
