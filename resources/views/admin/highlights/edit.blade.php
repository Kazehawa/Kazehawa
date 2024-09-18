@extends('admin.layouts.main')

@push('title')
<title>Admin Panel/Edit Highlight</title>
@endpush

@section('main-section')

<div class="main-content">
    <div class="header">
        <h1>Edit Highlight</h1>
    </div>

    <div class="admin-content">
        <form action="{{ route('admin.highlights.update', $highlight->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ $highlight->title }}" >
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" >{{ $highlight->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail">
            </div>

            <div class="form-group">
                <label for="video">Video</label>
                <input type="file" id="video" name="video">
            </div>

            <button type="submit" class="edit-button">Update</button>
        </form>
    </div>
</div>

@endsection
