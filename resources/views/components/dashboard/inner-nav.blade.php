<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title">Приветствуем, {{ $user->name }} {{ $user->surname }}</h3>

        @if($user->role->title === 'driver')
            <h5 class="mt-3">Раздел для водителей</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url("dashboard/check-shippings") }}">Посмотреть доступные заявки</a></li>
                <li class="list-group-item"><a href="{{ url("dashboard/create-vehicle") }}">Добавить транспорт</a></li>
                <li class="list-group-item"><a href="{{ url("dashboard/my-vehicles") }}">Мой транспорт</a></li>
            </ul>
        @endif

        @if($user->role->title === 'client')
            <h5 class="mt-3">Раздел для клиентов</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url("dashboard/create-shipping") }}">Создать заявку на поставку</a></li>
            </ul>
        @endif

        <h5 class="mt-3">Общее</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{ url("dashboard/my-shippings") }}">Мои поставки</a></li>
        </ul>
    </div>
</div>
