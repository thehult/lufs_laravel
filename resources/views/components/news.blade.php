<div class="col">
    <div class="card text-white card-news">
        <img src="{{ $image }}" class="card-img" alt="...">
        <div class="card-img-overlay">
            <div class="news-category">
                {{ $category }}
            </div>
            <h3 class="card-title">{{ $title }}</h3>
            <p class="card-text">{{ $timestamp}}</p>
        </div>
    </div>
</div>