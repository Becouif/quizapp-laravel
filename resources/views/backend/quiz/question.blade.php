@extends('backend.layouts.master')
@section('title', 'show Quiz')
@section('content')
                    <!--/.sidebar-->
                    </div>
                <!--/.span3-->
    <div class="span9">
      <div class="content">
        <!-- foreach -->
        @foreach ($quizzes as $quiz)
          
       
        <div class="module">
          <div class="module-head">
          <h3>{{ $quiz->name }}</h3> 
          </div>
          <div class="module-body">
           
            <div class="module-body table">
            <!-- foreach  -->
            @foreach ($quiz->questions as $ques)
              
           
              <table class="table table-message">
                
                <tbody>
                
                
                  <tr class="read">
                  <p>{{$ques->question}}</p>
                    <td class="cell-author hidden-phone hidden-tablet">
                      <!-- foreach  -->
                      @foreach ($ques->answers as $answer)
                        
                      <p>
                      {{ $answer->answer }}
                      @if ($answer->is_correct)
                      <span class="badge badge-success pull-right">correct</span>
                      @endif
                      </p>
                      
                    <!-- endforeach  -->
                    @endforeach
                      
                    </td>
                  </tr>
                </tbody>
              </table>
              @endforeach
            </div>
        @endforeach 
            <div class="module-foot">
              <td>
							<a href="{{route('quiz.index')}}" class="btn btn-inverse float-right">Back</a>
							</td>
              
             
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


