</<!DOCTYPE html>
<html>
<head>
   
</head>
<body>

<h1>All Information About Users</h1>

@foreach ($users as $user)
<li> {{ $user}}  </li>
@endforeach

<h1>Only Names Of Users</h1>

@foreach ($users as $user)

<li> {{ $user->userName}}  </li>

@endforeach

<h1>Only Description Of Users</h1>

@foreach ($users as $user)

<li> {{ $device->emailAddress}}  </li>

@endforeach
    
</body>
</html>