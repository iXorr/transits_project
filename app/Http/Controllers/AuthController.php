<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public const SIGN_IN_PAGE = "/auth?action=sign-in";
    public const SIGN_UP_PAGE = "/auth?action=sign-up";

    public static function findUser(Request $request) {
        return User::where("login", $request->login)->first();
    }

    public static function getRegValidator(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "surname" => "required|string|max:255",
            "login" => [
                "required",
                "string",
                "max:255",
                "regex:/^[a-zA-Z0-9]+$/"
            ],

            "password" => [
                "required",
                "string",
                "confirmed",
                "min:6",
                "regex:/^[a-zA-Z0-9]+$/"
            ],
            
            "user_role" => [
                "required",
                Rule::exists("user_roles", "title"),
            ],
        ], [
            "name.required" => "Нужно ввести имя",
            "surname.required" => "Нужно ввести фамилию",
            "login.required" => "Нужно ввести логин",
            "login.regex" => "Логин может включать только латиницу и цифры",
            "password.required" => "Нужно ввести пароль",
            "password.min" => "Пароль должен содержать не менее 6 символов",
            "password.confirmed" => "Пароли не совпадают",
            "password.regex" => "Пароль может включать только латиницу и цифры",
            "user_role.required" => "Нужно выбрать роль",
            "user_role.exists" => "Данной роли не существует"
        ]);

        return $validator;
    }

    public function index() {
        $roles = UserRole::all();
        return view('auth', [
            "roles" => $roles,
            "title" => "Авторизация"
        ]);
    }

    public function tryLogin(Request $request) {
        $user = self::findUser($request);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect(self::SIGN_IN_PAGE)->withErrors([
                "incorrect_data" => "Неверный логин или пароль"
            ]);
        }

        Auth::login($user);
        return redirect("/");
    }

    public function tryRegister(Request $request) {
        $user = self::findUser($request);

        if ($user)
            return redirect(self::SIGN_UP_PAGE)->withErrors([
                "existing_user" => "Клиент с таким логином уже существует"
            ]);

        $validator = $this::getRegValidator($request);

        if ($validator->fails())
            return redirect(self::SIGN_UP_PAGE)
                ->withErrors($validator)
                ->withInput();

        $validated = $validator->validated();

        $user = User::create([
            "user_role_id" => UserRole::getId($validated["user_role"]),
            "login" => $validated["login"],
            "name" => $validated["name"],
            "surname" => $validated["surname"],
            "password" => Hash::make($validated["password"])
        ]);
        
        Auth::login($user);
        return redirect("/");
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
