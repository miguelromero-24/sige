<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\TeacherRequest;
use App\Models\Cities;
use App\Models\Permission;
use App\Models\Schools;
use App\Models\Teachers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;

class TeachersController extends Controller
{
    protected $user;

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->user = \Sentinel::getUser();
    }

    public function index()
    {
        $teachers = Teachers::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $cities = Cities::all(['description', 'id']);
        $citiesJson = json_encode($cities);
        $schools = Schools::all(['description', 'id']);
        $schoolsJson = json_encode($schools);
        return view('teachers.create', compact('citiesJson', 'schoolsJson'));
    }

    public function store(TeacherRequest $request)
    {
        $input = $request->all();

        try {
            if ($teacher = Teachers::create($input)) {
                if (!empty($input['school_id'])) {
                    $teacher->schools()->attach($input['school_id']);
                    \Log::info('Colegios agregados a docente');
                }
                \Log::info('Teacher created successfully');
                return redirect()->route('teachers.index')->with('success', 'Docente creado exitosamente');
            } else {
                \Log::warning('Failed to create Teacher ');
                return redirect()->back()->with('error', 'Ocurrio un error al crear el registro')->withInput();
            }
        } catch (\Exception $e) {
            \Log::warning($e->getMessage());
            \Log::warning('Failed to create Teacher ');
            return redirect()->route('teachers.index')->with('error', 'Ocurrio un error al crear el registro')->withInput();
        }
    }

    public function edit($id)
    {
        if ($teacher = Teachers::find($id)) {
            $cities = Cities::all(['description', 'id']);
            $citiesJson = json_encode($cities);
            $schools = Schools::all(['description', 'id']);
            $schoolsJson = json_encode($schools);
            return view('teachers.edit', compact('teacher', 'citiesJson', 'schoolsJson'));
        }

        return redirect()->back()->with('error', 'Docente no encontrado.');
    }

    public function update(TeacherRequest $request, $id)
    {
        if (!$teacher = Teachers::find($id)) {
            return redirect()->back()->with('error', 'Docente no encontrado.');
        }

        $input = $request->all();

        $teacher->fill($input);

        if ($teacher->save()) {

            \Log::info('Colegio actualizado.');
            if (!empty($input['school_id'])) {
                $teacher->schools()->attach($input['school_id']);
                \Log::info('Colegios agregados a docente');
            }
            return redirect()
                ->route('schools.index')
                ->with('success', 'Colegio actualizado correctamente');
        }

        \Log::error('Colegio no actualizado');
        return redirect()
            ->route('schools.index')
            ->with('error', 'Ocurrio un error al intentar actualizar el colegio');
    }

    public
    function destroy($id)
    {
//        if (!$this->user->hasAccess('schools.delete')) {
//            \Log::error('Unauthorized access attempt',
//                ['user' => $this->user->username, 'route' => \Request::route()->getActionName()]);
//            return response()->json([
//                'error' => true,
//                'message' => 'No posee permmisos para realizar esta acción',
//            ]);
//        }

        $message = '';
        $error = '';
        if ($role = Teachers::find($id)) {
            try {
                if (Teachers::destroy($id)) {
                    $message = 'Docente eliminado correctamente';
                    $error = false;
                }
            } catch (\Exception $e) {
                \Log::error("Error deleting teacher: " . $e->getMessage());
                $message = 'Error al intentar eliminar el docente';
                $error = true;
            }
        } else {
            \Log::warning("Teacher {$id} not found");
            $message = 'Docente no encontrado';
            $error = true;
        }

        return response()->json([
            'error' => $error,
            'message' => $message,
        ]);
    }


}
