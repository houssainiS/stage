@extends('layouts.workersLayout')
@section('title')History @endsection
@section('historyContent')


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

<h1 align="center" style="margin-top: 30px;">Requests History</h1>
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">date</th>
      <th scope="col">approval</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->reference}}</th>
      <td>{{$item->description1}}</td>
      <td>{{$item->created_at}}</td>
      <td>waiting</td>
    </tr>
   @endforeach
  </tbody>
</table>





@endsection