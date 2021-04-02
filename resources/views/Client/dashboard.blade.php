<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client Dashbord</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class=" card " style="margin-top: 45px">
            <div>
                <div class="nav-item dropdown float-right">
                    <h6 class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Client {{ $LoggedUserInfo['name'] }}</h6>
                    <div class="dropdown-menu">
                        <a href="{{route('dashboard')}}" class="dropdown-item" >Home </a>
                        <a href="{{route('appointment')}}" class="dropdown-item" >Take a Appointment </a>
                        <a href="{{route('appointmentInfo')}}" class="dropdown-item" >Yours Appointments </a>
                      <a class="dropdown-item" >{{ $LoggedUserInfo['name'] }} </a>
                      <a class="dropdown-item" >{{ $LoggedUserInfo['email'] }}</a>
                      <a class="dropdown-item" href="{{route('auth.logout')}}">Logout </a>
                      
                </div>
            </div>
            <h4 class="text-center p-1">Client Dashboard</h4>


        </div>
    </div>
    <div class=" mt-3 col-6 offset-3 card text-center p-1">
         You are login ...
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>