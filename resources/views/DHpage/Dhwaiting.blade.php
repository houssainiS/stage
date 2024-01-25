@extends('layouts.DHLayout')
@section('title')History @endsection
@section('DhWaiting')



<h1 align="center" style="margin-top: 30px;">{{$department}} Requests waiting for approval</h1>
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
      <td><a href="{{route('DHrequest.history',[$worker,$item->reference])}}" class="">{{ substr($item->description1, 0, 40) }}</a></td>
      <td>{{$item->IT_ST}}</td>
      <td>{{$item->created_at}}</td>
      <td>
      @if($item->DH_approval == "none")  
      <div style="display:inline;">
      <a href="{{route('DHapprove',[$worker,$item->reference])}}"><button type="button" class="btn btn-success">Approve</button></a>
      <a href="{{route('DHdisapprove',[$worker,$item->reference])}}"><button type="button" class="btn btn-danger">Disapprove</button></a>
      @elseif($item->DH_approval == "True") 
      <p>Approved</p>
      @elseif(($item->DH_approval == "False") )
      <p>Disapproved</p> 
      @endif
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>



@endsection