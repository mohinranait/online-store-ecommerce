@extends('backend.layout.template')

@section('title') <title>Product list</title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Product</h4>
                <p class="mg-b-0 text-dark">All  Product Board.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Product List</h4>
                            <a href="{{route('product.create')}}" class='btn btn-info '>Create Product</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        

                    <table class="table table-bordered mg-b-0">
                        <thead class="thead-colored thead-info">
                            <tr>
                                <th>NO</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Offer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                
                               
                                <td>
                                    @if( $product->imagess->count() > 0 )
                                    <img src="{{asset('image')}}/{{$product->imagess->first()->image}}" width="40px" alt="">
                                    @else
                                    @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    @if(!empty($product->offer_price))
                                        {{$product->offer_price}}
                                    @else
                                        {{$product->regularprice}}
                                    @endif
                                </td>
                                <td>
                                    @if( $product->is_fiture == 1)
                                        Active
                                    @else
                                        In-Active
                                    @endif
                                </td>
                                <td>
                                    @if( $product->status == 1)
                                        Active
                                    @else
                                        In-Active
                                    @endif
                                </td>
                                <td style='width:130px;'>
                                <div>
                                    <a href="{{route('product.edit', $product->id)}}" class='btn btn-primary btn-sm text-white'><i class='fa fa-edit'></i> </a>
                                    <a  class='btn btn-info btn-sm text-white' data-toggle="modal" data-target="#view{{$product->id}}"><i class="fa fa-eye"></i> </a>
                                    <a  class='btn btn-danger btn-sm text-white' data-toggle="modal" data-target="#delModal{{$product->id}}"><i class="fa fa-trash"></i> </a>
                                </div>
                                <div>
                                    <!-- view modal code start  -->
                                    <div id="view{{$product->id}}" class="modal fade show" style="padding-right: 17px;">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content bd-0 tx-14">
                                                <div class="modal-header pd-y-20 pd-x-25">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{$product->name}}</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body pd-25">
                                                <table class='table mb-0'>
                                                    <tbody>
                                                        <tr>
                                                            <th>Image</th>
                                                            <td>
                                                            @if( $product->imagess->count() > 0 )
                                                            <img src="{{asset('image')}}/{{$product->imagess->first()->image}}" width="300px" alt="">
                                                            @else
                                                            @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Name</th>
                                                            <td>{{$product->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Category</th>
                                                            <td>{{$product->category->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Brand</th>
                                                            <td>{{$product->brand->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Regular Price</th>
                                                            <td>
                                                                @if(!empty($product->offer_price))
                                                                <del class='text-danger'>{{$product->regularprice}}</del>
                                                                @else
                                                                {{$product->regularprice}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Offer Price</th>
                                                            <td>{{$product->offer_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quentity</th>
                                                            <td>{{$product->quentity}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <td>
                                                                @if( $product->status == 1)
                                                                Active
                                                                @else
                                                                In-Active
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                        </div><!-- modal-dialog -->
                                    </div>
                                    <!-- view modal code end -->
                                    <!-- delete modal code start  -->
                                    <div id="delModal{{$product->id}}" class="modal fade show" style="padding-right: 17px;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bd-0 tx-14">
                                                <div class="modal-header pd-y-20 pd-x-25">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body pd-25">
                                                <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Delete <b class='text-primary'>{{$product->name}}</b> Product ?</a></h4>
                                                <p class="mg-b-5">  </p>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">CLOSE</button>
                                                <form action="{{route('product.delete', $product->id)}}" method='POST'>
                                                    @csrf 
                                                    <button type="submit" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">CONFIRT</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div><!-- modal-dialog -->
                                    </div>
                                    <!-- delete modal code end -->
                                </div>
                                    

                                </td>

                            </tr>

                              
                            @php $i++ @endphp
                            @endforeach
                           
                        </tbody>
                        @if( $products->count() > 0)
                        @else
                            <div class="alert alert-info text-center">No Product Found</div>
                        @endif
                    </table>




                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

