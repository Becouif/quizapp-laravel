<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use App\Http\Controllers\QuestionController;
use App\Models\Answer;
use DB;
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.exam.assign');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignExam(Request $request)
    {
        $quiz = (new Quiz)->assignExam($request->all());
        return redirect()->back()->with('message','Exam assigned to user successfully!');
    }

   public function userExam(Request $request){
    $quizzes = Quiz::get();
    return view('backend.exam.index',compact('quizzes'));
   }
//    method to delete assign exam to user when user hasnt attempt it yet 
   public function removeExam(Request $request){
    $userId =$request->get('user_id');
    $quizId =$request->get('quiz_id');
    $quiz = Quiz::find($quizId);
    $result = Result::where('quiz_id',$quizId)->where('user_id',$userId)->get();
    if($result){
        return redirect()->back()->with('message','Quiz attempted, Quiz can not be deleted!!!');
    } else {
        $quiz->user()->detach($userId);
        return redirect()->back()->with('message','Quiz has be remove for this user');
    }

   }
   public function hasQuizAttempted(){
    $attemptQuiz = [];
    
   }

   public function getQuizQuestions(Request $request, $quizId){
    // get current log in user id 
    $authUser = auth()->user()->id;

    // check if user has been assigned a particular quiz 
    $userId = DB::table('quiz_user')->where('user_id',$authUser)->pluck('quiz_id')->toArray();
    if(!in_array($quizId,$userId)){
        return redirect()->to('/home')->with('error','You are not assigned this quiz');
    }
    $quiz = Quiz::find($quizId);
    $time = Quiz::where('id', $quizId)->value('minutes');
    // dd($time);
    $quizQuestions = Question::where('quiz_id',$quizId)->with('answers')->get();
    $authUserHasPlayedQuiz = Result::where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();

    // has user played particular quiz 
    $wasCompleted = Result::where('user_id',$authUser)->whereIn('quiz_id',(new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
    if(in_array($quizId,$wasCompleted)){
        return redirect()->to('/home')->with('error','Users has completed the quiz');
    }
    return view('quiz',compact('quiz','time','quizQuestions','authUserHasPlayedQuiz'));

    // varibles in compact can be pass as props to vue component 


   }
   
   public function postQuiz(Request $request){
        $questionId = $request['questionId'];
        $answerId = $request['answerId'];
        $quizId = $request['quizId'];

        $authUser = auth()->user();
        return $userQuestionAnswer = Result::updateOrCreate(
            ['user_id'=>$authUser->id,'quiz_id'=>$quizId,'question_id'=>$questionId],
            ['answer_id'=>$answerId]
        );
   }

   public function viewResult($userId,$quizId){
    $results = Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
    return view('result-detail',compact('results'));
   }
   public function result(){
    $quizzes = Quiz::get();
    return view('backend.result.index',compact('quizzes'));
   }

   public function userQuizResult($userId,$quizId){
    $results = Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
    $totalQuestions = Question::where('quiz_id',$quizId)->count();
    $attemptQuestion = Result::where('quiz_id',$quizId)->where('user_id',$userId)->count();
    $quiz = Quiz::where('id',$quizId)->get();
    $ans = [];
    foreach($results as $answer){
        array_push($ans,$answer->answer_id);
    }
    $userCorrectedAnswer = Answer::whereIn('id',$ans)->where('is_correct',1)->count();
    $userWrongAnswer = $totalQuestions-$userCorrectedAnswer;
    if($attemptQuestion){
    $percentage = ($userCorrectedAnswer/$totalQuestions)*100;
    } else {
        $percentage = 0;
    }
    return view('backend.result.result',compact('results','totalQuestions','attemptQuestion','userCorrectedAnswer','userWrongAnswer','percentage','quiz'));
   }
}
