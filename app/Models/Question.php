<?php

namespace App\Models;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'quiz_id'];
    // how to limit the number of user per page 
    private $limit = 10;
    private $order = 'DESC';
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function storeQuestion($data){
        $data['quiz_id']= $data['quiz'];
        return Question::create($data);
    }
    public function getQuestions(){
        return Question::orderBy('created_at', $this->order)->with('quiz')->paginate($this->limit);
    }
}
