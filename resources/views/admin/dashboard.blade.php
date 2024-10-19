@extends('admin.layout.master')
@section('content')
                            <!-- start row -->
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="row g-3">
    
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fs-14 mb-1">Categories</div>
                                                    </div>
    
                                                    <div class="d-flex align-items-baseline mb-2">
                                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{$countCategory}}</div>
                                                      
                                                    </div>
                                                    <div id="website-visitors" class="apex-charts"></div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fs-14 mb-1">Posts</div>
                                                    </div>
    
                                                    <div class="d-flex align-items-baseline mb-2">
                                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{$countPost}}</div>
                                                    
                                                    </div>
                                                    <div id="conversion-visitors" class="apex-charts"></div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fs-14 mb-1">Comment</div>
                                                    </div>
    
                                                    <div class="d-flex align-items-baseline mb-2">
                                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{$sumComment}}</div>
                                                        <div class="me-auto">
                                                            <span class="text-success d-inline-flex align-items-center">
                                                                25%
                                                                <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div id="session-visitors" class="apex-charts"></div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fs-14 mb-1">View</div>
                                                    </div>
    
                                                    <div class="d-flex align-items-baseline mb-2">
                                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{$sumView}}</div>
                                                        <div class="me-auto">
                                                            <span class="text-success d-inline-flex align-items-center">
                                                                4%
                                                                <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div id="active-users" class="apex-charts"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end sales -->
                            </div> <!-- end row -->
 
@endsection