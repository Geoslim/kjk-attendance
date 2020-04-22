@extends('layouts.master')

@section('content')
@if(count($errors) > 0)
   
        <script type="text/javascript">
            swal({
                icon: 'error',
                title:'Validation Error',
                text:" @foreach ($errors->all() as $error) {{ $error }} @endforeach",
                type:'error',
                timer:10000
            }).then((value) => {
              //location.reload();
            }).catch(swal.noop);
         </script>
   
@endif
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-1">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Employee</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Employee</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) --> 
      <div class="row">
        <div class="col-md-5" style="margin:auto;">
            <div class="card card-dark" >
                <div class="card-header">
                <h3 class="card-title">Employee Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ url('store-employee') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name" value="{{old('fullname')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Full Name" value="{{old('mobile')}}">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <select name="designation" id="designation" class="form-control">
                          @foreach($designations as $designation)
                            <option value="{{ $designation->id }}"> {{ $designation->title }}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <select name="gender" id="gender" class="form-control">
                        
                          <option value="" disabled selected> Select gender</option>
                          <option value="Female"> Female</option>
                          <option value="Male"> Male</option>
                        
                      </select>
                  </div>
                    {{-- <div class="form-group">
                        <label for="dept">Department</label>
                        <input type="text" class="form-control" id="dept" name="dept" placeholder="Enter Department" value="{{old('dept')}}">
                    </div> --}}
                    
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div> --}}
                    <div class="form-group">
                      <label for="member_since">Member Since</label>
                      <input type="date" class="form-control" id="member_since" name="member_since" >
                  </div>
                    <div class="form-group">
                      <label for="profile_image">Profile Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                            <label class="custom-file-label" for="profile_image">Choose file</label>
                          </div>
                       
                        </div>
                    </div>

                    <div class="form-check">
                    {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
                </form>
            </div>
        </div>
      </div>
   
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
