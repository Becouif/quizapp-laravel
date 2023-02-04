
@extends('backend.layouts.master');

@section('title', 'View Question')
@section('content')
                    <!--/.sidebar-->
                    </div>
                <!--/.span3-->
    <div class="span9">
      <div class="content">
        <div class="module">
          <div class="module-head">
            <!-- module head  -->
          </div>
          <div class="module-body">
            <p><h3 class="heading">{{ $question->question }}</h3></p>
            <div class="module-body table">
              <table class="table table-message">
                <tbody>
                  <!-- answers relationship in question model  -->
                  @foreach ($question->answers as $key=>$answer)
                    
                
                  <tr class="read">
                    <td class="cell-author hidden-phone hidden-tablet">
                      {{ $key+1 }}
                      {{ $answer->answer }}
                      <!-- if statement to know if correct  -->
                      @if ($answer->is_correct)
                      <span class="badge badge-success pull-right">correct</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="module-foot">
              <td>
                <a href="{{route('question.edit', [$question->id])}}" class="btn btn-success">Edit</a>
              </td>
              <!-- delete button  -->
              <td>
                <form id="delete-form{{$question->id}}" action="{{route('question.delete',[$question->id])}}" method="POST">@csrf
                    {{ method_field('DELETE') }}	
                </form>
                        <!-- anchor tag for warning pop up  -->
                    <a href="#" onclick="if(confirm('DO you want to delete?')){
                              // prevent page from refreshing while form was clicked 
                              event.preventDefault();
                              document.getElementById('delete-form{{$question->id}}').submit()
                            } else {
                              event.preventDefault();
                            }">
                            <input type="submit" value="Delete" class="btn btn-danger">
                      </a>
              </td>
              
              <a href="{{route('question.index')}}" class="btn btn-inverse float-right">Back</a>

            </div>
          </div>

        </div>
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