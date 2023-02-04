@extends('backend.layouts.master')
    @section('title', 'update question')

      @section('content')

      <div class="position-style">
      <div class="span9">
          <div class="content">
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            
            <form action="{{route('question.update',[$question->id])}}" method="post">@csrf
              {{ method_field('PUT') }}
              <div class="module">
                <div class="module-head">
                  <h3>Update Question</h3>
                </div>
                <div class="module-body">
                  <div class="control-group">
                    <label class="control-label">Choose Quiz</label>
                    <div class="controls">
                    <!-- logic to get the quiz id for the question  -->
                      <select name="quiz" class="span8" id="">
                      @foreach(App\Models\Quiz::all() as $quiz)
                        <option value="{{$quiz->id}}"
                        @if ($quiz->id == $question->quiz_id)selected
                          
                        @endif
                        >{{$quiz->name}}</option>
                      @endforeach
                        
                      </select>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                  </div>
                
                  <div class="control-group">
                    <label class="control-label">Question</label>
                    <div class="controls">
                      <input type="text" name="question" class="span8 @error('name') is-invalid @enderror" value="{{$question->question}}">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                  </div>
                  <div class="control-group">
                    <label class="control-label">Options</label>
                    <div class="controls">
                      <!-- looping to get 4 input space instead of pasting 4 input  -->
                      @foreach ($question->answers as $key=>$answer)
                        
                     
                      <input type="text" name="option[]" class="span7 @error('name') is-invalid @enderror" value="{{$answer->answer}}"  required>
                      <input type="radio" name="correct_answer" value="{{$key}}"
                      @if ($answer->is_correct){{ 'checked' }}
                        
                      @endif
                      ><span>Is correct answer</span>
                      @endforeach
                      
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                  </div>
                  
                </div>
                    

                
                  
      
                  <div class="control-group">
                  <div class="controls">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>
                   

              </div>
            </form>

          </div>

        </div>
      </div>
       

      @endsection