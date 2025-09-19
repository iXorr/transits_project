<h3 class="mb-3">Новая заявка на поставку</h3>

<form action="/dashboard/create-shipping" method="POST" class="card p-4 shadow-sm">
    @csrf

    <h5>Откуда забирать товар</h5>
    <div class="row mb-3">
        <div class="col-md-6 mb-2">
            <label class="form-label">Город</label>
            <input type="text" name="from_city" class="form-control" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label">Улица</label>
            <input type="text" name="from_street" class="form-control" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label">Дом</label>
            <input type="text" name="from_building" class="form-control" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label">Квартира</label>
            <input type="text" name="from_apartment" class="form-control">
        </div>
    </div>

    <h5>Куда отправлять товар</h5>
    <div class="row mb-3">
        <div class="col-md-6 mb-2">
            <label class="form-label">Город</label>
            <input type="text" name="to_city" class="form-control" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label">Улица</label>
            <input type="text" name="to_street" class="form-control" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label">Дом</label>
            <input type="text" name="to_building" class="form-control" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label">Квартира</label>
            <input type="text" name="to_apartment" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Создать заявку</button>
</form>
