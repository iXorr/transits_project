@props(['vehicle_types', 'user'])

<h3>Новый транспорт</h3>

<form class="mt-3" action="/dashboard/create-vehicle" method="POST">
    @csrf

    <div class="mb-3">
        <label for="vehicle_type_id" class="form-label">Тип транспорта</label>
        <select name="vehicle_type_id" id="vehicle_type_id">
            @foreach ($vehicle_types as $vt)
                <option value="{{ $vt->id }}">{{ $vt->loc_title }}</option>
            @endforeach
        </select>

        <label for="capacity" class="form-label">Вместительность</label>
        <input type="text" id="capacity" name="capacity" required>
        
        <label for="brand" class="form-label">Бренд</label>
        <input type="text" id="brand" name="brand" required>
        
        <label for="model" class="form-label">Модель</label>
        <input type="text" id="model" name="model" required>
        
        <label for="factory_number" class="form-label">Фабричный номер</label>
        <input type="text" id="factory_number" name="factory_number" required>
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
