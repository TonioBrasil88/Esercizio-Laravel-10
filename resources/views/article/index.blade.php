<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Lista Articoli</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            @foreach($articles as $article)
                <x-article.card :article="$article" />
            @endforeach
        </div>
    </div>


</x-layout>