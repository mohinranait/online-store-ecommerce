@extends('backend.layout.template')

@section('title') <title> New Cuntry   </title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Cuntry</h4>
                <p class="mg-b-0 text-dark">Add a new Cuntry.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Create Cuntry</h4>
                            <a href="{{route('cuntry.manage')}}" class='btn btn-info '>Back to Cuntry List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 m-auto">
                                <form method="POST" action="{{route('cuntry.update', $cuntry->id)}}" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group ">
                                        <label>Cuntry Name : <span class="tx-danger">*</span></label>
                                        <input type="text" name="cuntry" class="form-control" value="{{$cuntry->name}}" placeholder="cuntry name"  required>
                                    </div><!-- form-group -->
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Status : <span class="tx-danger">*</span></label>
                                                <select name="status" class='form-control' id="">
                                                    <option value="1">Select Status</option>
                                                    <option value="1" @if($cuntry->status == 1) selected @endif > Active </option>
                                                    <option value="2" @if($cuntry->status == 2) selected @endif > In-Active </option>
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

