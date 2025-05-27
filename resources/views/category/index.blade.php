@extends('layouts.main')
@section('title','Data Category')
@section('navCategory','active')

@section('content')
<h1>Daftar Category :</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3"> Input Data Category</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Category Name</th>
        <th>Aksi</th>
    </tr>

    @foreach ($categories as $category)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $category->name }}</td>
    <td>
        <!-- Tombol Edit -->
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>

        <!-- Tombol Hapus -->
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
        </form>
    </td>

</tr>

@endforeach
</table>
@endsection
