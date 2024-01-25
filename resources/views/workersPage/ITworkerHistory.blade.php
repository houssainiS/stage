@extends('layouts.workersLayout')
@section('title')History @endsection
@section('historyContent')




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
      <td><a href="{{route('request.history',[$worker,$item->reference])}}" class="">{{ substr($item->description1, 0, 40) }}</a></td>
      <td>{{$item->IT_ST}}</td>
      <td>{{$item->created_at}}</td>
      <td>@if($item->DH_approval == "True") 
      <p style="color:lime">Approved</p>
      @elseif(($item->DH_approval == "False") )
      <p style="color:red">Disapproved</p> </td>
      @else
      <p>waiting</p>
      @endif</td>
    </tr>
   @endforeach
  </tbody>
</table>





@endsection