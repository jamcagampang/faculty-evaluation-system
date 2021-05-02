<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\FacultyCourseAssignment;
use App\Models\Student;
use App\Models\StudentCourseAssignment;

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

    public function addFacultyView()
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

        return view('admin/create-faculty', $data);
    }

    public function addFaculty()
    {

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

    public function listFaculty()
    {

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

        $data['name'] = $record['name'];

        return view('admin/list-faculty', $data);
    }

    public function addStudentView()
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

        return view('admin/create-student', $data);
    }

    public function addStudent()
    {

        $Student = new Student();

        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'middle_name'  => $this->request->getVar('middle_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'student_id'  => $this->request->getVar('student_id'),
            'email_address'  => $this->request->getVar('email_address'),
            'password'  => md5('123456')
        ];

        $Student->insert($data);

        return redirect()->to('/admin/student/list');
    }

    public function listStudent()
    {

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

        $data['name'] = $record['name'];

        return view('admin/list-student', $data);
    }

    public function addCourseView()
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

        return view('admin/create-course', $data);
    }

    public function addCourse()
    {

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

    public function listCourse()
    {

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

        $data['name'] = $record['name'];

        return view('admin/list-course', $data);
    }

    public function assignFacultyCourseView()
    {

        $Faculty = new Faculty();
        $Course = new Course();

        $data['faculties'] = $Faculty->orderBy('first_name', 'ASC')->findAll();
        $data['courses'] = $Course->orderBy('course_name', 'ASC')->findAll();

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

        $data['name'] = $record['name'];

        if (isset($_SESSION['faculty'])) {
            $data['faculty'] = $_SESSION['faculty'];
            unset($_SESSION['faculty']);
        }

        if (isset($_SESSION['course'])) {
            $data['course'] = $_SESSION['course'];
            unset($_SESSION['course']);
        }

        return view('admin/assign-faculty', $data);
    }

    public function assignFacultyCourse()
    {

        $facultyId = $this->request->getVar('faculty');
        $courseId = $this->request->getVar('course');

        if ($facultyId == 0 || $courseId == 0) {
            return redirect()->to('/admin/faculty/assign');
        }

        $FacultyCourseAssignment = new FacultyCourseAssignment();

        $FacultyCourseAssignment->where([
            'faculty_id' => $facultyId,
            'course_id'  => $courseId
        ])->delete();

        $data = [
            'faculty_id' => $facultyId,
            'course_id'  => $courseId
        ];

        $FacultyCourseAssignment->insert($data);

        $Faculty = new Faculty();
        $Course = new Course();

        $facultyRecord = $Faculty->where('id', $facultyId)->first();
        $courseRecord = $Course->where('id', $courseId)->first();

        $_SESSION['faculty'] = implode(' ', array($facultyRecord['first_name'], $facultyRecord['middle_name'], $facultyRecord['last_name']));
        $_SESSION['course'] = $courseRecord['course_name'] . ' (' . $courseRecord['course_code'] . ')';

        return redirect()->to('/admin/faculty/assign');
    }

    public function assignStudentCourseView()
    {

        $Student = new Student();
        $Course = new Course();

        $data['students'] = $Student->orderBy('first_name', 'ASC')->findAll();
        $data['courses'] = $Course->orderBy('course_name', 'ASC')->findAll();

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

        $data['name'] = $record['name'];

        if (isset($_SESSION['student'])) {
            $data['student'] = $_SESSION['student'];
            unset($_SESSION['student']);
        }

        if (isset($_SESSION['course'])) {
            $data['course'] = $_SESSION['course'];
            unset($_SESSION['course']);
        }

        return view('admin/assign-student', $data);
    }

    public function assignStudentCourse()
    {

        $studentId = $this->request->getVar('student');
        $courseId = $this->request->getVar('course');

        if ($studentId == 0 || $courseId == 0) {
            return redirect()->to('/admin/student/assign');
        }

        $StudentCourseAssignment = new StudentCourseAssignment();

        $StudentCourseAssignment->where([
            'student_id' => $studentId,
            'course_id'  => $courseId
        ])->delete();

        $data = [
            'student_id' => $studentId,
            'course_id'  => $courseId
        ];

        $StudentCourseAssignment->insert($data);

        $Student = new Student();
        $Course = new Course();

        $studentRecord = $Student->where('id', $studentId)->first();
        $courseRecord = $Course->where('id', $courseId)->first();

        $_SESSION['student'] = implode(' ', array($studentRecord['first_name'], $studentRecord['middle_name'], $studentRecord['last_name']));
        $_SESSION['course'] = $courseRecord['course_name'] . ' (' . $courseRecord['course_code'] . ')';

        return redirect()->to('/admin/student/assign');
    }

    public function reportViewFaculty($id = false)
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
            'name' => $record['name'],
            'faculties' => [],
            'evaluation' => []
        ];

        // All Faculty
        $query = $this->db->query('select * from faculty');

        $results = $query->getResult();

        foreach ($results as $row) {
            $f = (array) $row;
            $f['s'] = $f['id'] == $id;
            $data['faculties'][] = $f;
        }

        if ($id == null && isset($data['faculties'][0])) {
            return redirect()->to('/admin/report/faculty/' . $data['faculties'][0]['id']);
        }

        $query = $this->db->query('select * from evaluation_faculty where evaluatee = ' . $id);

        $results = $query->getResult();

        $questionaireString = file_get_contents('./questionaire.json');
        $questionaireArray = json_decode($questionaireString, true);

        $questionaire = $questionaireArray;

        $count = 0;

        $lastPartValue = [];
        $lastPart = [];
        $headers = [];
        $comments = [];

        // Last Part Intialization
        foreach($questionaire['criteria'] as $i => $c) {

            $lastPart[$i] = [];
            $lastPartValue[$i] = [];

            $header = [
                'text' => $c['name'],
                'count' => count($c['questions'])
            ];

            $headers[$i] = $header;

            foreach ($c['questions'] as $j => $q) {
                $lastPartValue[$i][$j] = [];
                $headers[$i]['questions'][$j] = $j + 1;
            }
        }

        $data['headers'] = $headers;

        foreach ($results as $row) {

            $contentString = $row->content;
            $contentArray = json_decode($contentString, true);

            $assessment = [];

            foreach($contentArray as $i => $c) {

                $criteriaDisplay = [
                    'rate' => $c['answer'],
                    'average' => $this->average($c['answer'])
                ];

                $assessment[] = $criteriaDisplay;

                foreach ($c['answer'] as $j => $a) {
                    $lastPartValue[$i][$j][] = $a;
                }

                if (!empty($c['comment'])) {
                    $comments[] = $c['comment'];
                }
            }

            $data['evaluation'][] = $assessment;

            $count++;
        }

        foreach ($lastPartValue as $i => $c) {
            foreach ($c as $j => $q) {
                $lastPart[$i][$j] = $this->average($q);
            }
        }

        $data['last_part'] = $lastPart;
        $data['comments'] = $comments;

        return view('admin/report-faculty', $data);
    }

    public function reportViewStudent($id = false, $id2 = false)
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

        $Course = new Course();

        $data = [
            'name' => $record['name'],
            'faculties' => [],
            'courses' => [],
            'evaluation' => []
        ];

        // All Faculty
        $query = $this->db->query('select * from faculty');

        $results = $query->getResult();

        foreach ($results as $row) {
            $f = (array) $row;
            $f['s'] = $f['id'] == $id;
            $data['faculties'][] = $f;
        }

        // All Course
        $query = $this->db->query('select * from course');

        $results = $query->getResult();

        foreach ($results as $row) {
            $c = (array) $row;
            $c['s'] = $c['id'] == $id2;
            $data['courses'][] = $c;
        }

        if ($id == null && isset($data['faculties'][0])) {

            if ($id2 == null && isset($data['courses'][0])) {
                return redirect()->to('/admin/report/student/' . $data['faculties'][0]['id'] . '/' . $data['courses'][0]['id']);
            }

            return redirect()->to('/admin/report/student/' . $data['faculties'][0]['id']);
        } else if ($id != null && $id2 == null && isset($data['courses'][0])) {
            return redirect()->to('/admin/report/student/' . $id . '/' . $data['courses'][0]['id']);
        }

        $query = $this->db->query('select * from evaluation_student where faculty_id = ' . $id . ' and course_id = ' . $id2);

        $results = $query->getResult();

        $questionaireString = file_get_contents('./questionaire.json');
        $questionaireArray = json_decode($questionaireString, true);

        $questionaire = $questionaireArray;

        $count = 0;

        $lastPartValue = [];
        $lastPart = [];
        $headers = [];
        $comments = [];

        // Last Part Intialization
        foreach($questionaire['criteria'] as $i => $c) {

            $lastPart[$i] = [];
            $lastPartValue[$i] = [];

            $header = [
                'text' => $c['name'],
                'count' => count($c['questions'])
            ];

            $headers[$i] = $header;

            foreach ($c['questions'] as $j => $q) {
                $lastPartValue[$i][$j] = [];
                $headers[$i]['questions'][$j] = $j + 1;
            }
        }

        $data['headers'] = $headers;

        foreach ($results as $row) {

            $contentString = $row->content;
            $contentArray = json_decode($contentString, true);

            $assessment = [];

            foreach($contentArray as $i => $c) {

                $criteriaDisplay = [
                    'rate' => $c['answer'],
                    'average' => $this->average($c['answer'])
                ];

                $assessment[] = $criteriaDisplay;

                foreach ($c['answer'] as $j => $a) {
                    $lastPartValue[$i][$j][] = $a;
                }

                if (!empty($c['comment'])) {
                    $comments[] = $c['comment'];
                }
            }

            $data['evaluation'][] = $assessment;

            $count++;
        }

        foreach ($lastPartValue as $i => $c) {
            foreach ($c as $j => $q) {
                $lastPart[$i][$j] = $this->average($q);
            }
        }

        $data['last_part'] = $lastPart;
        $data['comments'] = $comments;

        return view('admin/report-student', $data);
    }

    private function average($array) {

        if (count($array) == 0) {
            return 0;
        }

        return round(array_sum($array) / count($array), 2);
    }
}
