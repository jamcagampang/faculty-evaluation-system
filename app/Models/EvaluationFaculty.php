<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluationFaculty extends Model
{
    protected $table = 'evaluation_faculty';

    protected $primaryKey = 'id';

    protected $allowedFields = ['evaluator', 'evaluatee', 'content'];
}
