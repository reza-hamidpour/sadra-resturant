@extends('Admin.layouts.main')
@section('content')
    @if(isset($notify))
        @include('Admin.layouts.notify')
    @endif
    <div class="page-header">
        <h3 class="page-title">
            Gallery
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Gallery</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('gallery-index') }}">View all</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Sadra Gallery List</h2>
                    <a href="{{ route('gallery-create') }}" class="btn btn-primary">Create New</a>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>thumbnail</th>
                            <th>Order</th>
                            <th>Index status</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($galleries as $gallery)
                            <tr>
                                <td class="overflow-td">{{ $gallery->title }}</td>
                                <td>
                                    @if(!empty($gallery->getFirstPic()))
                                        <img src="{{ $gallery->getFirstPic() }}" alt="{{ $gallery->title }}" style="height:5rem;" />
                                    @endif
                                </td>
                                <td>{{ $gallery->order }}</td>
                                <td>
                                    @if($gallery->index_show == 1)
                                      True
                                    @else
                                        False
                                    @endif
                                </td>
                                <td>{{ $gallery->getStatus() }}
                                    <a href="{{ route('gallery-edit', $gallery->id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a href="{{ route('gallery-destroy', $gallery->id) }}"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="8" class="text-center">You have not created any Gallery yet! <a href="{{ route('gallery-create') }}">Create Gallery</a></th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
