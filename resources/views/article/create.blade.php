<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Crea Articolo</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-6">
                <x-article.createform 
                    :categories="$categories"
                    :tags="$tags"
                 />
            </div>
        </div>
    </div>

</x-layout>
