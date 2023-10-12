@extends("Admin.layouts.main")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            Foods
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Foods</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('foods-index') }}">View all</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Sadra Foods List</h2>
                    <a href="{{ route('food-create') }}" class="btn btn-primary">Create New</a>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="overflow-td">Title</th>
                            <th>price</th>
                            <th>ratio</th>
                            <th>thumbnail</th>
                            <th>Age Limitation</th>
                            <th>Rate</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($foods as $food)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="overflow-td">{{ $food->title }}</td>
                                <td>{{ $food->price }}CAD</td>
                                <td>{{ $food->getRateRatio() }}</td>
                                <td><img src="{{ $food->getThumbnail() }}" alt="{{ $food->id }}" style="width: 50px; height: 50px;"></td>
                                <td>{{ $food->getAgeStatus() }}</td>
                                <td>{{ $food->getTotalOrder() }}</td>
                                <td>{{ $food->getStatus() }}
                                    <a href="{{ route('food-show', $food->id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a href="{{ route('food-destroy', $food->id) }}"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="8" class="text-center">You have not created any foods. <a href="{{ route('food-create') }}">Create Food</a></th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
