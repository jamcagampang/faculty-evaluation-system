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
            'evaluated' => 0,
            'questionaire' => []
        ];

        $query = $this->db->query('select * from faculty where id != ' . $_SESSION['id'] . ' order by first_name ASC');

        $results = $query->getResult();

        foreach ($results as $row) {
            $data['faculties'][] = (array) $row;
        }

        $query = $this->db->query('select count(1) as c from evaluation_faculty where evaluator = ' . $_SESSION['id']);

        $results = $query->getResult();

        foreach ($results as $row) {
            $data['evaluated'] = $row->c;
        }

        $questionaireString = file_get_contents('./questionaire.json');
        $questionaireArray = json_decode($questionaireString, true);

        $data['questionaire'] = $questionaireArray;

        return view('faculty/feedback', $data);
    }

    public function addFeedback()
    {

        $EvaluationFaculty = new EvaluationFaculty();

        $EvaluationFaculty->where(array('evaluator' => $_SESSION['id'], 'evaluatee' => $this->request->getVar('evaluatee')))->delete();

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
            'evaluator' => $_SESSION['id'],
            'evaluatee'  => $this->request->getVar('evaluatee'),
            'content'  => json_encode($content)
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

        // All Faculty
        $query = $this->db->query('select * from faculty where id != ' . $_SESSION['id']);

        $results = $query->getResult();

        foreach ($results as $row) {
            $f = (array) $row;
            $f['s'] = $f['id'] == $id;
            $data['faculties'][] = $f;
        }

        if ($id == null && isset($data['faculties'][0])) {
            return redirect()->to('/faculty/result/' . $data['faculties'][0]['id']);
        }

        $query = $this->db->query('select * from evaluation_faculty where evaluatee = ' . $id . ' and evaluator = ' . $_SESSION['id']);

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

        return view('faculty/report', $data);
    }

    private function average($array) {

        if (count($array) == 0) {
            return 0;
        }

        return round(array_sum($array) / count($array), 2);
    }
}
