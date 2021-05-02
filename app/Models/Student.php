<?php

namespace App\Models;

use CodeIgniter\Model;

class Student extends Model
{
    protected $table = 'student';

    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name', 'middle_name', 'last_name', 'email_address', 'student_id', 'password', 'last_update_date'];
}
