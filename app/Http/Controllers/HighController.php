<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Highlight;
use App\Models\LiveBroadcast;
use App\Models\Subscription;
use App\Models\User;
use App\Models\News;
use App\Models\Sport;
use NunoMaduro\Collision\Adapters\Phpunit\Subscribers\Subscriber;

class HighController extends Controller
{
   
    public function admin()
    {
        return view('admin.dashboard');
    }


   
    public function adminlogin()
    {
        return view('admin.login');
    }



    public function loggedinlivesrightnow()
    {

            $lives= LiveBroadcast::all();

        return view('loggedin.livesrightnow', compact('lives'));
    }


    public function adminloginstore(Request $request)
    {
        
       
  
       // Validate the login form data
       $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

        // Attempt to log in the user
        if (Auth::attempt($validatedData)) {
            // Authentication passed
            return redirect()->intended('/admin'); // Redirect to the desired page after successful login
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Sorry! You dont have access to admin panel.');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function subscription()
{
    // Check if the user is already registered
    if (Auth::check()) {
        // User is registered, allow subscription
        return view('subscription');
    } else {
        // User is not registered, redirect to login page
        return redirect()->route('login')->with('error', 'Please log in to subscribe.');
    }
}


    public function subscriptionStore(Request $request)
    {
                // Validate the input data
            $validatedData = $request->validate([
                'card_number' => 'required',
                'name' => 'required',
                'expiry_date' => 'required',
                'cvc' => 'required',
                'amount' => 'required',
                'payment_method' => 'required',

                // Add more validation rules for other fields if needed
            ]);

        // Create a new subscription instance
        $subscription = new Subscription();
       
        $subscription->name = $validatedData['name'];
        $subscription->expiry_date = $validatedData['expiry_date'];
        $subscription->cvc = $validatedData['cvc'];
        $subscription->amount = $validatedData['amount'];
        $subscription->card_number = $validatedData['card_number'];
        $subscription->payment_method = $validatedData['payment_method'];
    
        // Save the subscription to the database
        $subscription->save();


        // Retrieve the authenticated user instance
        $user = Auth::user();

        // Update the 'subscribed' column value for the user
        $user->subscribed = true;
        $user->save();
        
        // Redirect the user or perform any additional actions
    
        return redirect()->route('loggedinhome')->with('success', 'Congratulions! you can now watch lives and highlights video.');
    }
    

    
    // public function subscription(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'card_number' => 'required',
    //         'name' => 'required',
    //         'expiry_date' => 'required',
    //         'cvc' => 'required',
    //         'amount'=> 'required',
    //     ]);
    
    //     // Store the subscription data in the database
    //     $subscription = new Subscription();
    //     $subscription->card_number = $validatedData['card_number'];
    //     $subscription->name = $validatedData['name'];
    //     $subscription->expiry_date = $validatedData['expiry_date'];
    //     $subscription->cvc = $validatedData['cvc'];
    //     $subscription->money = $validatedData['money'];
    //     $subscription->save();
    
    //     // Assign the "subscribed" tag to the user 
    //     $user = Auth::user();
    //     $user->subscribed = true;
    //     $user->save();
    
    //     // Redirect or perform any additional actions as needed
    // }





    // Loggedin Pages

            public function loggedinsearch()
            {
              $news = News::all();
              $lives = LiveBroadcast::all();
              $sports = Sport::all();
              $highlights = Highlight::all();
              
            return view('loggedin.search', compact('news','lives','sports','highlights'));
            }

            public function loggedinfootballpage()
            {
                return view('loggedin.football');
            }

            public function loggedinfootballtable()
            {
                return view('loggedin.footballtable');
            }



  
            public function loggedinhighlightsmain($id)
            {
                // Check if the user is authenticated
                if (Auth::check()) {
                    $user = Auth::user();
            
                    // Check if the user has subscribed and registered
                    if ($user->subscribed && $user->registered) {
                        // User is eligible to watch the live content
            
                        // Retrieve the specific highlight using the $id parameter
                        $highlights = Highlight::find($id);
            
                        // Check if the highlight exists
                        if ($highlights) {
                            return view('loggedin.highlightsmain', compact('highlights'));
                        } else {
                            // Highlight not found
                            return redirect()->route('loggedinhighlights')->with('error', 'Highlight not found.');
                        }
                    } else {
                        // User is not subscribed or registered
                        return redirect()->route('subscription')->with('error', 'You need to subscribe and register to watch the live content.');
                    }
                } else {
                    // User is not authenticated
                    return redirect()->route('login')->with('error', 'You need to login to watch the live content.');
                }
            }
            


    
    public function loggedinhighlights()
    {
        $highlights = Highlight::all();
    
        return view('loggedin.highlights', compact('highlights'));
    }



    public function loggedinsports()
    {
        $sports = Sport::all();
    
        return view('loggedin.sports', compact('sports'));
    }




    public function loggedinnewspage($id)
    {
        $news = News::find($id);
    
        return view('loggedin.newspage', compact('news'));
    }
        


    public function loggedinresults()
    {
        return view('loggedin.results');
    }




    
    public function loggedinnews()
    {
        
        $news = News::all();
    
        return view('loggedin.news', compact('news'));
    }



    public function loggedinhome(Request $request)
    {



        $news = News::all(); 
        $lives = LiveBroadcast::all(); 
        $highlights = Highlight::all();
       

        return view('loggedin.home', compact('news','lives','highlights'));
    }


    public function loggedinprofile()
    {

        $user = Auth::user(); // Retrieve the authenticated user

        return view('loggedin.profile', compact('user'));
    }










    

    public function loggedineditprofile()
    {
        $user = Auth::user()->first();
        return view('loggedin.editprofile', compact('user'));
    }



    public function loggedinprofileUpdate(Request $request)
    {

  
        $user = Auth::user();

    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'sex' => 'required|in:male,female',
        'country' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    // Check if the current password is correct
    if (!Hash::check($validatedData['current_password'], $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update profile information
    $user->name = $validatedData['name'];
    $user->sex = $validatedData['sex'];
    $user->country = $validatedData['country'];
    $user->email = $validatedData['email'];
    

    // Update password
    $user->password = bcrypt($validatedData['new_password']);
    $user->save();

    return redirect()->route('loggedinprofile')->with('success', 'Profile and password updated successfully.');
}















    public function loggedinwatchlive($id)
    {

        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has subscribed and registered
            if ($user->subscribed && $user->registered) {

                $lives = LiveBroadcast::find($id);
                return view('loggedin.watchlive', compact('lives'));
                // User is eligible to watch the live content      
            }
        }
    
        // User is not eligible to watch the live content
        return redirect()->route('subscription')->with('error', 'You need to subscribe and register to watch the live content.');
    }


    // User Post Routes

    public function processLogin(Request $request)
    {
        // Validate the login request
       
  
       // Validate the login form data
       $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

        // Attempt to log in the user
        if (Auth::attempt($validatedData)) {
            // Authentication passed
            return redirect()->intended('/loggedinhome'); // Redirect to the desired page after successful login
        } else {
            // Authentication failed

            
            return redirect('/login')->with('error', 'Invalid credentials,Please try again.');
        }
        
    }
    
   
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with( 'Logout successfully');
    }
    



    public function processSignup(Request $request)
    {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'country' => 'required|string',
                'sex' => 'required|in:male,female',
            ]);

        
            // Create a new user instance
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt($validatedData['password']);
            $user->country = $validatedData['country'];
            $user->sex = $validatedData['sex'];
        
            // Save the user to the database
            $user->save();

            // Update the 'registered' column value to indicate registration completion
            $user->registered = true;
            $user->save();
        
            // Redirect the user after successful signup
            return redirect()->route('login')->with('success', 'Signed up Successfully! You can now login here');
        }





        

   
    }








    

