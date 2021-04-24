<?php

namespace App\Models;

use CodeIgniter\Model;

class Course extends Model
{
    protected $table = 'course';

    protected $primaryKey = 'id';

    protected $allowedFields = ['course_name', 'course_code', 'semester', 'batch'];
}
