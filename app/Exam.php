<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AdminTrait;
class Exam extends Model
{
    use AdminTrait;
    protected $fillable = ['user_id',
    'date',
    'marks'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
