<div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
    <form class="mt-3" action="/login" method="POST">
        @csrf

        <div class="mb-3">
            <label for="signin-username" class="form-label">Логин</label>
            <input type="text" class="form-control" id="signin-username" name="login">
        </div>

        <div class="mb-3">
            <label for="signin-password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="signin-password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Отправить</button>
    </form>
</div>