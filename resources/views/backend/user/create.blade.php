@extends('backend.layouts.master');
@section('title', 'create user');
@section('content');
      <!--/.sidebar-->
      </div>
                        <!--/.span3-->
      			<div class="span9">
              <div class="content">
								@if (Session::has('message'))
								<div class="alert alert-success">{{Session::get('message')}}</div>
								@endif
								<form action="{{route('user.store')}}" method="post">@csrf
									<div class="module">
										<div class="module-head">
											<h3>Create User</h3>
										</div>
										<div class="module-body">
											<div class="control-group">
												<label class="control-label">Username</label>
												<div class="controls">
													<input type="text" name="name" class="span8 @error('name') is-invalid @enderror" value="{{old('name')}}" size="5"><br>
													@error('name')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

                        <label class="control-label">Email</label>
												<div class="controls">
													<input type="email" name="email" class="span8 @error('email') is-invalid @enderror" value="{{old('email')}}"><br>
													@error('email')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

                        <label class="control-label">Password</label>
												<div class="controls">
													<input type="password" name="password" class="span8 @error('password') is-invalid @enderror" value="{{old('password')}}"><br>
													@error('password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

                        <label class="control-label">Occupation</label>
												<div class="controls">
													<input type="text" name="occupation" class="span8 @error('occupation') is-invalid @enderror" value="{{old('occupation')}}"><br>
													@error('occupation')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

											</div>
										
												<label class="control-label">Address</label>
												<div class="controls">
													<textarea name="address" id="" cols="20" rows="5" class="span8 @error('address') is-invalid @enderror" value="{{old('address')}}"></textarea><br>
													@error('address')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

											
											
												<label class="control-label">Phone</label>
												<div class="controls">
													<input type="number" name="phone" class="span8 @error('phone') is-invalid @enderror" value="{{old('phone')}}"><br>
													@error('phone')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
													@enderror
												</div>

											
												<div class="controls">
													<button type="submit" class="btn btn-success">Create User</button>
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