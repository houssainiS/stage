@extends('layouts.workersLayout')
@section('title')aboutme @endsection
@section('aboutmeContent')
<header>
  <a href="{{route('goWorker',$worker)}}" class="welcome">Welcome!</a>
  <nav>
    <ul>
      <li><a href="{{route('request',$worker)}}">request</a></li>
      <li><a href="{{route('aboutme',$worker)}}">about me</a></li>
      <li><a href="{{route('welcome')}}">logout</a></li>
    </ul>
  </nav>
</header>




<h1>About Me</h1>

<div class="profile-info">
 <ul>
    <li><strong>Username:</strong> {{$username}}</li>
    <li><strong>Name:</strong> {{$name}} {{$lastname}}</li>
    <li><strong>Email:</strong> {{$email}}</li>
    <li><strong>Phone Number:</strong> {{$phone}}</li>
    <li><strong>Age:</strong> {{$age}}</li>
    <li><strong>ID:</strong> {{$id}}</li>
    <li><strong>Department:</strong> {{$department}}</li>
    <li><strong>Rank:</strong> {{$rank}}</li>
  </ul>
</div>






@endsection