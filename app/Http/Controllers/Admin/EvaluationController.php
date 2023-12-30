<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        return view('admin.evaluations.index');
    }

    public function edit()
    {
        return view('admin.evaluations.edit');
    }
}
