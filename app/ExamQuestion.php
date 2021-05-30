<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $fillable  = ['exam_id',
    'question_id',
    'option_no'];
}
