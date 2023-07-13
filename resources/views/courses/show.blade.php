<head>    
    <h1>Detail Kursus</h1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
</head>
<body>
    <h2>{{ $course->title }}</h2>
    <p>{{ $course->description }}</p>
    <p>Durasi: {{ $course->duration }}</p>

    <h3>Daftar Materi:</h3>
    <ul>
        @foreach($course->materials as $material)
            <li>
                <h4>{{ $material->title }}</h4>
                <p>{{ $material->description }}</p>
                <p>Link Embed: {{ $material->embed_link }}</p>
                <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('materials.create', $course->id) }}" class="btn btn-primary">Tambah Materi</a>

    <form id="create-material-form" action="{{ route('materials.store') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course->id }}">
    </form>
</body>