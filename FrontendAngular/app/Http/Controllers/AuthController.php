<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        try {
            return view('login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function registerForm(){
        try {
            // Muestra la vista del formulario de registro
            return view("register");
        } catch (\Exception $e) {
            // En caso de excepción, redirige a la página anterior con un mensaje de error
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function makeMessagesRegister(){
    
        return [
            'name.required' => 'Debe ingresar su nombre.',
            'lastname.required' => 'Debe ingresar su apellido.',
            'email.required' => 'Debe ingresar su correo electrónico.',
            'email.email' => 'El campo correo debe ser un correo válido.',
            'email.unique' => 'El correo ingresado ya está en uso.',
            'password.required' => 'Debe ingresar una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'role.required' => 'Debe seleccionar un rol.',
            'rut.required' => 'Debe ingresar su RUT.',
            'rut.regex' => 'El RUT ingresado no es válido.',
            'rut.unique' => 'El RUT ingresado ya está en uso.',
            'phone.required' => 'Debe ingresar su número de teléfono.',
            'phone.regex' => 'El número de teléfono ingresado no es válido.',
            'phone.max' => 'El número de teléfono ingresado no es válido.',
            'phone.min' => 'El número de teléfono ingresado no es válido.',
            'phone.unique' => 'El número de teléfono ingresado ya está en uso.',
            
        ];

    }

    function makeMessages(){

        $messages = [
            'email.required' => 'Debe ingresar su correo electrónico para iniciar sesión.',
            'password.required' => 'Debe ingresar su contraseña para iniciar sesión.',
            'email.email' => 'El campo correo debe ser un correo válido.',
            'password.min' => 'El campo contraseña debe tener al menos 6 caracteres.',
            'password.max' => 'El campo contraseña debe tener menos de 255 caracteres.',
    
        ];
    
        return $messages;
    }
    
    public function register(Request $request)
    {

        $messages = $this->makeMessagesRegister();

        // Validar la solicitud
        $request->validate([
            'rut' => [
                'required',
                'string',
                'max:10',
                'regex:/^\d{7,8}-[0-9K]$/', // Valida el formato 11111111-1 o 1111111-K
            ],
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|regex:/^\+56\d{9,12}$/',
        ], $messages);

        $rut = str_replace('-', '', $request->input('rut'));

        // Crear el usuario
        $user = new User();
        $user->rut = $request->input('rut');
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($rut);
        $user->phone = $request->input('phone');
        $user->role = 'user'; // Ajusta según tu lógica
        $user->register_date = now();
        $user->save();

        // Redirigir a la página de inicio de sesión o cualquier otra página
        return redirect()->route('loginForm')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }

    public function login(Request $request)
    {

        $messages = $this->makeMessages();
        // Validar la solicitud
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], $messages);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index'); // Redirige a la vista 'dashboard'
        }

        return back()->withErrors([
            'email' => 'Correo o contraseña incorrecta',
        ])->onlyInput('email');

        // Redirigir a la página de inicio de sesión con un mensaje de error
        // return redirect()->route('loginForm')->with('error', 'Credenciales incorrectas.');
    }



}