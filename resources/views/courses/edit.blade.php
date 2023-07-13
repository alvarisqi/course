<h1>Edit Informasi Kursus</h1>
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

<form action="{{ route('courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ $course->title }}">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" class="form-control">{{ $course->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="duration">Durasi:</label>
        <input type="text" id="duration" name="duration" class="form-control" value="{{ $course->duration }}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
