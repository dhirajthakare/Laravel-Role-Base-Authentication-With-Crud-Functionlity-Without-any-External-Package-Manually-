<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regster Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    
     
    <div class="container" style="margin-top:15px">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Welcome</a>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{Route('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{Route('auth.login')}}">Login</a>
                    </li>
                    
                  </ul>
                </div>
              </nav>
        </div>
        <div class="col-5 offset-3 card p-5 " style="margin-top: 45px" >
                <h4>Register Here</h4><br>
                <form action="{{route('auth.create')}}" method="POST">
                    @if (Session::get('success'))
                     <div class="alert alert-success">
                         {{Session::get('success')}}
                     </div>  
                    @endif
                    @if (Session::get('fail'))
                     <div class="alert alert-danger">
                         {{Session::get('fail')}}
                     </div>  
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        <span class="text-danger"> @error('name'){{$message}}@enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}">
                        <span class="text-danger"> @error('email'){{$message}}@enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}">
                        <span class="text-danger"> @error('mobile'){{$message}}@enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="text-danger"> @error('password'){{$message}}@enderror </span>
                    </div>
                    <div>
                     <div class="form-group">
                        <label for="role">User Role</label>
                         <select name="role" id="" class="form-control">
                             <option value="Ety">Select Your Role</option>
                             <option value="Advisor">Advisor</option>
                             <option value="Client">Client</option>

                         </select>
                         <span class="text-danger"> @error('role'){{$message}}@enderror </span>

                      </div>
                        <div>
                        <button type="submit" class="btn btn-primary form-control">Submit </button>
                    </div>
                    <br>
                    <span><a href="{{ route('auth.login')}}"> If You  Have Account then Sign In Here .. </a></span>
                </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
