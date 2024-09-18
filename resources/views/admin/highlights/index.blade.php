@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/Highlights</title>
@endpush

@section('main-section')

        <div class="main-content">
            <div class="header">
                <h1>Highlights Management</h1>
            </div>
            
            <div class="admin-content">
                    
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Thumbnail</th>
                        <th>Video</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($highlights as $highlight)
                        <tr>
                            <td>{{ $highlight->id }}</td>
                            <td>{{ $highlight->title }}</td>
                            <td>{{ $highlight->thumbnail }}</td>
                            <td>{{ $highlight->description }}</td>
                            <td>{{ $highlight->video }}</td>
                            <td>{{ $highlight->created_at }}</td>
                            <td>{{ $highlight->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.highlights.edit', $highlight->id) }}">Edit</a>
                                    <form action="{{ route('admin.highlights.destroy', $highlight->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this live?')">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                    <div class="footer">
                    <a href="{{ route('admin.highlights.create') }}"><button class="add-button">Add Highlights</button></a>
                    </div>
            </div>
        
        </div>
    
@endsection
