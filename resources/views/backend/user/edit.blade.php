@extends('backend.layouts.master');
@section('title', 'edit user');
@section('content');
      <!--/.sidebar-->
      </div>
                        <!--/.span3-->
      			<div class="span9">
              <div class="content">
								@if (Session::has('message'))
								<div class="alert alert-success">{{Session::get('message')}}</div>
								@endif
								<form action="{{route('user.update',[$user->id])}}" method="post">@csrf
                  {{ method_field('PUT') }}
									<div class="module">
										<div class="module-head">
											<h3>Update User</h3>
										</div>
										<div class="module-body">
											<div class="control-group">
												<label class="control-label">Username</label>
												<div class="controls">
													<input type="text" name="name" class="span8 @error('name') is-invalid @enderror" value="{{$user->name}}" size="5"><br>
													@error('name')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>


                        <label class="control-label">Password</label>
												<div class="controls">
													<input type="text" id="password" name="password" class="span8 @error('password') is-invalid @enderror" value="{{$user->visible_password}}" readonly>
                          <br>
													@error('password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

                        <label class="control-label">Occupation</label>
												<div class="controls">
													<input type="text" name="occupation" class="span8 @error('occupation') is-invalid @enderror" value="{{$user->occupation}}"><br>
													@error('occupation')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

											</div>
										
												<label class="control-label">Address</label>
												<div class="controls">
													<input type="text" name="address" class="span8 @error('address') is-invalid @enderror" value="{{$user->address}}"><br>
													@error('address')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

											
											
												<label class="control-label">Phone</label>
												<div class="controls">
													<input type="number" name="phone" class="span8 @error('phone') is-invalid @enderror" value="{{$user->phone}}"><br>
													@error('phone')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

											
												<div class="controls">
													<button type="submit" class="btn btn-success">Update User</button>
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

