@extends('Admin.layouts.main')
@section('content')
    @include('Admin.layouts.page_title')
    @if(isset($notify))
        @include('Admin.layouts.notify')
    @endif
    <div class="row">
        @if(isset($notify))
            @include("Admin.layouts.notify")
        @endif
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-4">
                    <h2 class="card-title">Sadra Links</h2>
                    <a href="{{ route('links_create') }}" class="btn btn-primary">Create New</a>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($links as $link)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="overflow-td">{{ $link->link_title }}</td>
                                <td><a href="{{ $link->href }}">{{ $link->href }}</a></td>
                                <td>
                                    <a href="{{ route('links_edit', $link->id) }}">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <a href="{{ route('links_destroy', $link->id) }}">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="8" class="text-center">You have not created any Link yet!
                                    <a href="{{ route('links_create') }}">Create A New Link Now!</a></th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
