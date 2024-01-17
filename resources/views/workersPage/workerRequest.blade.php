@extends('layouts.workersLayout')
@section('title')request @endsection
@section('workerRequestContent')

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

<div class="centered-buttons">
<a href="#" class="custom-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Order</a>
<a href="#" class="custom-button" style="position: absolute; top: 50%; left: 55%; transform: translate(-50%, -50%);">History</a>

</div>


<style>
    .custom-button {
  /* Your desired styles for these specific links */
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

</style>







@endsection