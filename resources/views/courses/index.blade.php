<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kursus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
</head>

<body>
    <h1>Daftar Kursus</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('courses.create') }}" class="btn btn-primary">Tambah Kursus Baru</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses ?? [] as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->duration }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Detail</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>