<form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="subtitle" class="form-label">Sottotitolo</label>
        <input type="text" name="subtitle"
            class="form-control @error('subtitle') is-invalid @enderror">
        @error('subtitle')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cateory_id" class="form-label">Categoria</label>
        <select name="cateory_id" class="form-select">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('cateory_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tags" class="form-label">Tag</label>
        <select name="tags[]" class="form-select" multiple>
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <small class="fst-italic">usare Ctrl+Click per selezionare più tag</small>
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Titolo</label>
        <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
        @error('img')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea name="body" class="form-control" cols="30" rows="10"></textarea> @error('body')
            is-invalid
        @enderror">
        @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn button-primary d-flex justify-content-center">Crea Articolo</button>
</form>