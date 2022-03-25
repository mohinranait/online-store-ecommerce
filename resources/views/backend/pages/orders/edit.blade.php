@extends('backend.layout.template')

@section('title') <title>Order details</title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Order</h4>
                <p class="mg-b-0 text-dark">All  Order Board.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Order Details Information</h4>
                            <a href="{{route('order.manage')}}" class='btn btn-info '>Order List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">

                    
                        <form action="{{route('order.update' , $edit->id)}}" method="POST" >
                            @csrf 
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name='name' value="{{$edit->name}}" class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <label for="">E-mail address</label>
                                        <input type="text" name='email' value="{{$edit->email}}" class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name='phone' value="{{$edit->phone}}" class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name='address' value="{{$edit->address}}" class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Order Status</label>
                                       <select name="status" class='form-control' id="">
                                           <option value="" >select Status</option>
                                           <option value="0" @if( $edit->status == 0) selected @endif>In Prosseing</option>
                                           <option value="1" @if( $edit->status == 1) selected @endif>In Hold</option>
                                           <option value="2" @if( $edit->status == 2) selected @endif>In Delevery</option>
                                           <option value="3" @if( $edit->status == 3) selected @endif> Cancle</option>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">TxID</label>
                                        <input type="text" name="tranID" value="{{$edit->transaction_id}}" class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Totla Amount</label>
                                        <input type="text" name="amount" value="{{$edit->amount}} " class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                <label for="">Cuntry</label>
                                                <select name="cuntry" class='form-control' id="">
                                                    <option value="cuntry">Select Cuntry</option>
                                                    @foreach($cuntrys as $item)
                                                        <option value="{{$item->id}}" @if( $item->id == $edit->cuntry) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Division</label>
                                                <select name="division" class='form-control' id="">
                                                    <option value="">Select Division</option>
                                                    @foreach($districts as $item)
                                                        <option value="{{$item->id}}" @if( $item->id == $edit->division_id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">District</label>
                                                <select name="district" class='form-control' id="">
                                                <option value="">Select District</option>
                                                    @foreach($districts as $item)
                                                        <option value="{{$item->id}}" @if( $item->id == $edit->district_id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Zip Code</label>
                                                <input type="text" name='postcode' class='form-control' value="{{$edit->post_code}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Massage</label>
                                        <textarea name="message" id="" cols="30" class='form-control' rows="1">{{$edit->massage}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" value="Save Change Order History" class='btn btn-info w-100'>
                                    </div>
                                </div>
                            </div>
                        </form>


                    

                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

