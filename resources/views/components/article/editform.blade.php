<form action="{{ route('article.update', $article) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" value="{{ old('title') ?? $article->title  }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="subtitle" class="form-label">Subtitle</label>
        <input type="text" name="subtitle" value="{{ old('title') ?? $article->subtitle  }}" class="form-control @error('subtitle') is-invalid @enderror">
        @error('subtitle')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Img</label>
        <div class="d-flex">
            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
            <img src="{{ Storage::url($article->img) }}" class="card-img-top img-fluid" style="width:50px">
        </div>
        @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select name="category_id" class="form-select">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if($category->id == $article->category_id)
                selected
                @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tags" class="form-label">Tag</label>
        <select name="tags[]" class="form-select" multiple>
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
                @if($article->tags->contains($tag->id))
                selected
                @endif
                >{{ $tag->name }}</option>
            @endforeach
        </select>
        <small class="fst-italic">usare Ctrl+Click per selezionare più tag</small>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea name="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10">{{ $article->body }}</textarea>
        @error('body')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-success">Salva</button>
</form>