<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'name', 'last_name', 'email', 'age', 'cin', 'phone_number', 'rank', 'rank_code', 'department' ,'password', 'requests_number'];

//protected $hidden = ['password'];

//public function setPasswordAttribute($value)
//{
  //  $this->attributes['password'] = bcrypt($value);
//}

}
