<?php

namespace App\Controllers;

use App\Models\EvaluationStudent;
use App\Models\Faculty;
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

    public function feedbackView()
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
            'last_name' => $record['last_name'],
            'faculties' => [],
            'courses' => [],
            'evaluated' => 0,
            'questionaire' => []
        ];

        $query = $this->db->query('select distinct f.id, f.first_name, f.middle_name, f.last_name from student_course_assignment as acs left join faculty_course_assignment as fcs on acs.course_id = fcs.course_id left join course as c on acs.course_id = c.id left join faculty as f on fcs.faculty_id = f.id WHERE acs.student_id = ' . $_SESSION['id']);

        $results = $query->getResult();

        foreach ($results as $row) {
            $data['faculties'][] = (array) $row;
        }

        $query = $this->db->query('select distinct c.id, c.course_name, c.course_code from student_course_assignment as acs left join faculty_course_assignment as fcs on acs.course_id = fcs.course_id left join course as c on acs.course_id = c.id left join faculty as f on fcs.faculty_id = f.id WHERE acs.student_id = ' . $_SESSION['id']);

        $results = $query->getResult();

        foreach ($results as $row) {
            $data['courses'][] = (array) $row;
        }

        $query = $this->db->query('select count(1) as c from evaluation_student where student_id = ' . $_SESSION['id']);

        $results = $query->getResult();

        foreach ($results as $row) {
            $data['evaluated'] = $row->c;
        }

        $questionaireString = file_get_contents('./questionaire.json');
        $questionaireArray = json_decode($questionaireString, true);

        $data['questionaire'] = $questionaireArray;

        return view('student/feedback', $data);
    }

    public function addFeedback()
    {

        $EvaluationStudent = new EvaluationStudent();

        $EvaluationStudent->where(array('student_id' => $_SESSION['id'], 'faculty_id' => $this->request->getVar('faculty'), 'course_id' => $this->request->getVar('course')))->delete();

        $content = [];

        $questionaireString = file_get_contents('./questionaire.json');
        $questionaireArray = json_decode($questionaireString, true);

        $criteria = $questionaireArray['criteria'];

        foreach($criteria as $i => $c) {

            $dbCriteria = [
                'answer' => [],
                'comment' => ''
            ];

            foreach($c['questions'] as $j => $q) {

                $answer = $this->request->getVar('c' . $i . 'q' . $j);

                $dbCriteria['answer'][$j] = $answer;
            }

            $dbCriteria['comment'] = $this->request->getVar('comment' . $i);

            $content[$i] = $dbCriteria;
        }

        $data['questionaire'] = $questionaireArray;

        $data = [
            'student_id' => $_SESSION['id'],
            'faculty_id'  => $this->request->getVar('faculty'),
            'course_id'  => $this->request->getVar('course'),
            'content'  => json_encode($content)
        ];

        $EvaluationStudent->insert($data);

        return redirect()->to('/student/feedback');
    }
}
