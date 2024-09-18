@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/LiveBroadcast - Edit</title>
@endpush

@section('main-section')
    <div class="main-content">
        <div class="header">
            <h1>Edit Live Broadcast</h1>
        </div>
        <div class="admin-content">
            <form action="{{ route('admin.lives.update', $live->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{ $live->title }}" required>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail">
                </div>

                <div class="form-group">
                    <label for="video">Video File</label>
                    <input type="file" id="video" name="video">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required>{{ $live->description }}</textarea>
                </div>

                <button type="submit" class="edit-button">Update</button>
            </form>
        </div>
    </div>
@endsection
