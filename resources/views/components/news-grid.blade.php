<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">
    @foreach($news as $new)
        @include('components.news-card', $new)
    @endforeach
    

</div>