@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('AMLCitConfirmedContent')


<h1 align="center" style="margin-top: 30px;">IT Confirm requests purchase</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">type</th>
      <th scope="col">Rrquest date</th>
      <th scope="col">DH approval date</th>
      <th scope="col">Approval</th>
      <th scope="col">Confirm</th>
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
    <p>
        @if($item->AMLC_approval=='True')
        <p style="color:lime">Approved</p>
        @else
        <p style="color:red">Dispproved</p>
        @endif
    </p>
</div>
</td>
<td>
    <a href="{{route('AMLCwork.AMLCITbought',[$worker,$item->reference])}}"><button type="button" class="btn btn-success">Bought</button></a>
    
</td>
    </tr>
   @endforeach
  </tbody>
</table>


@endsection