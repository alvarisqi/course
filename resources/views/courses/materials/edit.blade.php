<h1>Edit Informasi Materi</h1>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('materials.update', $material->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ $material->title }}">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" class="form-control">{{ $material->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="embed_link">Link Embed Materi:</label>
        <input type="text" id="embed_link" name="embed_link" class="form-control" value="{{ $material->embed_link }}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
