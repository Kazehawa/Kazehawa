@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/Sports</title>
@endpush

@section('main-section')
    <div class="main-content">
        <div class="header">
            <h1>Add Sports</h1>
        </div>
        <div class="admin-content">
            <form action="{{ route('admin.sports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" required>
                </div>

                <button type="submit" class="add-button">Add</button>
            </form>
        </div>
    </div>
@endsection
