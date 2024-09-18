@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/News - Edit</title>
@endpush

@section('main-section')
    <div class="main-content">
        <div class="header">
            <h1>Edit News</h1>
        </div>
        <div class="admin-content">
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{ $news->title }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required>{{ $news->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image">
                </div>

                <button type="submit" class="edit-button">Update</button>
            </form>

            @if (isset($news->image))
                <img src="{{ asset('storage/files/' . $news->image) }}" alt="News Image">
            @endif
        </div>
    </div>
@endsection
