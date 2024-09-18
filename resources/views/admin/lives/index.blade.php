@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/LiveBroadcast</title>
@endpush

@section('main-section')


        <div class="main-content">
            <div class="header">
                <h1>Live Broadcasts Management</h1>
            </div>
            <div class="admin-content">



                

                    <table class="live-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Thumbnail</th>                           
                            <th>Video</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                            
                            
                       
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lives as $live)
                        <tr>
                            <td>{{ $live->id }}</td>
                            <td>{{ $live->title }}</td>
                            <td>{{ $live->thumbnail }}</td>
                            <td>{{ $live->video }}</td>
                            <td>{{ $live->description }}</td>
                            <td>{{ $live->created_at }}</td>
                            <td>{{ $live->updated_at }}</td>
                            <td>{{ $live->Actions }}</td>
                            <td>
                            <a href="{{ route('admin.lives.edit', $live->id) }}">Edit</a>
                            <form action="{{ route('admin.lives.destroy', $live->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this live?')">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('admin.lives.create') }}" class="add-live-link">Add LiveBroadcast</a>
            </div>
        </div>
                   


@endsection



