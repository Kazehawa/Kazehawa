@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/News</title>
@endpush

@section('main-section')
    <div class="main-content">
        <div class="header">
            <h1>News Management</h1>
        </div>
        <div class="admin-content">
            <table class="khabar-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $khabar)
                        <tr>
                            <td>{{ $khabar->id }}</td>
                            <td>{{ $khabar->title }}</td>
                            <td>{{ $khabar->description }}</td>
                            <td>
                                <img src="{{ asset('storage/files/' . $khabar->image) }}" alt="News Image" width="100">
                            </td>
                            <td>{{ $khabar->created_at }}</td>
                            <td>{{ $khabar->updated_at }}</td>
                            <td>{{ $khabar->Actions }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', $khabar->id) }}">Edit</a>
                                <form action="{{ route('admin.news.destroy', $khabar->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this khabar?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.news.create') }}" class="add-khabar-link">Add News</a>
        </div>
    </div>
@endsection
