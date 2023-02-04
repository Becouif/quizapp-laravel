<?php

namespace App\Models;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['question_id','answer', 'is_correct'];
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function storeAnswer($data,$question){
        foreach($data['option'] as $key=>$option){
            $is_correct = false;
            if($key==$data['correct_answer']){
                $is_correct=true;
            }
            $answer = Answer::create([
                'question_id'=> $question->id,
                'answer'=> $option,
                'is_correct' => $is_correct
            ]);
        }
    }
    public function deleteAnswer($questionId){
        Answer::where('question_id',$questionId)->delete();
    }
    public function updateAnswer($data,$question){
        $this->deleteAnswer($question->id);
        $this->storeAnswer($data,$question);
    }
}
