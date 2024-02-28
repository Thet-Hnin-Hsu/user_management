@extends('admin.home.app')

@section('content')
    <h1 class="app-page-title">Add Role</h1>

    <div class="row gy-4">
        <div class="col-12 col-lg-12">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-body px-4 w-100">
                    <form action="{{ route('admin#createRole') }}" method="POST">
                        @csrf
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Name</strong></div>

                                    <div class="item-data">
                                        <input type="text" class="
                                        form-control profile_form" placeholder="Enter Name..." name="roleName" value="">

                                        @error('roleName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-data">
                                        <button type="submit" class="btn btn-success text-white">Add</button>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->
                    </form>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//col-->
    </div><!--//row-->
@endsection
