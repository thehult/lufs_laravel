<div class="container-fluid p-0">
    <div id="newsCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($featured as $feat)
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="{{ $loop->index }}" @class(['active' => $loop->first]) aria-current="true" aria-label="{{ $feat->title }}"></button>
        @endforeach
        @if (count($featured) > 0)
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="{{ count($featured) }}" aria-label="Bli medlem"></button>
        @endif
    </div>
        <div class="carousel-inner">
            
            @foreach ($featured as $feat)
                <div @class(['carousel-item', 'active' => $loop->first])>
                    <div class="carousel-caption carousel-caption-centered">
                        <h1 class="fw-bold">{{ $feat->title }}</h1>
                        <a href="/nyheter/{{ $feat->id }}" class="btn btn-lg btn-secondary">LÄS MER</a>
                    </div>
                    <img src="{{ $feat->image }}" class="d-block w-100" alt="{{ $feat->title }}">
                </div>
            @endforeach
            <div @class(['carousel-item', 'carousel-item-join', 'active' => count($featured) == 0])>
                <div class="carousel-caption carousel-caption-centered">
                    <img src="{{url('/img/logo/logo_white_128x128.png')}}" class="h-auto" alt="" height="128">
                    <h1 class="fw-bold">Bli medlem!</h1>
                    <a href="/bli-medlem" class="btn btn-lg btn-secondary">LÄS MER</a>
                </div>
                <img src="{{url('/img/join.jpg')}}" class="d-block w-100" alt="Bli medlem">
            </div>
        </div>
        @if (count($featured) > 0)
            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
</div>