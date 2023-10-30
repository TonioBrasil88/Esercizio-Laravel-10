<div class="col col-md-3">
    <div class="card" style="width: 18rem;">
        <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->subtitle }}</p>
            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Mostra Articoli</a>
            @auth                
                <a href="{{ route('article.edit', $article) }}" class="btn btn-warning">Modifca Articolo</a>
            @endauth
        </div>
    </div>
</div>