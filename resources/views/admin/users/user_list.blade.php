@extends('admin.home.app')

@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">User Lists</h1>
        </div>

        <div class="col-4">
            @if (Session::has('deleteSuccess'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"><!--//alert-->
                    {{ Session::get('deleteSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><!--//alert-->
            @endif
        </div>

        <div class="app-search-box col-4">
            <form class="app-search-form" action="{{ route('admin#userListSearch') }}" method="POST">
                @csrf
                <input type="text" placeholder="Search..." name="userSearch" class="form-control search-input" value="{{ old('userSearch') }}">
                <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div><!--//app-search-box-->
    </div><!--//row-->

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Name</th>
                                    <th class="cell">Email</th>
                                    <th class="cell">Phone</th>
                                    <th class="cell">Address</th>
                                    <th class="cell">Gender</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($userData as $item)
                                    <tr>
                                        <td class="cell">{{ $item['id'] }}</td>
                                        <td class="cell">{{ $item['name'] }}</td>
                                        <td class="cell">{{ $item['email'] }}</td>
                                        <td class="cell">{{ $item['phone'] }}</td>
                                        <td class="cell">{{ $item['address'] }}</td>
                                        <td class="cell">{{ $item['gender'] }}</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('admin#view',$item['id']) }}">View</a></td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('admin#deleteAccount',$item['id']) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->

            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav><!--//app-pagination-->
        </div><!--//tab-pane-->
    </div><!--//tab-content-->
@endsection
