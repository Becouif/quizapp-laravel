@extends('backend.layouts.master')
    @section('title', 'exam assigned user')

    @section('content')
                            <!--/.sidebar-->
                            </div>
                        <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="module">
											<div class="module-head">
												<h3>User Result</h3>
											</div>
											<div class="module-body">
														<table class="table table-striped table-bordered table-condensed">
															<thead>
																<tr>
																	<th></th>
																	<th>Name</th>
																	<th>Quiz</th>
																	

																</tr>
															</thead>
															<tbody>
																@if(count($quizzes)>0)
																@foreach ($quizzes as $quiz)
																@foreach($quiz->users as $key=>$user)
																<tr>
																	<td>{{$key+1}}</td>
																	<td>{{$user->name}}</td>
                                  <td>{{$quiz->name}}</td>
																
																	<td><a href="{{route('quiz.question',[$quiz->id])}}" class="btn btn-success">View Questions</a></td>
																	<td>
																		<a href="">
                                    <button class="btn btn-primary" type="submit">View Result</button>
                                    </a>
																		
																	
																	</td>
																</tr>
																@endforeach
                                @endforeach
																@else
																<td>No quiz to display </td>
																@endif
															</tbody>
														</table>
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