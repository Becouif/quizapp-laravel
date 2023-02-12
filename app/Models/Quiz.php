<?php

namespace App\Models;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['name','description', 'minutes'];
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function users(){
        // quiz_user is the table name in db
        return $this->belongsToMany(User::class,'quiz_user');
    }
    // method to store the quiz in DB 
    public function storeQuiz($data){
        return Quiz::create($data);
    }

    // method to show all quiz
    public function allQuiz(){
        return Quiz::all();
    }
    public function getQuizById($id){
        return Quiz::find($id);
        
    }
    public function updateQuiz($data,$id){
        return Quiz::find($id)->update($data);
    }
    public function deleteQuiz($id){
        return Quiz::find($id)->delete($id);
    }
    public function assignExam($data){
        $quizId = $data['quiz_id'];
        $quiz = Quiz::find($quizId);
        $userId = $data['user_id'];
        return $quiz->users()->syncWithoutDetaching($userId);
    }
}
