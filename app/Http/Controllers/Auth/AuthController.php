<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Mail;

class AuthController extends Controller
{
    protected $user;

    /**
     * New Authentication instance
     */
    public function __construct()
    {
        $this->middleware('not_guest',
            [
                'except'    => [
                    'logout', 'reset', 'resetPasswordPage', 'resetPasswordRequest', 'resetPassword', 'forceLogout'
                ]
            ]);
        $this->middleware('auth', ['only' => 'forceLogout']);
        $this->user = \Sentinel::getUser();
    }

    /**
     * Show the Log in page
     * @return |Illuminate|View|View
     */
    public function loginPage()
    {
        return view('auth.login');
    }

    /**
     * Handling user's login attemp
     * @param LoginRequest $request
     * @return $this/|Illuminate|Http|RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $ex = null;
        $credentials = [
            'email'  => $request->get('email'),
            'password'  => $request->get('password')
        ];

        try {
            if (\Sentinel::authenticate($credentials)){
                \Log::info("User logged in", ['user' => $credentials['email']]);
                return redirect()->intended()->with('success', 'Sesion iniciada Correctamente');
            }

            $ex = new \Exception('Invalid Credentials');
            $error = "La combinacion de usuario y contraseña es incorrecta";
        } catch (NotActivatedException $e){
            $ex = $e;
            $error = "Cuenta de Usuario no activada";
        } catch (ThrottlingException $e){
            $delay = $e->getDelay();

            $ex = $e;
            $error = "Su cuenta ha sido bloqueada por {$delay} segundo(s)";
        }

        \Log::warning($ex->getMessage(), [\Request::get('email')]);

        return redirect('login')->withInput()->withErrors($error);
    }

    /**
     * Logout the user and flush Session data.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if (\Sentinel::guest())
            redirect()->back();

        try {
            if (\Sentinel::logout(null, true)) {
                $expired = \Request::get('expired');
                $message = ['success' => 'Sesión terminada exitosamente.'];

                if ($expired)
                    $message = ['warning' => 'Sesión expirada.'];


                \Session::flush();
                return redirect('/login')->with($message);
            } else
                return redirect()->back()->with('error', 'Problemas al terminar la sesion.');
        } catch (\Exception $e) {
            \Log::info($e->getMessage(), [\Input::except('_token')]);
            return redirect()->back()->with('error', 'Usuario sin sesión iniciada.');
        }
    }

    /**
     * Show the Reset Password Page
     *
     * @param $id
     * @param $code
     * @return $this
     */
    public function resetPasswordPage($id, $code)
    {
        return view('auth.reset')
            ->with(compact('id', 'code'))
            ->with(\Request::old());
    }

    /**
     * Process a request for a Password Reset
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPasswordRequest($id)
    {
        if ($user = User::find($id)) {
            $resetCode = $user->getResetPasswordCode();
            Mail::send('mails.reset_password', [
                'user' => $user,
                'link' => route('reset.password.page', [
                    'id'   => $user->id,
                    'code' => $resetCode
                ])],
                function ($message) use ($user) {
                    $message
                        ->to($user->email, ucfirst($user->username))
                        ->subject('[SIGE] Reestablecer Contraseña');
                });
            return redirect()
                ->back()
                ->with('success', 'Se ha enviado un correo con instrucciones para continuar con el cambio de contraseña.');
        }

        return redirect()->back()->with('error', 'No existe el usuario.');

    }


    /**
     * Handle a Password Reset form submission.
     *
     * @param ResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $id = $request->get('id');
        $code = $request->get('code');

        if (!$user = \Sentinel::findUserById($id))
            return redirect()->back()
                ->with('error', 'No existe el Usuario.');

        if ($user->checkResetPasswordCode($code)) {

            \Sentinel::logout($user, true);

            if ($user->attemptResetPassword($code, $request->password)) {
                return redirect()->route('login.page')
                    ->with('success', 'Contraseña cambiada exitosamente.');
            } else {
                return redirect()->back()
                    ->with('error', 'Problemas al cambiar la contraseña, inténtelo de nuevo.');
            }

        } else {
            return redirect()->back()
                ->with('error', 'Código de Reestablecimiento de Contraseña incorrecto.');
        }
    }


}
