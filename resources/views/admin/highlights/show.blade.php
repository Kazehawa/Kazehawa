@extends('admin.layouts.main')

@push('title')
<title> Admin Highlights</title>
@endpush

@section('main-section')
        <div class="main-content">
            <div class="header">
                <h2>Highlights Management</h2>
            </div>
            <div class="admin-content">
                
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Video URL</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Goal Compilation</td>
                        <td>https://www.youtube.com/watch?v=VIDEO_ID</td>
                        <td>
                            <a href="">Edit</a> |
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <!-- Add more highlight rows as needed -->
                </table>
                <div class="footer">
                <a href="adminhighlightsedit"><button class="add-button">Add News</button></a>
            </div>
            </div>
        
        </div>
   
@endsection