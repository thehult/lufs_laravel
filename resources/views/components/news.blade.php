@php
    $categories = [
        'other' => 'Övrigt',
        'club' => 'Klubben',
        'discgolf' => 'Discgolf',
        'allround' => 'Allround'    
    ]
@endphp

<div class="col">
    <div class="card text-white card-news">
        <img src="{{ $image }}" class="card-img bg-no-img" alt="...">
        <div class="card-img-overlay">
            <div class="news-category">
                {{ $categories[$category] }}
            </div>
            <h3 class="card-title">{{ $title }}</h3>
            <p class="card-text">{{ \Carbon\Carbon::parse($published_at)->diffForHumans() }}</p>
        </div>
    </div>
</div>