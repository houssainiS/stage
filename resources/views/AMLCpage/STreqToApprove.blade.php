@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('AMLCstReqToApproveContent')


<h1 align="center" style="margin-top: 30px;">Stationery Requests waiting for approval</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">type</th>
      <th scope="col">Rrquest date</th>
      <th scope="col">DH approval date</th>
      <th scope="col">approval</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->reference}}</th>
      <td><a href="{{route('AMLCwork.oneRequest',[$worker,$item->reference])}}" class="">{{ substr($item->description1, 0, 40) }}</a></td>
      <td>{{$item->IT_ST}}</td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->DH_approval_date}}</td>
      <td>
      @if($item->AMLC_approval == "none")  
      <div style="display:inline;">
      <a href="{{route('AMLCwork.STapprove',[$worker,$item->reference])}}"><button type="button" class="btn btn-success">Approve</button></a>
      <a href="{{route('AMLCwork.STdisapprove',[$worker,$item->reference])}}"><button type="button" class="btn btn-danger">Disapprove</button></a>
      <a href="{{route('AMLCwork.STfound',[$worker,$item->reference])}}"><button type="button" class="btn btn-warning">Found in stock</button></a>
      @elseif($item->AMLC_approval == "True") 
      <p>Approved</p>
      @elseif(($item->AMLC_approval == "False") )
      <p>Disapproved</p> 
      @endif
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>


@endsection