<div class="page-header">
    <h3 class="page-title">
        Foods
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if(isset($page_title))
                <li class="breadcrumb-item">{{ $page_title }}</li>
            @endif
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('foods-index') }}">View all</a></li>
        </ol>
    </nav>
</div>
