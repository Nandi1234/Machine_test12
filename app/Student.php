<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name',
    'image',
    'guardian_name',
    'dob',
    'gender',
    'mobile',
    'address'];
}
