@extends('backend.layout.template')

@section('title') <title>Admin Dashboard</title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Category</h4>
                <p class="mg-b-0 text-dark">Update  Category Information.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Update Category</h4>
                            <a href="{{route('category.manage')}}" class='btn btn-info '>Back to Category List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 m-auto">

                                <form method="POST" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
                                    @csrf 
                                
                                    <div class="form-group ">
                                        <label>Category Name : <span class="tx-danger">*</span></label>
                                        <input type="text" name="category" class="form-control " value="{{$category->name}}" placeholder="Category name"  required>
                                    </div><!-- form-group -->

                                    <div class="gorm-group mb-3">
                                        <label for="">Primary Category</label>
                                        <select name="is_parent" class='form-control' id="">
                                            <option value="0">Select Category</option>
                                            @foreach( $categorys as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        <label>Sort Description (Optionnal)</label>
                                        <textarea rows="2" name='description' class="form-control" placeholder="Write now" style="height: 101px;">{{$category->description}}</textarea>
                                    </div><!-- form-group -->
                                    <div class='d-flex justify-content-between'>
                                        <div class="custom-file mb-3">
                                            <div class="col-lg-">
                                                <input type="file" name='image' class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex justify-content-end align-items-center">
                                            <img src="{{asset('image'. $category->image)}}" style='max-width:140px' alt="">      
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Status : <span class="tx-danger">*</span></label>
                                    <select class='form-control' name="status" id="">
                                        <option value="1">-Select Status-</option>
                                        <option value="1" @if( $category->status == 1 ) selected @endif>Active</option>
                                        <option value="2" @if( $category->status == 2 ) selected @endif>In-Active</option>
                                    
                                    </select>
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

