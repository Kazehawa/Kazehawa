<!doctype html>
<html lang="en">
  <head>
    <title>Admin Panel</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


 <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
 <link rel="stylesheet" href="{{ asset('css/admin/messages.css') }}">


 <!-- <link rel="stylesheet" href="css/admin/useredit.css"> -->
 <!-- <link rel="stylesheet" href="css/admin/highlightsedit.css"> -->
 <!-- <link rel="stylesheet" href="css/admin/index.css"> -->
 <!-- <link rel="stylesheet" href="css/admin/news.css"> -->
 <!-- <link rel="stylesheet" href="css/admin/newsedit.css"> -->
 <!-- <link rel="stylesheet" href="css/admin/sportsedit.css"> -->
<!-- <link rel="stylesheet" href="css/messages.css"> -->

</head>
<body>
<div class="dashboard-container">
        <div class="sidebar">
            <h1> Admin {{ Auth::user()->name }}</h1>
            <div class="admin-menu">
                <ul>

                    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li><a href="{{ route('admin.sports.index') }}">Sports</a></li>
                    <li><a href="{{ route('admin.lives.index') }}">Lives</a></li>
                    <li><a href="{{ route('admin.news.index') }}">News</a></li>
                    <li><a href="{{ route('admin.highlights.index') }}">Highlights</a></li>
                    <li><a href="{{ route('admin.subscriptions.index') }}">Payments</a></li>
                    <li><a href="#">Setting</a></li>
                    <li><a href="login">Logout</a></li>
                </ul>
            </div>
        </div>


  
  
  
  