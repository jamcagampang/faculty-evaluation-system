<?php

namespace App\Controllers;

use App\Models\EvaluationFaculty;
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

    public function feedbackView()
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
            'last_name' => $record['last_name'],
            'faculties' => [],
            'evaluated' => 0
        ];

        $query = $this->db->query('select * from faculty where id != ' . $_SESSION['id']);

        $results = $query->getResult();

        foreach ($results as $row) {
            $data['faculties'][] = (array) $row;
        }

        $query = $this->db->query('select count(1) as c from evaluation_faculty where evaluator = ' . $_SESSION['id']);

        $results = $query->getResult();

        foreach ($results as $row) {
            $data['evaluated'] = $row->c;
        }

        return view('faculty/feedback', $data);
    }

    public function addFeedback()
    {

        $EvaluationFaculty = new EvaluationFaculty();

        $EvaluationFaculty->where(array('evaluator' => $_SESSION['id'], 'evaluatee' => $this->request->getVar('evaluatee')))->delete();

        $data = [
            'evaluator' => $_SESSION['id'],
            'evaluatee'  => $this->request->getVar('evaluatee'),
            'rate_1'  => $this->request->getVar('q1'),
            'rate_2'  => $this->request->getVar('q2'),
            'rate_3'  => $this->request->getVar('q3'),
            'rate_4'  => $this->request->getVar('q4'),
            'rate_5'  => $this->request->getVar('q5')
        ];

        $EvaluationFaculty->insert($data);

        return redirect()->to('/faculty/feedback');
    }

    public function reportView($id = false)
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
            'last_name' => $record['last_name'],
            'faculties' => [],
            'evaluation' => []
        ];

        $query = $this->db->query('select * from faculty');

        $results = $query->getResult();

        foreach ($results as $row) {
            $f = (array) $row;
            $f['s'] = $f['id'] == $id;
            $data['faculties'][] = $f;
        }

        if ($id == null && isset($data['faculties'][0])) {
            return redirect()->to('/faculty/result/' . $data['faculties'][0]['id']);
        }

        $query = $this->db->query('select * from evaluation_faculty where evaluatee = ' . $id);

        $results = $query->getResult();

        $lastPart = [0, 0, 0, 0, 0];

        $count = 0;

        foreach ($results as $row) {

            $rowArray = (array) $row;

            $rowArray['mean'] = ($rowArray['rate_1'] + $rowArray['rate_2'] + $rowArray['rate_3'] + $rowArray['rate_4'] + $rowArray['rate_5']) / 5;

            $lastPart[0] += $rowArray['rate_1'];
            $lastPart[1] += $rowArray['rate_2'];
            $lastPart[2] += $rowArray['rate_3'];
            $lastPart[3] += $rowArray['rate_4'];
            $lastPart[4] += $rowArray['rate_5'];

            $data['evaluation'][] = $rowArray;

            $count++;
        }

        $lastPart[0] = round($lastPart[0] / $count, 2);
        $lastPart[1] = round($lastPart[1] / $count, 2);
        $lastPart[2] = round($lastPart[2] / $count, 2);
        $lastPart[3] = round($lastPart[3] / $count, 2);
        $lastPart[4] = round($lastPart[4] / $count, 2);

        $data['last_part'] = $lastPart;

        return view('faculty/report', $data);
    }
}
