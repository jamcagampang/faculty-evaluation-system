<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluationFaculty extends Model
{
    protected $table = 'evaluation_faculty';

    protected $primaryKey = 'id';

    protected $allowedFields = ['evaluator', 'evaluatee', 'rate_1', 'rate_2', 'rate_3', 'rate_4', 'rate_5'];
}
