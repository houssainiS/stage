@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('AMLCPrApprovedContent')




<h1 align="center" style="margin-top: 30px;">Approved Stationery Requests</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">Rrquest date</th>
      <th scope="col">approval</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->PR_id}}</th>
      <td><a href="{{route('AMLCwork.onePr',[$worker,$item->PR_id])}}" class="">{{ substr($item->project_name, 0, 40) }}</a></td>
      <td>{{$item->created_at}}</td>
      <td>
    @if($item->BOD1_signature == 'True' && $item->BOD2_signature == 'True')
      <p style="color:lime;">Approved</p>
    @elseif($item->BOD1_signature == 'False' || $item->BOD2_signature == 'False')
    <p style="color:red;">Disapproved</p>
    @else
    <p>Waiting for approval</p>
    @endif
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>



@endsection