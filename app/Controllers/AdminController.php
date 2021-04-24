<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;

class AdminController extends BaseController
{

    public function index()
    {

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '0') {
            return redirect()->to('home');
        }

        $Admin = new Admin();

        $record = $Admin->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data = [
            'name' => $record['name']
        ];

        return view('admin/index', $data);
    }

    public function addFacultyView() {

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '0') {
            return redirect()->to('home');
        }

        $Admin = new Admin();

        $record = $Admin->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data = [
            'name' => $record['name']
        ];

        return view('admin/create-faculty', $data);
    }

    public function addFaculty() {

        $Faculty = new Faculty();

        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'middle_name'  => $this->request->getVar('middle_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'email_address'  => $this->request->getVar('email_address'),
            'password'  => md5('123456'),
            'designation'  => $this->request->getVar('designation'),
            'department'  => $this->request->getVar('department')
        ];

        $Faculty->insert($data);

        return redirect()->to('/admin/faculty/list');
    }

    public function listFaculty() {

        $Faculty = new Faculty();

        $data['list'] = $Faculty->orderBy('id', 'DESC')->findAll();

        foreach ($data['list'] as &$item) {

            switch ($item['designation']) {
                case 'ftf':
                    $item['designation'] = 'Full-time Faculty';
                    break;
                case 'ptf':
                    $item['designation'] = 'Part-time Faculty';
                    break;
                default:
                    $item['designation'] = 'Unknown';
                    break;
            }

            switch ($item['department']) {
                case 'gs':
                    $item['department'] = 'Grade School';
                    break;
                case 'jhs':
                    $item['department'] = 'Junior High School';
                    break;
                case 'shs':
                    $item['department'] = 'Senior High School';
                    break;
                case 'iba':
                    $item['department'] = 'Institute of Business Administration';
                    break;
                case 'ics':
                    $item['department'] = 'Institute of Copumter Studies';
                    break;
                case 'ieas':
                    $item['department'] = 'Institute of Education, Arts and Sciences';
                    break;
                case 'ihmac':
                    $item['department'] = 'Institute of Hospitality Management and Allied Courses';
                    break;
                case 'in':
                    $item['department'] = 'Institute of Nursing';
                    break;
                default:
                    $item['department'] = 'Unknown';
                    break;
            }
        }

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '0') {
            return redirect()->to('home');
        }

        $Admin = new Admin();

        $record = $Admin->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data ['name'] = $record['name'];

        return view('admin/list-faculty', $data);
    }

    public function addStudentView() {

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '0') {
            return redirect()->to('home');
        }

        $Admin = new Admin();

        $record = $Admin->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data = [
            'name' => $record['name']
        ];

        return view('admin/create-student', $data);
    }

    public function addStudent() {

        $Student = new Student();

        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'middle_name'  => $this->request->getVar('middle_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'email_address'  => $this->request->getVar('email_address'),
            'password'  => md5('123456')
        ];

        $Student->insert($data);

        return redirect()->to('/admin/student/list');
    }

    public function listStudent() {

        $Student = new Student();

        $data['list'] = $Student->orderBy('id', 'DESC')->findAll();

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '0') {
            return redirect()->to('home');
        }

        $Admin = new Admin();

        $record = $Admin->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data ['name'] = $record['name'];

        return view('admin/list-student', $data);
    }

    public function addCourseView() {

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '0') {
            return redirect()->to('home');
        }

        $Admin = new Admin();

        $record = $Admin->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data = [
            'name' => $record['name']
        ];

        return view('admin/create-course', $data);
    }

    public function addCourse() {

        $Course = new Course();

        $data = [
            'course_name' => $this->request->getVar('course_name'),
            'course_code'  => $this->request->getVar('course_code'),
            'semester'  => $this->request->getVar('semester'),
            'batch'  => $this->request->getVar('batch')
        ];

        $Course->insert($data);

        return redirect()->to('/admin/course/list');
    }

    public function listCourse() {

        $Course = new Course();

        $data['list'] = $Course->orderBy('id', 'DESC')->findAll();

        // No session yet.
        if ($_SESSION['type'] == null || $_SESSION['id'] == null || $_SESSION['type'] !== '0') {
            return redirect()->to('home');
        }

        $Admin = new Admin();

        $record = $Admin->where('id', $_SESSION['id'])->first();

        // Non-existent ID.
        if (!isset($record)) {
            return redirect()->to('home');
        }

        $data ['name'] = $record['name'];

        return view('admin/list-course', $data);
    }
}
