<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['created_at', 'is_active', 'question', 'test_id', 'updated_at'];

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

    public function test()
    {
        return $this->belongsTo(Tests::class, "test_id", "id");
    }

    public function answers()
    {
        return $this->hasMany(Answers::class, "question_id", "id");
    }

    public function answered()
    {
        return $this->hasMany(UsersQuestionAnswers::class, "question_id", "id");
    }

}
