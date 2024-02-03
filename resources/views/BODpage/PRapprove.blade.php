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
      <th scope="col">Rrquest date</th>
      <th scope="col">approval</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
  @if($item->BOD1_signature == "none")
    <tr>
      <th scope="row">{{$item->PR_id}}</th>
      <td><a href="{{route('BODwork.onePr',[$worker,$item->PR_id])}}" class="">{{ substr($item->project_name, 0, 40) }}</a></td>
      <td>{{$item->created_at}}</td>
      <td>
    @if($item->BOD1_signature == "none")  
      <div style="display:inline;">
      <a href=""><button type="button" class="btn btn-success">Approve</button></a>
      <a href=""><button type="button" class="btn btn-danger">Disapprove</button></a>
      @elseif($item->BOD1_signature == "True") 
      <p>Approved</p>
      @elseif(($item->BOD1_signature == "False") )
      <p>Disapproved</p> 
      @endif
  @endif
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>


@endsection