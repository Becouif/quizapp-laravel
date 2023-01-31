@extends('backend.layouts.master')
    @section('title', 'Edit quiz')

    @section('content')

    <div class="span9">
      <div class="content">
        @if (Session::has('message'))
         <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <form action="{{route('quiz.update', [$quiz->id])}}" method="post">@csrf
          {{ method_field('PUT') }}
          <div class="module">
            <div class="module-head">
              <h3>Edit Quiz</h3>
            </div>
            <div class="module-body">
              <div class="control-group">
                <label class="control-label">Quiz name</label>
                <div class="controls">
                  <input type="text" name="name" class="span8 @error('name') is-invalid @enderror" value="{{$quiz->name}}"><br>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

              </div>
             
                <label class="control-label">Quiz Description</label>
                <div class="controls">
                  <textarea name="description" id="" cols="20" rows="5" class="span8 @error('description') is-invalid @enderror" value="{{old('description')}}">{{$quiz->description}}</textarea><br>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

              
              
                <label class="control-label">Minutes</label>
                <div class="controls">
                  <input type="text" name="minutes" class="span8 @error('minutes') is-invalid @enderror" value="{{$quiz->minutes}}"><br>
                  @error('minutes')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

              
                <div class="controls">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

          </div>
        </form>

      </div>

    </div>

@endsection