@extends('backend.layout.template')

@section('title') <title> Update District   </title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>District</h4>
                <p class="mg-b-0 text-dark">Update District.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Update District</h4>
                            <a href="{{route('district.manage')}}" class='btn btn-info '>Back to District List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 m-auto">

                                <form method="POST" action="{{route('district.update',$district->id)}}" enctype="multipart/form-data">
                                    @csrf 
                                
                                    <div class="form-group ">
                                        <label>District Name : <span class="tx-danger">*</span></label>
                                        <input type="text" name="district" class="form-control " value="{{$district->name}}" placeholder="District name"  required>
                                    </div><!-- form-group -->
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Divison  <span class="tx-danger">*</span></label>
                                                <select name="division" class='form-control' id="">
                                                    <option value="1">Select Divison</option>
                                                    @foreach( $divisions as $division)
                                                    <option value="{{$division->id}}" @if( $division->id == $district->division_id) selected @endif>{{$division->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Status : <span class="tx-danger">*</span></label>
                                                <select name="status" class='form-control' id="">
                                                    <option value="1">Select Status</option>
                                                    <option value="1" @if( $district->status == 1 ) selected @endif>Active</option>
                                                    <option value="2" @if( $district->status == 2 ) selected @endif>In-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- form-group -->
                                   
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

