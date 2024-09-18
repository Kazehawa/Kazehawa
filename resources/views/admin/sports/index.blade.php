@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/Sports</title>
@endpush

@section('main-section')


        <div class="main-content">
            <div class="header">
                <h1>Sports Management</h1>
            </div>
            <div class="admin-content">




                    <table class="sports-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sports as $sport)
                        <tr>
                            <td>{{ $sport->id }}</td>
                            <td>{{ $sport->name }}</td>
                            <td>{{ $sport->image}}</td>
                            <td>{{ $sport->created_at }}</td>
                            <td>{{ $sport->updated_at }}</td>
                            <td>{{ $sport->Actions }}</td>
                            <td>
                            <a href="{{ route('admin.sports.edit', $sport->id) }}">Edit</a>
                            <form action="{{ route('admin.sports.destroy', $sport->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this sports?')">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                <a href="{{ route('admin.sports.create') }}" class="add-sports-link">Add Sport</a>
            </div>
        </div>
           

@endsection



