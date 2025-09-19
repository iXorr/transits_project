<x-basic.layout>
    <div class="container">
        <h2 class="mb-4 text-center">Список поставок</h2>

        <div class="row g-3">
            @forelse ($shippings as $shipping)
                <div class="col-12 col-md-6">
                    <div class="card h-100 shadow-sm">
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
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Поставок пока нет.
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Пагинация --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $shippings->links() }}
        </div>
    </div>
</x-basic.layout>
