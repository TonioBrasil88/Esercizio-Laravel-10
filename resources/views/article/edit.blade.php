<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Modifica Articolo</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-6">
                <x-article.editform 
                    :article="$article"
                    :categories="$categories" 
                    :tags="$tags" 
                />
            </div>
        </div>
    </div>


</x-layout>