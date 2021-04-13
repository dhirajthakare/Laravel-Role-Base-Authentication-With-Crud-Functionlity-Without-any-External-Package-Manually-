<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client Dashbord</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" />

</head>
<body>
    <div class="container">
        <div class=" card " style="margin-top: 45px">
            <div>
                <div class="nav-item dropdown float-right">
                    <h6 class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Client {{ $LoggedUserInfo['name'] }}</h6>
                    <div class="dropdown-menu">
                        <a href="{{route('/')}}" class="dropdown-item" >Home </a>
                        <a href="{{route('dashboard')}}" class="dropdown-item" >Dashboard </a>
                        <a href="{{route('appointment')}}" class="dropdown-item" >Take a Appointment </a>
                        <a href="{{route('appointmentInfo')}}" class="dropdown-item" >Yours Appointments </a>
                      <a class="dropdown-item" >{{ $LoggedUserInfo['name'] }} </a>
                      <a class="dropdown-item" >{{ $LoggedUserInfo['email'] }}</a>
                      <a href="{{route('client.edit')}}" class="dropdown-item" >Update Profile</a>
                      <a class="dropdown-item" href="{{route('auth.logout')}}">Logout </a>
                      
                </div>
            </div>
            <h4 class="text-center p-1">Client Dashboard</h4>
        </div>
        </div>
        
    

<div class=" col-6 offset-3 card p-5 mt-5">
  
    
    
    <h4>Update Profile</h4><br>
<form action="{{route('role.update')}}" method = "post">
    @if (session('success'))

    <div class="alert alert-success">
        {{session('success')}}
        </div>    
    
        @elseif (session('fail'))

    <div class="alert alert-danger">
        {{session('fail')}}
        </div>    
  
        
    @endif
    <div class="form-group">
        <label for="name">Enter Name </label>
@csrf   
        <input type="hidden" class="form-control" name="clientId"  value="{{ $LoggedUserInfo['id'] }}">
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ $LoggedUserInfo['name'] }}">
        <span class="text-danger">@error('name') {{$message}} @enderror</span>
      </div>
    <div class="form-group">
        <label for="email">Email Address </label>
        <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{ $LoggedUserInfo['email'] }}" >
        <span class="text-danger">@error('email') {{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="mobile">Mobile No </label>
        <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" value="{{ $LoggedUserInfo['mobile'] }}" >
        <span class="text-danger">@error('mobile') {{$message}} @enderror</span>
      </div>
   
      <div class="form-group">
        <button type="submit" class="btn btn-primary form-control mt-3">Update</button>
      </div>
</form>
</div>
    </div>
<script type='text/javascript' src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
<script>
   $(document).ready(function () {
      var currentDate = new Date();
      $('#bookingDate').datepicker({
      format: 'dd/mm/yyyy',
      autoclose:true,
      startDate: "currentDate",
      minDate: currentDate
      }).on('changeDate', function (ev) {
         $(this).datepicker('hide');
      });
      $('#bookingDate').keyup(function () {
         if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
         }
      });
   });
</script>


</body>
</html>
