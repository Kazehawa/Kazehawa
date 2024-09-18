@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/Users</title>
@endpush

@section('main-section')

@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
  
        <div class="main-content">
        <div class="header">
            <h1>Edit User</h1>
        </div>
        <div class="admin-content">
            
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="{{ $user->country }}" required>
                </div>

                <div class="form-group">
                    <label for="sex">Sex</label>
                    <input type="text" id="sex" name="sex" value="{{ $user->sex }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="subscribed">Subscribed</label>
                    <input type="text" id="subscribed" name="subscribed" value="{{ $user->subscribed }}" required>
                </div>

                <div class="form-group">
                    <label for="registered">Registered</label>
                    <input type="text" id="registered" name="registered" value="{{ $user->registered }}" required>
                </div>

                <div class="form-group">
                    <label for="active_status">Active Status</label>
                    <select id="active_status" name="active_status" required>
                        <option value="1" {{ $user->active_status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->active_status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="update-button">Update</button>
            </form>
        </div>
    </div>
@endsection

   
