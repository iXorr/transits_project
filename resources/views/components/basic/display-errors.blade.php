@if($errors->any())
    <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1080;">
        <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
            <h5 class="alert-heading mb-2">Обнаружены ошибки:</h5>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
        </div>
    </div>
@endif
