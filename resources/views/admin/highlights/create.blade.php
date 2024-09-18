@extends('admin.layouts.main')

@push('title')
<title>Admin Panel/Create Highlight</title>
@endpush

@section('main-section')

<div class="main-content">
    <div class="header">
        <h1>Create Highlight</h1>
    </div>

    <div class="admin-content">
        <form action="{{ route('admin.highlights.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" required>
            </div>
            <div class="form-group">
                    <label for="video">Video</label>
                    <input type="file" id="video" name="video" required>
            </div>

            <button type="submit" class="create-button">Create</button>
        </form>
    </div>
</div>

@endsection
