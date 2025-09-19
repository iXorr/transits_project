<h2>Приветствуем, {{ $user->name }} {{ $user->surname }}</h2>

@if($user->role->title === 'driver')
    <h4>Для водителей</h4>

    <ul>
        <li>
            <a href="{{ url("dashboard/check-shippings") }}">Посмотреть заявки на поставки (и одобрить)</a>
        </li>

        <li>
            <a href="{{ url("dashboard/create-vehicle") }}">Добавить транспорт</a>
        </li>

        <li>
            <a href="{{ url("dashboard/my-vehicles") }}">Посмотреть свой транспорт</a>
        </li>
    </ul>
@endif

@if($user->role->title === 'client')
    <h4>Для клиентов</h4>
    <ul>
        <li>
            <a href="{{ url("dashboard/create-shipping") }}">Создать заявку на поставку</a>
        </li>
    </ul>
@endif

<h4>Для всех</h4>
<ul>
    <li>
        <a href="{{ url("dashboard/my-shippings") }}">Просмотреть мои поставки</a>
    </li>
</ul>