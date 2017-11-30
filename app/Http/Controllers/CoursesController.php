<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Courses;
use App\Models\Level;
use App\Models\Schools;
use App\Models\Shift;
use App\Models\Teachers;

class CoursesController extends Controller
{
    protected $user;

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->user = \Sentinel::getUser();
    }

    public function index()
    {
        $courses = Courses::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teacher = Teachers::all(['first_name', 'id']);
        $teacherJson = json_encode($teacher);
        $shift = Shift::all(['description', 'id']);
        $shiftJson = json_encode($shift);
        $level = Level::all(['description', 'id']);
        $levelJson = json_encode($level);
        return view('courses.create', compact('teacherJson', 'shiftJson', 'levelJson'));
    }

    public function store(CourseRequest $request)
    {
        $input = $request->all();

        try{
            if (Courses::create($input)){
                \Log::info('Course created successfully');
                return redirect()->route('courses.index')->with('success', 'Curso creado exitosamente');
            }else{
                \Log::warning('Failed to create Teacher ');
                return redirect()->back()->with('error', 'Ocurrio un error al crear el registro')->withInput();
            }
        }catch (\Exception $e){
            \Log::warning($e->getMessage());
            \Log::warning('Failed to create Teacher ');
            return redirect()->route('courses.index')->with('error', 'Ocurrio un error al crear el registro')->withInput();
        }
    }

    public function edit($id)
    {
        if($course = Courses::find($id)) {
            $teacher = Teachers::all(['first_name', 'id']);
            $teacherJson = json_encode($teacher);
            $shift = Shift::all(['description', 'id']);
            $shiftJson = json_encode($shift);
            $level = Level::all(['description', 'id']);
            $levelJson = json_encode($level);
            return view('courses.edit', compact('teacherJson', 'shiftJson', 'levelJson', 'course'));
        }

        return redirect()->back()->with('error', 'Curso no encontrado.');
    }

    public function update(CourseRequest $request, $id)
    {
        if (!$course = Courses::find($id)){
            return redirect()->back()->with('error', 'Curso no encontrado.');
        }

        $input = $request->all();

        $course->fill($input);

        if ($course->save()) {

            \Log::info('Grado actualizado.');

            return redirect()
                ->route('courses.index')
                ->with('success', 'Grado actualizado correctamente');
        }

        \Log::error('Grado no actualizado');
        return redirect()
            ->route('courses.index')
            ->with('error', 'Ocurrio un error al intentar actualizar el grado');
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
        if ($course = Courses::find($id)) {
            try {
                if (Courses::destroy($id)) {
                    $message = 'Curso eliminado correctamente';
                    $error = false;
                }
            } catch (\Exception $e) {
                \Log::error("Error deleting course: " . $e->getMessage());
                $message = 'Error al intentar eliminar el curso';
                $error = true;
            }
        }else{
            \Log::warning("Course {$id} not found");
            $message =  'Curso no encontrado';
            $error = true;
        }

        return response()->json([
            'error' => $error,
            'message' => $message,
        ]);
    }
}
