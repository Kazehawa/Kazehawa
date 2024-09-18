@extends('admin.layouts.main')

@push('title')
<title> Admin Highlights</title>
@endpush

@section('main-section')



@extends('admin.layouts.main')

@push('title')
<title> Admin Highlights</title>
@endpush

@section('main-section')


       
            
        <div class="main-content">
            <div class="header">
            <h2>Users Management</h2>
            </div>

            <div class="admin-content">
                            <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        
                        <div>
                            <label for="sex">Sex:</label>
                            <select name="sex" id="sex" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="country">Country:</label>
                            <input type="text" name="country" id="country" required>
                        </div>
                        
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        
                        <div>
                                <label for="subscription">Subscription:</label>
                            <input type="text" name="subscription" id="subscription">
                        </div>
                        
                        <div>
                            <label for="active_status">Active Status:</label>
                            <input type="checkbox" name="active_status" id="active_status">
                        </div>
                        
                        <button type="submit">Submit</button>
                        </form>

        
                </div>
     </div>

@endsection
