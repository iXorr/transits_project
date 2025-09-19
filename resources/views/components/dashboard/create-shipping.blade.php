<h3>Новая заявка на поставку</h3>

<form class="mt-3" action="/dashboard/create-shipping" method="POST">
    @csrf

    <h4>Откуда забирать товар</h4>

    <div class="mb-3">
        <label for="from-city" class="form-label">Город</label>
        <input type="text" id="" name="from_city" required>
        
        <label for="from-street" class="form-label">Улица</label>
        <input type="text" id="" name="from_street" required>
        
        <label for="from-building" class="form-label">Дом</label>
        <input type="text" id="" name="from_building" required>
        
        <label for="from-apartment" class="form-label">Квартира</label>
        <input type="text" id="" name="from_apartment">
    </div>

    <h4>Куда отправлять товар</h4>

    <div class="mb-3">
        <label for="to-city" class="form-label">Город</label>
        <input type="text" id="" name="to_city" required>
        
        <label for="to-street" class="form-label">Улица</label>
        <input type="text" id="" name="to_street" required>
        
        <label for="to-building" class="form-label">Дом</label>
        <input type="text" id="" name="to_building" required>
        
        <label for="to-apartment" class="form-label">Квартира</label>
        <input type="text" id="" name="to_apartment">
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
