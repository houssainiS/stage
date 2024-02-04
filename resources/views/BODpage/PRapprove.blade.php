@extends('layouts.BODLayout')
@section('title') BOD @endsection
@section('BODapproveContent')


<h1 align="center" style="margin-top: 30px;">Purchase requisition waiting for approval</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">Request date</th>
      <th scope="col">DAF approval date</th>
      <th scope="col">approval</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
  @if($item->BOD1_signature == "none" || ($item->BOD1_signature == "True" && $item->BOD1 != $worker && $item->BOD2_signature == "none")  )
    <tr>
      <th scope="row">{{$item->PR_id}}</th>
      <td><a href="{{route('BODwork.onePr',[$worker,$item->PR_id])}}" class="">{{ substr($item->project_name, 0, 40) }}</a></td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->DAF_approval_date}}</td>
      <td>
    @if($item->BOD1_signature == "none")  
      <div style="display:inline;">
      <a href="{{route('BODwork.approvePR',[$worker,$item->id])}}"><button type="button" class="btn btn-success">Approve</button></a>
      <a href="{{route('BODwork.disapprovePR',[$worker,$item->id])}}"><button type="button" class="btn btn-danger">Disapprove</button></a>
      @elseif($item->BOD1_signature == "True" && $item->BOD1 == $worker) 
      <p>Waiting other BOD approval</p>
      @elseif($item->BOD1_signature == "True" && $item->BOD1 != $worker)
      <a href="{{route('BODwork.approvePR',[$worker,$item->id])}}"><button type="button" class="btn btn-success">Approve</button></a>
      <a href="{{route('BODwork.disapprovePR',[$worker,$item->id])}}"><button type="button" class="btn btn-danger">Disapprove</button></a>
      @elseif(($item->BOD1_signature == "False" || $item->BOD2_signature == "False" ) )
      <p>Disapproved</p> 
      @elseif($item->BOD1_signature == "True" && $item->BOD2_signature == "True")
      <p>Approved</p>
      
      @endif
  @endif
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>


@endsection