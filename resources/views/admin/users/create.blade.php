@extends('admin.layouts.main')

@push('title')
<title>Admin Panel/Add User</title>
@endpush

@section('main-section')
<div class="main-content">
    <div class="header">
        <h1>Add User</h1>
    </div>
    <div class="admin-content">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-row">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="form-row">
                <label for="sex">Sex</label>
                <input type="text" id="sex" name="sex" required>
            </div>
            <div class="form-row">
                <label for="subscribed">Subscribed</label>
                <input type="text" id="subscribed" name="subscribed" required>
            </div>
            <div class="form-row">
                <label for="registered">Registered</label>
                <input type="text" id="registered" name="registered" required>
            </div>
            <div class="form-row">
                <label for="active_status">Active Status</label>
                <select id="active_status" name="active_status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="create-button">Create User</button>
        </form>
    </div>
</div>
@endsection
