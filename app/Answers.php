<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['answer', 'created_at', 'is_right_answer', 'question_id', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function answers()
    {
        return $this->belongsTo(Questions::class, "question_id", "id");
    }

    public function answered()
    {
        return $this->belongsTo(UsersQuestionAnswers::class, "answer_id", "id");
    }

}
