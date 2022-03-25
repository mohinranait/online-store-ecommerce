@extends('backend.layout.template')

@section('title') <title>Color </title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>color</h4>
                <p class="mg-b-0 text-dark">Add a new color.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Create color</h4>
                            <a href="{{route('color.manage')}}" class='btn btn-info '>Back to color List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 m-auto">

                                <form method="POST" action="{{route('color.update',[$color->id])}}" enctype="multipart/form-data">
                                    @csrf 
                                
                                    <div class="form-group ">
                                        <label>Color Name : <span class="tx-danger">*</span></label>
                                        <input type="text" name="color" value="{{$color->color}}" class="form-control " placeholder="Category name"  required>
                                    </div><!-- form-group -->
                                    <div class="form-group ">
                                        <label>Status : <span class="tx-danger">*</span></label>
                                        <select name="status" class='form-control' id="">
                                            <option value="1">Select Status</option>
                                            <option value="1" @if( $color->status == 1) selected @endif>Active</option>
                                            <option value="2" @if( $color->status == 2) selected @endif>In-Active</option>
                                        </select>
                                    </div><!-- form-group -->
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class="custom-file mb-3 wd-450" >
                                            <input type="file" name='image' class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div>
                                        <img src="{{asset('image/'. $color->image)}}" width="40px" style='width:30px;height:30px;border-radius:50%' alt="">
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

