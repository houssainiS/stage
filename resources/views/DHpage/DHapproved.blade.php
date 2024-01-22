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
      <th scope="col">approval Date</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
    @if($item->DH_approval == "True" || $item->DH_approval == "False")
      <th scope="row">{{$item->reference}}</th>
      <td><a href="{{route('DHrequest.history',[$worker,$item->reference])}}" class="">{{$item->description1}}</a></td>
      <td>{{$item->IT_ST}}</td>
      <td>{{$item->created_at}}</td>
      <td>
      @if($item->DH_approval == "True") 
      <p style="color:lime">Approved</p>
      @elseif(($item->DH_approval == "False") )
      <p style="color:red">Disapproved</p> 
      </div>
</td>
      @endif
      <td>
        {{$item->DH_approval_date}}
      </td>
      @endif

    </tr>
   @endforeach
  </tbody>
</table>



@endsection