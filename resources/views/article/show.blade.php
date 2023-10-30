<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Leggi l'articolo</h1>
                @auth
                <div class="d-flex justify-content-end ">
                    <a href="{{ route('article.edit', $article) }}" class="btn btn-warning mx-2">Modifca</a>
                    <form action="{{ route('article.delete', $article) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Cancella</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-6">
                <img src="{{ Storage::url($article->img) }}" class="card-img-top w-50 img-fluid" alt="...">
            </div>
            <div class="col-6">
                <h1>{{ $article->title }}</h1>
                <p>{!! $article->body !!}</p>

                <ul class="list-group">
                    @foreach ($article->tags as $tag)
                    <li class="list-group-item">{{ $tag->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


</x-layout>