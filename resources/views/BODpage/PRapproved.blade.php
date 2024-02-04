@extends('layouts.BODLayout')
@section('title') BOD @endsection
@section('BODapprovedContent')

<h1 align="center" style="margin-top: 30px;">Approved Purchase requisition</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">Description</th>
      <th scope="col">Rrquest date</th>
      <th scope="col">DAF approval date</th>
      <th scope="col">Approval</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
  @if(($item->BOD1_signature == "True" && $item->BOD1 == $worker)|| ($item->BOD2_signature == "True" && $item->BOD2 == $worker)|| $item->BOD1_signature == "False" || $item->BOD2_signature == "False")
    <tr>
      <th scope="row">{{$item->PR_id}}</th>
      <td><a href="{{route('BODwork.onePr',[$worker,$item->PR_id])}}" class="">{{ substr($item->project_name, 0, 40) }}</a></td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->DAF_approval_date}}</td>
      <td>
    @if($item->BOD1_signature == "True" && $item->BOD1 == $worker && $item->BOD2_signature == "none") 
      <p>Waiting other BOD approval</p>
      @elseif(($item->BOD1_signature == "False" || $item->BOD2_signature == "False" ) )
      <p style="color:red;">Disapproved</p> 
      @elseif($item->BOD1_signature == "True" && $item->BOD2_signature == "True")
      <p style="color:lime;">Approved</p>
      
      @endif
    @endif
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>


@endsection
