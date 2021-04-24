<?php

namespace App\Controllers;

use App\Models\Student;

class StudentController extends BaseController
{

    public function index()
    {

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '2') {
            return redirect()->to('home');
        }

        $Student = new Student();

        $record = $Student->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data = [
            'first_name' => $record['first_name'],
            'last_name' => $record['last_name']
        ];

        return view('student/index', $data);
    }
}
