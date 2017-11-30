<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class InscriptionsController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        $shift = Shift::all(['description', 'id']);
        $shiftJson = json_encode($shift);
        $course = Courses::all();
        $courseJson = json_encode($course);
        return view('inscriptions.index', compact('shiftJson', 'courseJson'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}