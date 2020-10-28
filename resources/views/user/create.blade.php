@extends('layouts.app')

@section('content')
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Registration</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div> --}}

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    {{-- <form action="{{ route('projects.store') }}" method="POST" > --}}
    {{-- <form action="/home" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Introduction:</strong>
                    <textarea class="form-control" style="height:50px" name="introduction"
                        placeholder="Introduction"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="location" class="form-control" placeholder="Location">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost:</strong>
                    <input type="number" name="cost" class="form-control" placeholder="Cost">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> --}}

    <div class="card" style="margin-top: 30px; max-width: 720px; margin-bottom: 30px;">
        <h5 class="card-header">Student Registration</h5>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- <h5 class="card-title">Special title treatment</h5> --}}
            <form action="{{ route('student.store') }}" method="POST" id="form1" enctype="multipart/form-data" >
                @csrf
        
                <div class="form-group">
                    <label>Name in full</label>
                    <input type="text" class="form-control" placeholder="Enter your full name" name="full_name">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
        
                <div class="form-group">
                    <label>School</label>
                    <input type="text" class="form-control" placeholder="Enter your full school name" name="school_name">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
        
                <div class="form-group">
                    <label >Stream</label>
                    <select class="form-control" name="subject_stream" value="physical">
                      <option id="physical">Physical</option>
                      <option id="bio">Bio</option>
                      <option id="arts">Arts</option>
                      <option id="commerce">Commerce</option>
                      <option id="technology">Technology</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label >Exam Year</label>
                    <select class="form-control" name="exam_year" value="2021">
                      <option id="2021">2021</option>
                      <option id="2022">2022</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label >Your attempt</label>
                    <select class="form-control" name="attempt" value="1st">
                      <option id="1st">1st attempt</option>
                      <option id="2nd">2nd attempt</option>
                      <option id="3rd">3rd attempt</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label>Closet Town</label>
                    <input type="text" class="form-control" placeholder="Enter your closet town" name="closet_town">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
        
                <div class="form-group">
                    <label>District</label>
                    <input type="text" class="form-control" placeholder="Enter your district" name="district">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" rows="5" placeholder="Enter your address" name="address"></textarea>
                </div>

                <div class="form-group">
                    <label>NIC Number</label>
                    <input type="text" class="form-control" placeholder="Enter your NIC number" max="12" name="nic_no">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
        
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>NIC Front</label>
                        <input type="file" class="form-control-file" name="nic_front">
                        <small class="form-text text-muted">Maximum File Size : 15Mb</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label>NIC Back</label>
                        <input type="file" class="form-control-file" name="nic_back">
                        <small class="form-text text-muted">Maximum File Size : 15Mb</small>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirm email</label>
                        <input type="email" class="form-control" placeholder="Confirm your email address" name="email_confirmation">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirm Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Confirm your mobile number" name="mobile_confirmation">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                </div>

                <div class="form-group">
                    <label>Delivery Phone Numbers</label>
                    <input type="text" class="form-control" placeholder="Enter a mobile number" max="12" name="del_mobile_1">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter a another mobile number" max="12" name="del_mobile_2">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
        
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> --}}
        
                <button type="submit" class="btn btn-primary">Register</button>
        
              </form>
          
        </div>
    </div>

    <script>
        console.log("1111")
    </script>

@endsection