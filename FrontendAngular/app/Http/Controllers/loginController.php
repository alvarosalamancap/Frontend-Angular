namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login'); // asegúrate de que esta vista exista en resources/views/auth/login.blade.php
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los campos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar autenticación
        if (Auth::attempt($request->only('email', 'password'))) {
            // Si es exitoso, redirigir a la página deseada
            return redirect()->intended('dashboard');
        }

        // Si la autenticación falla, redirigir con errores
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput();
    }
}
