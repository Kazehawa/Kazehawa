@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/Users</title>
@endpush

@section('main-section')


        <div class="main-content">
            <div class="header">
                <h1>Users Management</h1>
            </div>
            <div class="admin-content">



                

                    <table class="user-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Sex</th>
                            <th>Password</th>
                            <th>Subscribed</th>
                            <th>Registered</th>
                            <th>Active Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->sex }}</td>
                            <td>{{ $user->password }}</td>
                            
                            <td>
                                @if($user->subscribed == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td> <td>
                                @if($user->registered == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            
                            <td>
                                @if($user->active_status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>

                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->Actions }}</td>
                            <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
                    
                 


@endsection



