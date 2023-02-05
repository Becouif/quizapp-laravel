@extends('backend.layouts.master')
    @section('title', 'create quiz')

    @section('content')
                            <!--/.sidebar-->
                            </div>
                        <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="module">
											<div class="module-head">
												<h3>All Quiz</h3>
											</div>
											<div class="module-body">
														<table class="table table-striped table-bordered table-condensed">
															<thead>
																<tr>
																	<th>reg_no</th>
																	<th>Name</th>
																	<th>Description</th>
																	<th>Minutes</th>
																	<th></th>
																	<th></th>
																	<th></th>

																</tr>
															</thead>
															<tbody>
																@if(count($quizzes)>0)
																@foreach ($quizzes as $key=>$quiz)
																	
																
																<tr>
																	<td>{{$key+1}}</td>
																	<td>{{$quiz->name}}</td>
																	<td>{{$quiz->description}}</td>
																	<td>{{$quiz->minutes}}</td>
																	<td><a href="{{route('quiz.edit', [$quiz->id])}}" class="btn btn-success">Edit</a></td>
																	<td>
																		<form id="delete-form{{$quiz->id}}" action="{{route('quiz.delete',[$quiz->id])}}" method="POST">@csrf
																			{{ method_field('DELETE') }}	
																		</form>
																	<!-- anchor tag for warning pop up  -->
																		<a href="#" onclick="if(confirm('DO you want to delete?')){
																				// prevent page from refreshing while form was clicked 
																				event.preventDefault();
																				document.getElementById('delete-form{{$quiz->id}}').submit()
																			} else {
																				event.preventDefault();
																			}">
																			<input type="submit" value="Delete" class="btn btn-danger">
																		</a>
																	</td>
																
																	<td><a href="{{route('quiz.view',[$quiz->id])}}" class="btn btn-primary">View</a></td>
																</tr>
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