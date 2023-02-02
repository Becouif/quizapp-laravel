@extends('backend.layouts.master')
    @section('title', 'create quiz')

    @section('content')
    <div class="span9">
					<div class="content">

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
										<td><a href="{{route('quiz.edit', [$question->id])}}" class="btn btn-success">Edit</a></td>
										<td>
											<form id="delete-form{{$question->id}}" action="{{route('quiz.delete',[$question->id])}}" method="POST">@csrf
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
									
										<td><a href="" class="btn btn-primary">View</a></td>
									</tr>
									@endforeach
									@else
									<td>No quiz to display </td>
									@endif
								  </tbody>
								</table>
							</div>
						</div>

						
					<br />
						
					</div><!--/.content-->
				</div><!--/.span9-->


@endsection