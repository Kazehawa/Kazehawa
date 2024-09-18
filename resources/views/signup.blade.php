<!doctype html>
<html lang="en">
  <head>
    <title>Signup</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="css/signup.css">

  </head>
  <body>

  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

  <form method="POST" action="{{ route('signup') }}">
  @csrf
  <div class="container">
    <h1 class="text-center">Signup</h1>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Your Name" aria-describedby="name-error" required>
      <span class="text-danger" id="name-error">
        @error('name')
          {{ $message }}
        @enderror
      </span>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Your Email" aria-describedby="email-error" required>
      <span class="text-danger" id="email-error">
        @error('email')
          {{ $message }}
        @enderror
      </span>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-describedby="password-error" required>
      <span class="text-danger" id="password-error">
        @error('password')
          {{ $message }}
        @enderror
      </span>
    </div>


    <div class="form-group">
      <label for="confirm_password">Confirm Password</label>
      <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Enter Your Password Again" aria-describedby="confirm-password-error" required>
      <span class="text-danger" id="confirm-password-error">
        @error('password_confirmation')
          {{ $message }}
        @enderror
      </span>
    </div>
    

    <div class="form-group">
      <label for="country">Country</label>
      <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" placeholder="Enter Your Country" aria-describedby="country-error" required>
      <span class="text-danger" id="country-error">
        @error('country')
          {{ $message }}
        @enderror
      </span>
    </div>

    <div class="form-group">
      <label for="sex">Sex</label>
      <select name="sex" id="sex" class="form-control" required>
        <option value="">Select Sex</option>
        <option value="male" {{ old('sex') === 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('sex') === 'female' ? 'selected' : '' }}>Female</option>
      </select>
      <span class="text-danger" id="sex-error">
        @error('sex')
          {{ $message }}
        @enderror
      </span>
    </div>

    <div class="signup-button">
      <button type="submit" class="btn btn-primary">Signup</button>
    </div>
  </div>
</form>


    </body>
</html>
