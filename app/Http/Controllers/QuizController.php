<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizzes = (new Quiz)->allQuiz();
        return view('backend.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data with validateform method below
        $data = $this->validateForm($request);
        // storeQuiz() a method in Quiz Model
        $quiz = (new Quiz)->storeQuiz($data);


        // 
        return redirect()->back()->with('message', 'Quiz created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $quiz = (new Quiz)->getQuizById($id);
        return view('backend.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validateForm($request);
        $quiz = (new Quiz)->updateQuiz($data,$id);
        return redirect(route('quiz.index'))->with('message','Quiz updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        (new Quiz)->deleteQuiz($id);
        return redirect(route('quiz.index'))->with('message','Quiz deleted successfully!');
    }


    public function validateForm($request){
        return $this->validate($request,[
            'name'=> 'required|string',
            'description'=> 'required|min:3',
            'minutes' => 'required|integer'
        ]);
    }
}
