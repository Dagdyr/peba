<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'max:10', 'before:'.Carbon::today()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }


    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'email.email' => 'Введите существующую почту',
            'email.unique' => 'Такая почта уже использовалась для регистрации на нашем сайте, войдите в аккаунт или используйте другую',
            'password.required' => 'Поле :attribute обязательно для заполнения',
            'password.min' => 'Пароль должен быть не меньше 8 символов',
            'password.confirmed' => 'Пароль и его подтверждение не совпадают',
            'birthday.before' => 'Вы ввели невозможную дату рождения',
            'birthday.max' => 'Вы ввели невозможную дату рождения',
        ];
    }
}
