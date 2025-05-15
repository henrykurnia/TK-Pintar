<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = 'parents';

    protected $fillable = [
        'id',
        'user_id', 'name', 'education', 'work', 'phone_number', 'address'
    ];
    

}
