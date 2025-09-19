@section("title", "Авторизация")

<x-basic.layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <x-auth.nav-tabs />

                <div class="tab-content p-4 bg-white border border-top-0 rounded-bottom shadow-sm" id="authTabsContent">
                    <x-auth.login />
                    <x-auth.register :roles="$roles" />
                </div>

                <x-auth.switch-nav-tabs />
                <x-basic.display-errors />
            </div>
        </div>
    </div>
</x-basic.layout>
