@extends('layouts.main')

@section('navMovie', 'active')

@section('content')
<div class="container">
    <h2>Add New Movie</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea name="synopsis" class="form-control" id="synopsis" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Release Year</label>
            <input type="number" name="year" class="form-control" min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="mb-3">
            <label for="actors" class="form-label">Actors</label>
            <textarea name="actors" class="form-control" id="actors" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Movie</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
