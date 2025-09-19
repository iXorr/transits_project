<div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
    <form class="mt-3" action="/register" method="POST">
        @csrf

        <div class="mb-3">
            <label for="signup-firstname" class="form-label">Роль</label>
            <select class="form-select" aria-label="Роль пользователя" name="user_role">
                @foreach ($roles as $role)
                    <option value="{{ $role->title }}"
                        {{ $role->id == 1 ? 'selected' : '' }}>
                        {{ $role->loc_title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="signup-firstname" class="form-label">Имя</label>
            <input type="text" class="form-control" id="signup-firstname" name="name">
        </div>

        <div class="mb-3">
            <label for="signup-lastname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="signup-lastname" name="surname">
        </div>

        <div class="mb-3">
            <label for="signup-lastname" class="form-label">Логин</label>
            <input type="text" class="form-control" id="signup-login" name="login">
        </div>

        <div class="mb-3">
            <label for="signup-password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="signup-password" name="password">
        </div>

        <div class="mb-3">
            <label for="signup-password-confirm" class="form-label">Подтверждение пароля</label>
            <input type="password" class="form-control" id="signup-password-confirm" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-success w-100">Отправить</button>
    </form>
</div>