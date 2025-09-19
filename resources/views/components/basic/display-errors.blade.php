@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <h5 class="alert-heading mb-2">Обнаружены ошибки:</h5>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
    </div>
@endif
