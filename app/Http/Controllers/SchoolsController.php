<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\Cities;
use App\Models\Schools;
use App\Models\Supervisions;


class SchoolsController extends Controller
{
    protected $user;

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->user = \Sentinel::getUser();
    }

    public function index()
    {
        $schools = Schools::all();
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        $cities = Cities::all(['description', 'id']);
        $citiesJson = json_encode($cities);
        $supervision = Supervisions::all(['description', 'id']);
        $supervisionJson = json_encode($supervision);
        return view('schools.create', compact('citiesJson', 'supervisionJson'));
    }

    public function store(SchoolRequest $request)
    {
        $input = $request->all();

        try{
            if (Schools::create($input)){
                \Log::info('School created successfully');
                return redirect()->route('schools.index')->with('success', 'Colegio creado exitosamente');
            }else{
                \Log::warning('Failed to create School ');
                return redirect()->back()->with('error', 'Ocurrio un error al crear el registro')->withInput();
            }
        }catch (\Exception $e){
            \Log::warning($e->getMessage());
            \Log::warning('Failed to create School ');
            return redirect()->route('schools.index')->with('error', 'Ocurrio un error al crear el registro')->withInput();
        }
    }

    public function edit($id)
    {
        if ($school = Schools::find($id)){
            $cities = Cities::all(['description', 'id']);
            $citiesJson = json_encode($cities);
            $supervision = Supervisions::all(['description', 'id']);
            $supervisionJson = json_encode($supervision);
            return view('schools.edit', compact('school', 'citiesJson', 'supervisionJson'));
        }

        return redirect()->back()->with('error', 'Colegio no encontrado.');
    }

    public function update(SchoolRequest $request, $id)
    {
        if (!$school = Schools::find($id)){
            return redirect()->back()->with('error', 'Colegio no encontrado.');
        }

        $input = $request->all();

        $school->fill($input);

        if ($school->save()) {

            \Log::info('Colegio actualizado.');

            return redirect()
                ->route('schools.index')
                ->with('success', 'Colegio actualizado correctamente');
        }

        \Log::error('Colegio no actualizado');
        return redirect()
            ->route('schools.index')
            ->with('error', 'Ocurrio un error al intentar actualizar el colegio');
    }

    public function destroy($id)
    {
        if (!$this->user->hasAccess('schools.delete')) {
            \Log::error('Unauthorized access attempt',
                ['user' => $this->user->username, 'route' => \Request::route()->getActionName()]);
            return response()->json([
                'error' => true,
                'message' => 'No posee permmisos para realizar esta acción',
            ]);
        }

        $message = '';
        $error = '';
        if ($school = Schools::find($id)) {
            try {
                if (Schools::destroy($id)) {
                    $message = 'Colegio eliminado correctamente';
                    $error = false;
                }
            } catch (\Exception $e) {
                \Log::error("Error deleting school: " . $e->getMessage());
                $message = 'Error al intentar eliminar el colegio';
                $error = true;
            }
        }else{
            \Log::warning("School {$id} not found");
            $message =  'Colegio no encontrado';
            $error = true;
        }

        return response()->json([
            'error' => $error,
            'message' => $message,
        ]);
    }
}