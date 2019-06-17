<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersQuestionAnswers extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_question_answers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['answer_id', 'created_at', 'question_id', 'test_id', 'was_right', 'updated_at', 'user_id', 'session_id'];

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

    public function question()
    {
        return $this->belongsTo(Questions::class, "question_id", "id");
    }

    public function answer()
    {
        return $this->belongsTo(Answers::class, "answer_id", "id");
    }

    public function test()
    {
        return $this->belongsTo(Tests::class, "test_id", "id");
    }

}
