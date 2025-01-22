@extends('theme.default')

@section('heading')
control panel
@endsection

@section('content')
<div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                number of services</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_categories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-share-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               number of Packages</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_subcategories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
