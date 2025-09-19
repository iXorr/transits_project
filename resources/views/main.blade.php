<x-basic.layout>
    <div class="container">
        <h2 class="mb-4 text-center">Список поставок</h2>

        @forelse ($shippings as $shipping)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        🚚 Поставка #{{ $shipping->id }}
                    </h5>
                    <p class="mb-1"><strong>Статус отправки:</strong> {{ $shipping->delivery_status->loc_title }}</p>
                    <p class="mb-1"><strong>Статус получения:</strong> {{ $shipping->receipt_status->loc_title }}</p>
                    <p class="mb-1"><strong>Город отправки:</strong> {{ $shipping->sender_address->city }}</p>
                    <p class="mb-0"><strong>Город получения:</strong> {{ $shipping->delivery_address->city }}</p>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                Поставок пока нет.
            </div>
        @endforelse
    </div>
</x-basic.layout>
