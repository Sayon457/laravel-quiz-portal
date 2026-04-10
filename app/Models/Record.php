<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['user_id', 'quiz_id', 'status'];

    function scopeWithQuiz($query)
    {
        return $query->join('quizzes', 'records.quiz_id', '=', 'quizzes.id')->select('quizzes.*', 'records.*');
    }
}
