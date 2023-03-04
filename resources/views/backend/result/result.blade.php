@extends('backend.layouts.master')
    @section('title', 'exam assigned user')

    @section('content')     
      
      
      <div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Result</h3>
							</div>
							<div class="module-body">
						
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Test</th>
									  <th>Total Questions</th>
									  <th>Attempt Question</th>
                    <th>Correct Answer</th>
                    <th>Wrong Answer</th>
                    <th>Percentage</th>
									</tr>
								  </thead>
								  <tbody>
                   @foreach ($quiz as $q)
									<tr>
									  <td>1</td>
									  <td>{{$q->name}}</td>
									  <td>{{ $totalQuestions }}</td>
									  <td>{{$attemptQuestion}}</td>
                    <td>{{ $userCorrectedAnswer}}</td>
                    <td>{{ $userWrongAnswer }}</td>
                    <td>{{ round($percentage,2) }}</td>
									</tr>
                  @endforeach 
									<tr>
									  <td>2</td>
									  <td>Jacob</td>
									  <td>Thornton</td>
									  <td>@fat</td>
									</tr>
									<tr>
									  <td>3</td>
									  <td>Larry</td>
									  <td>the Bird</td>
									  <td>@twitter</td>
									</tr>
								  </tbody>
								</table>
<!-- another table  -->
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Question</th>
									  <th>Answer Given</th>
									  <th>Result</th>
                   
									</tr>
								  </thead>
								  <tbody>
                   @foreach ($results as $key=>$result)
									<tr>
									  <td>{{$key+1}}</td>
									  <td>{{$result->question->question}}</td>
									  <td>{{ $result->answer->answer }}</td>
										@if ($result->answer->is_correct)
											<td>Correct</td>
										@else
										<td>Incorrect</td>
										@endif
									  
                    
									</tr>
                  @endforeach 
									<tr>
									  <td>2</td>
									  <td>Jacob</td>
									  <td>Thornton</td>
									  <td>@fat</td>
									</tr>
									<tr>
									  <td>3</td>
									  <td>Larry</td>
									  <td>the Bird</td>
									  <td>@twitter</td>
									</tr>
								  </tbody>
								</table>

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