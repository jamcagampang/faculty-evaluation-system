<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class StudentController extends Controller
{

    public function index()
    {
        return view('student/index');
    }
}
