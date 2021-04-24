<?php

namespace App\Models;

use CodeIgniter\Model;

class Faculty extends Model
{
    protected $table = 'faculty';

    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name', 'middle_name', 'last_name', 'email_address', 'password', 'designation', 'department'];
}
