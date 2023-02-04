@extends('backend.layouts.master')
    @section('title', 'List Question')

    @section('content')
    
                            <!--/.sidebar-->
                            </div>
                        <!--/.span3-->
					<div class="span9">
						<div class="content">
											@if (Session::has('message'))
										<div class="alert alert-success">{{Session::get('message')}}</div>
										@endif
							<div class="module">
								<div class="module-head">
									<h3>All Question</h3>
								</div>
								<div class="module-body">
									<table class="table table-striped table-bordered table-condensed">
										<thead>
										<tr>
											<th>reg_no</th>
											<th>Question</th>
											<th>Quiz</th>
											<th>Created</th>
											<th></th>
											<th></th>
											<th></th>

										</tr>
										</thead>
										<tbody>
										@if(count($questions)>0)
										@foreach ($questions as $key=>$question)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$question->question}}</td>
												<td>{{$question->quiz->name}}</td>
												<td>{{date('F d Y', strtotime($question->created_at))}}</td>
												<td><a href="{{route('question.edit', [$question->id])}}" class="btn btn-success">Edit</a></td>
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
											
												<td><a href="{{route('question.show',[$question->id])}}" class="btn btn-primary">View</a></td>
											</tr>
										@endforeach
										@else
										<td>No question to display </td>
										@endif
										</tbody>
									</table>
									<!-- bootstrap class for proper pagination on this template  -->
									<div class="pagination pagination-centered">
									{{ $questions->links() }}
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