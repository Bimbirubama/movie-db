@extends('layouts.main')

@section('navMovie', 'active')

@section('content')
<div class="container">
    <h2>Movie List</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">+ Add New Movie</a>

    @if ($movies->isEmpty())
        <p>No movies found.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>Actors</th>
                    <th>Cover</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $index => $movie)
                    <tr>
                        <td>{{ $movies->firstItem() + $index }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->category->name ?? 'N/A' }}</td>
                        <td>{{ $movie->year }}</td>
                        <td>{{ $movie->actors }}</td>
                        <td>
                            @if ($movie->cover_image)
                                <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover" width="60">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this movie?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
