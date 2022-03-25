@extends('backend.layout.template')

@section('title') <title>Create Brand </title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Brand</h4>
                <p class="mg-b-0 text-dark">Add a new Brand.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Create Brand</h4>
                            <a href="{{route('brand.manage')}}" class='btn btn-info '>Back to Brand List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 m-auto">

                                <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                                    @csrf 
                                
                                    <div class="form-group ">
                                        <label>Brand Name : <span class="tx-danger">*</span></label>
                                        <input type="text" name="brand" class="form-control " placeholder="Brand name"  required>
                                    </div><!-- form-group -->

                                    <div class="form-group ">
                                        <label>Sort Description (Optionnal)</label>
                                        <textarea rows="2" name='description' class="form-control" placeholder="Write now" style="height: 101px;"></textarea>
                                    </div><!-- form-group -->
                                    <div class="custom-file mb-3">
                                      
                                        <input type="file" name='image' class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-info">Save Brand</button>
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

