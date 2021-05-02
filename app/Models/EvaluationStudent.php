<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluationStudent extends Model
{
    protected $table = 'evaluation_student';

    protected $primaryKey = 'id';

    protected $allowedFields = ['student_id', 'faculty_id', 'course_id', 'content'];
}
