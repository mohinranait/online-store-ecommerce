@extends('backend.layout.template')

@section('title') <title> New Product   </title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Product</h4>
                <p class="mg-b-0 text-dark">Add a new Product.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Create Product</h4>
                            <a href="{{route('product.manage')}}" class='btn btn-info '>Back to Product List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                       

                        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf 
                            <div class="row">
                                <div class="col-lg-9">

                                    <div class="form-group">
                                        <label for="">Product Title</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror " name='name' value="{{old('name')}}" placeholder="product tile">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product Details</label>
                                        <textarea name="details">{{old('details')}}</textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="">Extra information</label>
                                        <textarea name="otherinformation">{{old('otherinformation')}}</textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="">Main Image</label>
                                                <input type="file" name="image[]" value="{{old('image')}}" class="form-file-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Optional </label>
                                                <input type="file" name="image[]" value="{{old('image')}}" class="form-file-control ">
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Optional</label>
                                                <input type="file" name="image[]" value="{{old('image')}}" class="form-file-control ">
                                            </div>
                                        </div>
                                    </div>


                                   <div class="form-group">
                                    <input type="text" name='tags' value="Tags,Product" data-role="tagsinput" style="">
                                   </div>

                                   <div class="form-group">
                                       <label for="">Sort Description</label>
                                       <textarea name="sort_description" id="" cols="30" rows="2" class='form-control'>

                                       </textarea>
                                   </div>
                                   


                                    
                                </div>
                                <div class="col-lg-3">

                                    <div class="form-group">
                                        <label for="">Brand</label>
                                        <select name="brand" class='form-control' id="">
                                            <option value="1">Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category" class='form-control' id="">
                                            <option value="1">Select Category</option>
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @foreach(App\Models\Category::orderby('name','asc')->where('is_parent',$category->id)->get() as $subCat)
                                            <option value="{{$subCat->id}}">-- {{$subCat->name}}</option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Color</label>
                                        <select name="color" class='form-control' id="">
                                            <option value="1">Select Color</option>
                                            @foreach($colors as $color)
                                            <option value="{{$color->id}}">{{$color->color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Quentity</label>
                                        <input type="text" name='quentity' value="{{old('quentity')}}" class='form-control' >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Regular Price</label>
                                        <input type="text" name='regularprice' value="{{old('regularprice')}}" class="form-control @error('regularprice') is-invalid @enderror" >
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Offer Price</label>
                                        <input type="text" value="{{old('ofer_price')}}" name='ofer_price' class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fiture Product</label>
                                        <select name="is_fiture" class='form-control' id="">
                                            <option value="2">Select Fiture</option>
                                            <option value="1">Active</option>
                                            <option value="2">In-Active</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" class='form-control' id="">
                                            <option value="1">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">In-Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group ">
                                <button type="submit" class="btn btn-info">Save Product</button>
                            </div>
                        </form>

                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

