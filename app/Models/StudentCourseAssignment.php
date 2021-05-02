<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentCourseAssignment extends Model
{
    protected $table = 'student_course_assignment';

    protected $primaryKey = 'id';

    protected $allowedFields = ['student_id', 'course_id'];
}
