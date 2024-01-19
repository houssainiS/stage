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

<h1 align="center" style="margin-top: 30px;">IT Requests History</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">type</th>
      <th scope="col">date</th>
      <th scope="col">approval</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->reference}}</th>
      <td><a href="{{route('request.history',[$worker,$item->reference])}}" class="">{{$item->description1}}</a></td>
      <td>{{$item->IT_ST}}</td>
      <td>{{$item->created_at}}</td>
      <td>waiting</td>
    </tr>
   @endforeach
  </tbody>
</table>





@endsection