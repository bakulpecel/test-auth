<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
*
*/
class UserModel extends Model
{
    protected $table        = 'users';

    protected $primarykey   = 'id';

    protected $fillable     = [
        'username',
        'email',
        'password',
        'role_id',
        'deleted',
    ];

    protected $timeStamps   = true;
}