<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Schools;
use App\Models\Supervisions;
use App\Models\User;
use App\Services\Password;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class UsersController extends Controller
{

    /**
     * Currently logged in User
     * @var \Cartalyst\Sentinel\Users\UserInterface
     */
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = \Sentinel::getUser();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (!$this->user->hasAccess('users')) {
//            \Log::error('Unauthorized access attempt',
//                ['user' => $this->user->username, 'route' => \Request::route()->getActionName()]);
//            return redirect('/')->with('error', 'No posee permisos para realizar esta accion.');
//        }

        $users = User::paginate(20);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if (!$this->user->hasAccess('users.add|edit')) {
        //    \Log::error('Unauthorized access attempt',
        //        ['user' => $this->user->username, 'action' => \Request::route()->getActionName()]);
        //    return redirect('/')->with('error', 'No posee permisos para realizar esta accion.');
        //}
        
        $permissions = Permission::orderBy('permission')->get();
        $rolesList = Role::all(['id', 'name']);
        $rolesJson = json_encode($rolesList);
        $data = ['permissions' => $permissions,
            'rolesJson' => $rolesJson ];

        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest|Request $request
     * @param Password $password
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request, Password $password)
    {
        //if (!$this->user->hasAccess('users.add|edit')) {
         //   \Log::error('Unauthorized access attempt',
         //       ['user' => $this->user->username, 'action' => \Request::route()->getActionName()]);
         //   return redirect('/')->with('error', 'No posee permisos para realizar esta accion.');
        //}

        \Log::debug("New user inbound");
        $input = $request->all();
        $generatePass = $password->generatePassword();
        // TODO control por supervision - colegios
//        if (\Sentinel::getUser()->isSuperUser()){
//            $supervisionId = $request->get('supervision_id', null);
//            if (empty($supervisionId)) $supervisionId = null;
//        }else{
//            $supervisionId = \Sentinel::getUSer()->supervision_id;
//        }

        $credentials = [
            'username' => $input['username'],
            'email' => $input['email'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'password' => $generatePass,
            'supervision_id' => 1,
            'permissions' => $input['permissions']
        ];
        \Log::debug("New users credentials \n" . print_r($credentials, true));
//        if (!empty($request->get('school_id'))){
//            $permitedSchools = Schools::where('supervision_id', '=', \Sentinel::getUser()->supervision_id)->get();
//            $wishedSchools = Schools::find($request->get('school_id'));
//            if ($permitedSchools->search($wishedSchools) === false){
//                return redirect()->back()->with('error', 'El colegio seleccionado no pertenece a su supervision');
//            }
//            $credentials['school_id'] = $request->get('school_id');
//        }

        if ($user = \Sentinel::register($credentials)) {
            $expectedPermissions = array_pull($input, 'permissions');
            $expectedPermissions = empty($expectedPermissions) ? [] : $expectedPermissions;

            foreach ($expectedPermissions as $p => $v) {
                if ($v['inherited'] === '0') {
                    $user->addPermission($p, isset($v['state']) ? filter_var($v['state'],
                        FILTER_VALIDATE_BOOLEAN) : false);
                }
            }

            if (!$user->save()) {
                \Log::error('Cant update Users Permissions.', $input);
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Problemas al actualizar registro.');
            }
        }

        $activation = \Activation::create($user);

        $data = [
            'user' => $user,
            'password' => $generatePass,
            'link' => route('users.activate', [
                'id' => $user->id,
                'code' => $activation->code
            ])
        ];
        // Temporal
        \Log::info("Activation Code: {$activation->code}");

        Mail::send('mails.account_activation', $data,
            function ($message) use ($user) {
                $message->to($user->email, $user->username)->subject('[SIGE] Activar cuenta');
            });

        $expectedRoles = $input['roles'];

        if (!empty($expectedRoles)) {
            $user->roles()->attach($expectedRoles);
            //\Log::info('Roles agregados a Usuario: ' . $user->username, $expectedRoles);
        }

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente.');

    }

    /**
     * Attempt User account activation
     *
     * @param $id
     * @param $code
     * @return \Response
     */
    public function activate($id, $code)
    {
        $user = \Sentinel::findUserById($id);

        if (!\Activation::complete($user, $code)) {
            return redirect('login.page')->withErrors('Codigo de activacion inválido o expirado');
        }

        /* When the user activate his account, we need to ask for a new personal password */
        $code = $user->getResetPasswordCode();

        return redirect()->route('reset.password.page', ['id' => $user->id, 'code' => $code])
            ->withSuccess('Cuenta de Usuario activada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        if (!$this->user->hasAccess('users.add|edit')) {
//            \Log::error('Unauthorized access attempt',
//                ['user' => $this->user->username, 'action' => \Request::route()->getActionName()]);
//            return redirect('/')->with('error', 'No posee permisos para realizar esta accion.');
//        }
        
        if ($user = User::with('roles')->find($id)) {

            $processedPermissions = $user->getProcessedPermissions()->all();

            $permissions = Permission::orderBy('permission')->get();

            foreach ($permissions as $permission) {
                if (array_key_exists($permission->permission, $processedPermissions)) {
                    $permission->has = $processedPermissions[$permission->permission]['state'];
                    $permission->inherited = $processedPermissions[$permission->permission]['inherited'];
                } else {
                    $permission->has = null;
                    $permission->inherited = null;
                }
            }

            $rolesList = $user->roles()->select(['id', 'name'])->get();
            $rolesIds = $rolesList->implode('id', ',');
            $rolesList = Role::all(['id', 'name']);
            $rolesJson = json_encode($rolesList);
            $data = [
                'user' => $user,
                'rolesJson' => $rolesJson,
                'rolesIds' => $rolesIds,
                'permissions' => $permissions
            ];


//            $supervision = Supervisions::all(['name', 'id']);
//            $data['supervisionJson'] = json_encode($supervision);
//
//            $schools = Schools::all(['description', 'id']);
//            $data['schoolJson'] = json_encode($schools);
            return view('users.edit', $data);
        }

        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->user->hasAccess('users.add|edit')) {
            \Log::error('Unauthorized access attempt',
                ['user' => $this->user->username, 'action' => \Request::route()->getActionName()]);
            return redirect('/')->with('error', 'No posee permisos para realizar esta accion.');
        }

        // Get User with Roles
        if ($user = User::with('roles')->find($id)) {
            // Get the form input
            $input = $request->all();

            // Get the form input expected permissions
            // Permissions Rules:
            //  if state is null and inherited is 0 -> revoked permission user specific
            //  if state is true and inherited is 0 -> grant permission user specific
            //  if state is true and inherited is 1 -> already granted permission role inherited
            //  if state is null and inherited is 1 -> already revoked permission role inherited
            //  if state is null and inherited is null -> permission set in neither role nor user
            $expectedPermissions = array_pull($input, 'permissions');
            $expectedPermissions = empty($expectedPermissions) ? [] : $expectedPermissions;

            foreach ($expectedPermissions as $p => $v) {
                if (!isset($v['inherited']) OR $v['inherited'] === '0') {
                    $user->updatePermission($p, isset($v['state']) ? filter_var($v['state'], FILTER_VALIDATE_BOOLEAN) : false, true);
                }
            }

            if (!$user->save()) {
                \Log::error('Cant update Users Permissions.', $input);
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Problemas al actualizar registro.');
            }
            \Log::debug('Permissions Saved!. ', $input);
            $credentials = [
                'username' => $input['username'],
                'email' => $input['email'],
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name']
            ];

//            if (\Sentinel::getUser()->isSuperUser()) {
//                if (isset($input['owners']) AND empty($input['owners'])) {
//                    $credentials['owner_id'] = null;
//                } else {
//                    $credentials['owner_id'] = $request->get('owners');
//                }
//            }

            // Get array of the User's current Roles IDs
            $currentRoles = [];

            if (!$user->roles->isEmpty())
                $currentRoles = explode(',', $user->roles->implode('id', ','));

            // Get arry of the User's expected Roles IDs
            $expectedRoles = explode(',', $request->get('roles'));

            // Prepare array of Roles to detach from User
            if (!empty($currentRoles))
                $toDetachRoles = array_diff($currentRoles, $expectedRoles);

            if (!empty($toDetachRoles)) {
                $user->roles()->detach($toDetachRoles);
                \Log::info('Roles eliminados de Usuario: ' . $user->username, $toDetachRoles);
            }

            // Prepare array of Roles to attach to User
            $toAttachRoles = array_diff($expectedRoles, $currentRoles);

            if (!empty($toAttachRoles)) {
                $user->roles()->attach($toAttachRoles);
                \Log::info('Roles agregados a Usuario: ' . $user->username, $toAttachRoles);
            }


            // Check if the Branch selected is part of the User's Agent
//            if (!empty($request->get('branch'))) {
//                if (!$user->isSuperUser()) {
//                    $permitedBranches = Branch::where('owner_id', '=', $user->owner_id)->get();
//                    $wishedBranch = Branch::find($request->get('branch'));
//
//                    if ($permitedBranches->search($wishedBranch) === false)
//                        \Log::warning("La sucursal asignada no pertenece a su red");
//                    return redirect()->back()->with('error', 'La sucursal no pertenece a su Agente.');
//                }
//
//                $credentials['branch_id'] = $input['branch'];
//            }


            // Update User with credentials
            $user->update($credentials);
            \Log::info("User {$user->description} updated successfully");
            return redirect()
                ->route('users.index')
                ->with('success', 'Usuario actualizado.');
        }

        return redirect()
            ->route('users.index')
            ->with('error', 'Error al actualizar el Usuario.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->user->hasAccess('users.delete')) {
            \Log::error('Unauthorized access attempt',
                ['user' => $this->user->username, 'action' => \Request::route()->getActionName()]);
            return redirect('/')->with('error', 'No posee permisos para realizar esta accion.');
        }
        
        $message = '';
        $error = '';

        if ($user = User::find($id)) {
            if (User::destroy($id) !== false) {
                \Log::info('User destroy.', $user->toArray());
                $message =  'Usuario eliminado correctamente';
                $error = false;
            }else{
                \Log::warning("Error while trying to destroy user: {$id}");
                $message =  'Error al intentar eliminar el usuario';
                $error = true;
            }
        }else{
            \Log::warning("User {$id} not found");
            $message =  'Usuario no encontrado';
            $error = true;
        }
        return response()->json([
            'error' => $error,
            'message' => $message,
        ]);
    }
}
