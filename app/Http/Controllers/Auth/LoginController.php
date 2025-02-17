<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller; // Importa la clase Controller correcta
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log; // Asegúrate de importar Log para la depuración
use Illuminate\Http\Request; // IMPORTANTE: Asegúrate de importar la clase Request

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Este es el método que Laravel utiliza para hacer login.
    public function login(Request $request)
    {
        // Agrega la depuración para ver si el correo y la contraseña están llegando correctamente.
        Log::info('Email: ' . $request->email);
        Log::info('Password: ' . $request->password);

        // Si las credenciales son correctas, Laravel se encargará del resto
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // Si no se pudieron verificar las credenciales
        return $this->sendFailedLoginResponse($request);
    }
}
