@extends('layouts.workersLayout')
@section('title')worker @endsection
@section('aboutmeContent')
<header>
  <a href="{{route('welcome')}}" class="welcome">Welcome!</a>
  <nav>
    <ul>
      <li><a href="#">request</a></li>
      <li><a href="{{route('aboutme',$worker)}}">about me</a></li>
      <li><a href="#">logout</a></li>
    </ul>
  </nav>
</header>

@endsection