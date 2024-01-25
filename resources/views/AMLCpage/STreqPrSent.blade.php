@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('AMLCstPrSent')


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
      <th scope="col">AMLC approval date</th>
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
      <td>{{$item->AMLC_approval_date}}</td>
      <td>
    <p>Sent !</p>
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>


@endsection