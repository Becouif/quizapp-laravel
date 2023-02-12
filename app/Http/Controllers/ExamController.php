<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;

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
}
