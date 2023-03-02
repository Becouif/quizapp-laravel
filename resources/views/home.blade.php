@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  @if(Session::has('error'))
      <div class="'alert alert-danger">{{ Session::get('error') }}</div>
  @endif
    <div class="col-md-8">
    
      <div class="card">
        
        <div class="card-header">Examination</div>
        @if ($isExamAssigned)
        @foreach($quizzes as $quiz)
        <div class="card-body">
          <p><h3>{{$quiz->name}}</h3></p>
          <p>About Exam: {{$quiz->description}}</p>
          <p>Allocated Time:{{$quiz->minutes}} minutes</p>
          <p>No of question: {{$quiz->questions->count()}}</p>
          <p>
            @if (!in_array($quiz->id, $wasQuizCompleted))
            <a href="/quiz/{{$quiz->id}}">
              <button class ="btn btn-success">Start Quiz</button>
            </a>
            @else
            <a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}">View Result</a>
            <span class="float-right">Completed</span>
            @endif
          </p>
        </div>
        @endforeach
        @else
        <p>No quiz has been assigned to you.</p>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Header</div>
        <div class="card-body">
          <p>Email:{{auth()->user()->email }}</p>
          <p>Occupation:{{auth()->user()->occupation }}</p>
          <p>Address:{{auth()->user()->address }}</p>
          <p>Phone:{{auth()->user()->phone }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection