<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
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
        $this->middleware('auth');
        $this->user = \Sentinel::getUser();
    }

    public function index()
    {
        return view('teachers.index');
    }

    public function create()
    {
        return view('teachers.create');
    }


}
