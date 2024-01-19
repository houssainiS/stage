@extends('layouts.DHLayout')
@section('title')History @endsection
@section('DHhistoryContent')




<h1 align="center" style="margin-top: 30px;">Requests History</h1>
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
      <td><a href="{{route('DHrequest.history',[$worker,$item->reference])}}" class="">{{$item->description1}}</a></td>
      <td>{{$item->IT_ST}}</td>
      <td>{{$item->created_at}}</td>
      <td>waiting</td>
    </tr>
   @endforeach
  </tbody>
</table>





@endsection