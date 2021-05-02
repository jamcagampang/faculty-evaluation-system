<?php

namespace App\Models;

use CodeIgniter\Model;

class FacultyCourseAssignment extends Model
{
    protected $table = 'faculty_course_assignment';

    protected $primaryKey = 'id';

    protected $allowedFields = ['faculty_id', 'course_id'];
}
