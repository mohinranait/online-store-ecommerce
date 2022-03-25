@extends('backend.layout.template')

@section('title') <title>Edit User </title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>User</h4>
                <p class="mg-b-0 text-dark">Update User Information.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Update user</h4>
                            <a href="{{route('user.manage')}}" class='btn btn-info '>Back to user List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 m-auto">

                                <form method="POST" action="{{route('user.update', $user->id)}}"  enctype="multipart/form-data">
                                    @csrf 

                                    <!-- user full name -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                        </div>
                                        <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" placeholder='Full Name' value="{{old('name')}}" required autofocus />
                                    </div>

                                    <!-- user email and mobile  -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon ion-email tx-16 lh-0 op-6"></i></span>
                                                    </div>
                                                    <input id="email" class="form-control" value="{{$user->email}}" placeholder="E-mail Address" type="email" name="email" value="{{old('email')}}" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone tx-16 lh-0 op-6"></i></span>
                                                    </div>
                                                    <input id="phone" class="form-control" placeholder="Phone" type="text" value="{{$user->phone}}" name="phone" value="{{old('phone')}}" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- user Division and district -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Division</label>
                                                <select name="division" id="" class='form-control'>
                                                    <option value="">Select Division</option>
                                                    @foreach( $divisions as $division)
                                                    <option value="{{$division->id}}" @if( $division->id == $user->division_id) selected @endif>{{$division->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">District</label>
                                                <select name="district" id="" class='form-control'>
                                                    <option value="1">Select District</option>
                                                    @foreach( $districts as $district)
                                                    <option value="{{$district->id}}" @if( $district->id == $user->destrict_id) selected @endif>{{$district->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- User Role and status -->
                                    <div class="form-group">
                                        <div class='d-flex justify-content-between'>
                                            <div class="custom-file mb-3 wd-450">
                                                <input type="file" name='image' class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <div>
                                                <img src="{{asset('image' . $user->image)}}" width="40px" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Role</label>
                                                <select name="role" id="" class='form-control'>
                                                    <option value="2">Select Role</option>
                                                    <option value="1" @if( $user->role == 1) selected @endif>Admin</option>
                                                    <option value="2" @if( $user->role == 2) selected @endif>User</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Status</label>
                                                <select name="status" id="" class='form-control'>
                                                    <option value="1">Select Status</option>
                                                    <option value="1" @if( $user->status == 1) selected @endif>Active</option>
                                                    <option value="2" @if( $user->status == 2) selected @endif>In-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                   
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-info">Save Change</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

