@extends('Admin.layouts.main')
@section('content')
    @include('Admin.layouts.page_title')
    @if(isset($notify))
        @include('Admin.layouts.notify')
    @endif
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-4">
                    <h2 class="card-title">Sadra Foods Categories</h2>
                    <a href="{{ route('foods_type_create') }}" class="btn btn-primary">Create New</a>
                    <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($foods_type as $type)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $type->type_title }}</td>
                            <td>
                                <a href="{{ route('foods_type_edit', $type->id) }}">
                                    <i class="mdi mdi-table-edit"></i>
                                </a>
                                <a href="{{ route('foods_type_destroy', $type->id) }}">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8" class="text-center">You have not created any Food Category yet!
                                <a href="{{ route('foods_type_create') }}">Create A New Category</a></th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
@endsection
