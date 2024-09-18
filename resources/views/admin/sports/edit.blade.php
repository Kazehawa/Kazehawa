@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/Sports - Edit</title>
@endpush

@section('main-section')
    <div class="main-content">
        <div class="header">
            <h1>Edit Sports</h1>
        </div>
        <div class="admin-content">
            <form action="{{ route('admin.sports.update', $sport->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $sport->name }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image">
                </div>

                <button type="submit" class="edit-button">Update</button>
            </form>
        </div>
    </div>
@endsection
