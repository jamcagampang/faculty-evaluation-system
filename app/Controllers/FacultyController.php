<?php

namespace App\Controllers;

use App\Models\Faculty;

class FacultyController extends BaseController
{

    public function index()
    {

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '1') {
            return redirect()->to('home');
        }

        $Faculty = new Faculty();

        $record = $Faculty->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data = [
            'first_name' => $record['first_name'],
            'last_name' => $record['last_name']
        ];

        return view('faculty/index', $data);
    }
}
