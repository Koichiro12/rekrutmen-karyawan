<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{$data['page_name']}} </h3>
                <p class="text-subtitle text-muted">{{$data['page_subname']}}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        @foreach ($data['page_breadcum'] as $item)
                            <li class="breadcrumb-item {{$item['status']}}"><a href="{{$item['link']}}">{{$item['name']}}</a></li>
                        @endforeach
                        
                        {{-- <li class="breadcrumb-item active" aria-current="page">Input</li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>