@extends('admin.layouts.main')

@push('title')
<title> Admin Panel/Payments</title>
@endpush

@section('main-section')



        <div class="main-content">
            <div class="header">
                <h1>Subscription Records</h1>
            </div>
            <div class="admin-content">



               

                    <table class="user-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Card_Number</th>
                            <th>Expiry_Date</th>
                            <th>CVC</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscriptions as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->card_number }}</td>
                            <td>{{ $user->expiry_date }}</td>
                            <td>{{ $user->cvc }}</td>
                            <td>{{ $user->amount }}</td>
                            <td>{{ $user->payment_method }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->Actions }}</td>
                            <td>
                            <form action="{{ route('admin.subscriptions.destroy', $user->id) }}" method="POST" class="delete-form">
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



