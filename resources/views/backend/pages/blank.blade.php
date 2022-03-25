@extends('backend.layout.template')

@section('title') <title>Admin Dashboard</title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Category</h4>
                <p class="mg-b-0 text-dark">Add a new Category.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4  class='text-dark'>Create Category</h4>
                            <a href="" class='btn btn-info '>Back to Category List</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consictetur...</p>
                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

