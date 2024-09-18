@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/LiveBroadcast</title>
@endpush

@section('main-section')
    <div class="main-content">
        <div class="header">
            <h1>Add Live Broadcast</h1>
        </div>
        <div class="admin-content">
            <form action="{{ route('admin.lives.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" required>
                </div>

                <div class="form-group">
                    <label for="video">Video File</label>
                    <input type="file" id="video" name="video" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required></textarea>
                </div>

                <button type="submit" class="add-button">Create</button>
            </form>
        </div>
    </div>
@endsection
