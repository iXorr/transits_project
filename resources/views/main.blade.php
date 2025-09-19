<x-basic.layout>
    <h2>Просмотр поставок</h2>

    @forelse ($shippings as $shipping)
        <p>Водитель: {{ $shipping->vehicle->driver->id ?? "Нет" }}</p>
        <p>Клиент: {{ $shipping->user->name }} {{ $shipping->user->surname }}</p>
        <p>Статус отправки: {{ $shipping->delivery_status->loc_title }}</p>
        <p>Статус получения: {{ $shipping->receipt_status->loc_title }}</p>
        <p>Город отправки: {{ $shipping->sender_address->city }}</p>
        <p>Город получения: {{ $shipping->delivery_address->city }}</p>
    @empty
        <p>ДА ТУТ ПУСТО</p>
    @endforelse
</x-basic.layout>