<div class="bg-white shadow p-2">
    <a href="#">
        
        <h2 class="text-xl font-bold">{!!  $post->title  !!}</h2>
        <br>
        
        <p>{!! Str::limit(($post->body), 200, '...') !!}</p>
    </a>
</div>