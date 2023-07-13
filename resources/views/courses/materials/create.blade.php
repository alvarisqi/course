<h1>Tambah Materi Baru</h1>
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

<form action="{{ route('materials.store', $course) }}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value="{{ $course }}">
    <div class="form-group">
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="embed_link">Link Embed Materi:</label>
        <input type="text" id="embed_link" name="embed_link" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
