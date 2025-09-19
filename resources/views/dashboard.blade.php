@section("title", "Личный кабинет")

<x-basic.layout>
    <div class="container">
        <x-dashboard.inner-nav :user="$user" />

        <div class="mt-4">
            @if ($page === 'my-shippings')
                <x-dashboard.user-shippings :user="$user" />
            @elseif ($page === 'create-shipping')
                <x-dashboard.create-shipping :user="$user" />
            @elseif ($page === 'check-shippings')
                <x-dashboard.check-shippings :user="$user" :active_shippings="$active_shippings" />
            @elseif ($page === 'edit-shipping')
                <x-dashboard.edit-shipping 
                    :user="$user" 
                    :shipping="$shipping" 
                    :receipt_statuses="$receipt_statuses"
                    :delivery_statuses="$delivery_statuses" />
            @elseif ($page === 'my-vehicles')
                <x-dashboard.user-vehicles :user="$user" :vehicles="$vehicles" />
            @elseif ($page === 'create-vehicle')
                <x-dashboard.create-vehicle :user="$user" :vehicle_types="$vehicle_types" />
            @elseif ($page === 'reg-shipping')
                <x-dashboard.reg-shipping :user="$user" :shipping="$shipping" :vehicles="$vehicles" />
            @endif

            @if (session("msg"))
                <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1080;">
                    <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                        {{ session('msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-basic.layout>
