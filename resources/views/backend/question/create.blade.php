@extends('backend.layouts.master')
    @section('title', 'create quiz')

      @section('content')

      
                            <!--/.sidebar-->
                            </div>
                        <!--/.span3-->
            <div class="span9">
                <div class="content">
                            @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    
                    <form action="{{route('question.store')}}" method="post">@csrf
                    <div class="module">
                        <div class="module-head">
                        <h3>Create Question</h3>
                        </div>
                        <div class="module-body">
                        <div class="control-group">
                            <label class="control-label">Choose Quiz</label>
                            <div class="controls">
                            <select name="quiz" class="span8" id="">
                            @foreach(App\Models\Quiz::all() as $quiz)
                                <option value="{{$quiz->id}}">{{$quiz->name}}</option>
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
                            <input type="text" name="question" class="span8 @error('name') is-invalid @enderror" value="{{old('name')}}">
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
                            @for ($i=0;$i<4;$i++)
                            <input type="text" name="option[]" class="span7 @error('name') is-invalid @enderror" placeholder="options{{$i+1}}"  required>
                            <input type="radio" name="correct_answer" value="{{$i}}"><span>Is correct answer</span>
                            @endfor
                            
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
                            <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        

                    </div>
                    </form>

                
                                <!--/.module-->
                </div>
                            <!--/.content-->
            </div>
                        <!--/.span9-->
        </div>
        </div>
                <!--/.container-->
    </div>
            <!--/.wrapper-->
      @endsection