<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advisor home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class=" card " style="margin-top: 45px">
            <div>
                <div class="nav-item dropdown float-right">
                    <h6 class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Advisor {{ $LoggedUserInfo['name'] }}</h6>
                    <div class="dropdown-menu">
                       <a href="{{route('dashboard')}}" class="dropdown-item" >Home </a>
                       <a href="{{route('appointmentInfo')}}" class="dropdown-item" >appointments </a>
                       <a class="dropdown-item" >{{ $LoggedUserInfo['name'] }} </a>
                      <a class="dropdown-item" >{{ $LoggedUserInfo['email'] }}</a>
                      <a class="dropdown-item" href="{{route('auth.logout')}}">Logout </a>
                      
                </div>
            </div>
            <h4 class="text-center m-1">Advisor Dashboard</h4>
        </div>
        </div>
            <div class="m-3">

                    <h4> Appointment Status </h4>
        
                 </div>

                 <div class="m-3">
                    @if (session('success'))

                    <div class="alert alert-success">
                        {{session('success')}}
                        </div>    
                    
                        @elseif (session('fail'))
                
                    <div class="alert alert-danger">
                        {{session('fail')}}
                        </div>    
                  
                        
                    @endif
                 </div>

                 <div>

                    <table class="table table-bordered table-striped table-hover text-center">

                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Booking Date</th>
                                <th>Number of Persons </th>
                                <th>Appointment Status</th>
                                <th>Action</th>

                            </thead>
                            <tbody>
                                
                                
                                @foreach ($appointments as $appointment )
                                
                                <tr>
                                    <td> {{$appointment->name}} </td>
                                    <td> {{$appointment->email}} </td>
                                    <td> {{$appointment->mobile}} </td>
                                    <td> {{$appointment->bookingDate}} </td>
                                    <td> {{$appointment->noPerson}} </td>
                                    
                                         <form action="{{Route('update')}}" method="POST">
                                             <td>
                                                 @csrf
                                                 <input type="hidden" name="token" value="{{$appointment->id}}">
                                            <select name="status" id="status" >
                                                <option value="{{$appointment->status}}">{{$appointment->status}}</option>
                                                @if ($appointment->status!="Declined")
                                                <option value="Declined">Declined</option>
                                                @endif
                                                @if ($appointment->status!="Waiting")
                                                <option value="Waiting">Waiting</option>
                                                @endif
                                                @if ($appointment->status!="Approved")
                                                <option value="Approved">Approved</option>
                                             @endif
    
                                             </select>
                                            </td>
                                        

                                    <td> <button class="btn btn-warning" type="submit"> Change status </button> </td>
                                         </form>
                                </tr>
                                @endforeach
                                
                            </tbody>
                    </table>
                 </div>
                 
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>