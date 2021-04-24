<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'username', 'password'];
}
