<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class InscriptionsController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        return view('inscriptions.index');
    }

}