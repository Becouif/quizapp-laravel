@extends('backend.layouts.master')
    @section('title', 'assign question')

      @section('content')

      
                            <!--/.sidebar-->
                            </div>
                        <!--/.span3-->
            <div class="span9">
                <div class="content">
                            @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    
                    <form action="{{route('exam.assign')}}" method="post">@csrf
                    <div class="module">
                        <div class="module-head">
                        <h3>Assign Question</h3>
                        </div>
                        <div class="module-body">
                        <div class="control-group">
                            <label class="control-label">Choose Quiz</label>
                            <div class="controls">
                            <select name="quiz_id" class="span8" id="">
                            @foreach(App\Models\Quiz::all() as $quiz)
                                <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                            @endforeach
                                
                            </select>
                            @error('quiz')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label">Choose User</label>
                            <div class="controls">
                            <select name="user_id" class="span8" id="">
                            @foreach (App\Models\User::where('is_admin','0')->get() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                                
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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