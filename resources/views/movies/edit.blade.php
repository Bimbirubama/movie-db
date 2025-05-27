@extends('layouts.main')

@section('navMovie', 'active')

@section('content')
<div class="container">
    <h2>Edit Movie</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="{{ old('title', $movie->title) }}" class="form-control" id="title" required>
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea name="synopsis" class="form-control" id="synopsis" rows="3">{{ old('synopsis', $movie->synopsis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Release Year</label>
            <input type="number" name="year" class="form-control" value="{{ old('year', $movie->year) }}" min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="mb-3">
            <label for="actors" class="form-label">Actors</label>
            <textarea name="actors" class="form-control" rows="2">{{ old('actors', $movie->actors) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Cover</label><br>
            @if ($movie->cover_image)
                <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover Image" width="100">
            @else
                <span class="text-muted">No image</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Replace Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Movie</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
