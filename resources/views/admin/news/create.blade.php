@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/News</title>
@endpush

@section('main-section')
    <div class="main-content">
        <div class="header">
            <h1>Create News</h1>
        </div>
        <div class="admin-content">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" required>
                </div>

                <button type="submit" class="add-button">Create</button>
            </form>

         
        </div>
    </div>
@endsection
