@extends('backend.layouts.master')
    @section('title', 'list users')

    @section('content')
                            <!--/.sidebar-->
                            </div>
                        <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="module">
											<div class="module-head">
												<h3>All Users</h3>
											</div>
											<div class="module-body">
														<table class="table table-striped table-bordered table-condensed">
															<thead>
																<tr>
																	<th>reg_no</th>
																	<th>Name</th>
																	<th>Email</th>
                                  <th>Password</th>
																	<th>Occupation</th>
																	<th>Phone</th>
																	<th>Address</th>
																	<th></th>

																</tr>
															</thead>
															<tbody>
																@if(count($users)>0)
																@foreach ($users as $key=>$user)
																	
																
																<tr>
																	<td>{{$key+1}}</td>
																	<td>{{$user->name}}</td>
																	<td>{{$user->email}}</td>
                                  <td>{{$user->visible_password}}</td>
																	<td>{{$user->occupation}}</td>
                                  <td>{{$user->phone}}</td>
                                  <td>{{$user->address}}</td>
																	<td><a href="{{route('user.edit', [$user->id])}}" class="btn btn-success">Edit</a></td>
																	<td>
																		<form id="delete-form{{$user->id}}" action="{{route('user.delete',[$user->id])}}" method="POST">@csrf
																			{{ method_field('DELETE') }}	
																		</form>
																	<!-- anchor tag for warning pop up  -->
																		<a href="#" onclick="if(confirm('DO you want to delete?')){
																				// prevent page from refreshing while form was clicked 
																				event.preventDefault();
																				document.getElementById('delete-form{{$user->id}}').submit()
																			} else {
																				event.preventDefault();
																			}">
																			<input type="submit" value="Delete" class="btn btn-danger">
																		</a>
																	</td>
																</tr>
																@endforeach
																@else
																<td>No quiz to display </td>
																@endif
															</tbody>
                              {{ $users->links() }}
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