<?php

namespace App\Models;

use CodeIgniter\Model;

class Evaluation extends Model
{
    protected $table = 'evaluation';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name'];
}
