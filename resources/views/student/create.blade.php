@extends('layouts.app')

@section('title','Add New Student')
    @section('content')
    <div class="container">
                    <div class="card">
                        <div class="card-header">Add Student</div>
        @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
        @endif

                        <div class="card-body">

                            <form method="POST" action="{{ url('student/store') }}">
                                @csrf

    <!-- name field -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    <!--end of  name field -->
    <!-- father name field -->
    <div class="form-group row">
       <label for="father_name" class="col-md-4 col-form-label text-md-right">Father Name</label>

       <div class="col-md-6">
           <input id="father_name" type="text" class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" name="father_name" value="{{ old('father_name') }}" required autofocus>

           @if ($errors->has('father_name'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('father_name') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <!-- end of father name field -->
   <!-- mother name field -->
    <div class="form-group row">
       <label for="mother_name" class="col-md-4 col-form-label text-md-right">Mother Name</label>

       <div class="col-md-6">
           <input id="mother_name" type="text" class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" value="{{ old('mother_name') }}" required autofocus>

           @if ($errors->has('mother_name'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('mother_name') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <!-- end of mother name field -->
   <!-- presdent address field -->
    <div class="form-group row">
       <label for="presdent_address" class="col-md-4 col-form-label text-md-right">Presdent Address</label>

       <div class="col-md-6">
           <input id="presdent_address" type="text" class="form-control{{ $errors->has('presdent_address') ? ' is-invalid' : '' }}" name="presdent_address" value="{{ old('presdent_address') }}" required autofocus>

           @if ($errors->has('presdent_address'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('presdent_address') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <!-- end of presdent address field -->
   <!-- permanent address field -->
    <div class="form-group row">
       <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Permanent Address</label>

       <div class="col-md-6">
           <input id="permanent_address" type="text" class="form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" name="permanent_address" value="{{ old('permanent_address') }}" required autofocus>

           @if ($errors->has('permanent_address'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('permanent_address') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <!-- end of permanent address field -->
    <!-- phone number field -->
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="tel" maxlength="11"  class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
     <!-- end of phone number field -->
     <!-- home number field -->
                                <div class="form-group row">
                                    <label for="home_number" class="col-md-4 col-form-label text-md-right">Home Number</label>

                                    <div class="col-md-6">
                                        <input id="home_number" type="tel" maxlength="11"  class="form-control{{ $errors->has('home_number') ? ' is-invalid' : '' }}" name="home_number" value="{{ old('home_number') }}" required autofocus>

                                        @if ($errors->has('home_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('home_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
     <!-- end of home number field -->
     <!-- email field -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
     <!--end of  email field -->
     <!-- department  field -->
     <div class="form-group row">
        <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

        <div class="col-md-6">
            <select id="department" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department') }}" required autofocus>
                <option value="">Select One</option>
                @foreach ( $departments as $department )
                <option value="{{ $department->id }}">{{ $department->title }}</option>
                @endforeach
            </select>
            @if ($errors->has('department'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('department') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <!-- end of department  field -->
    <!-- classes  field -->
    <div class="form-group row">
       <label for="classes" class="col-md-4 col-form-label text-md-right">Classes</label>

       <div class="col-md-6">
           <select id="classes"  class="form-control{{ $errors->has('classes') ? ' is-invalid' : '' }}" name="classes" value="{{ old('classes') }}" required autofocus>
            <option value="">Select One</option>
            @foreach ( $classes as $itemc )
            <option value="{{ $itemc->id }}">{{ $itemc->title }}</option>
            @endforeach
        </select>
           @if ($errors->has('classes'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('classes') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <!-- end of classes  field -->
   <!-- roll field -->
   <div class="form-group row">
      <label for="roll" class="col-md-4 col-form-label text-md-right">Roll</label>

      <div class="col-md-6">
          <input id="roll" type="text" class="form-control{{ $errors->has('roll') ? ' is-invalid' : '' }}" name="roll" value="{{ old('roll') }}" required autofocus>

          @if ($errors->has('roll'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('roll') }}</strong>
              </span>
          @endif
      </div>
  </div>
  <!-- end of roll field -->
  <!-- reg_id field -->
    <div class="form-group row">
       <label for="reg_id" class="col-md-4 col-form-label text-md-right">Reg id</label>

       <div class="col-md-6">
           <input id="reg_id" type="text" class="form-control{{ $errors->has('reg_id') ? ' is-invalid' : '' }}" name="reg_id" value="{{ old('reg_id') }}"  autofocus>

           @if ($errors->has('reg_id'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('reg_id') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <!-- end of reg_id field -->


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                           save
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    @endsection

