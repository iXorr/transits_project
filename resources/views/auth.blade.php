@section("title", "Авторизация")

<x-basic.layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <x-auth.nav-tabs />

                <div class="tab-content p-3 border border-top-0" id="authTabsContent">
                    <x-auth.login />
                    <x-auth.register :roles="$roles" />
                </div>
            </div>
        </div>
    </div>

    <x-auth.switch-nav-tabs />
    <x-basic.display-errors />
</x-basic.layout>