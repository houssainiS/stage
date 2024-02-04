@extends('layouts.BODLayout')
@section('title')BOD @endsection
@section('BODApprovedQContent')




<h1 align="center" style="margin-top: 30px;">Approved Stationery Requests</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">Rrquest date</th>
      <th scope="col">Quotation</th>
      <th scope="col">Approval</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    @if($item->QBOD1==$worker || $item->QBOD2==$worker)
    <tr>
      <th scope="row">{{$item->PR_id}}</th>
      <td><a href="{{route('AMLCwork.onePr',[$worker,$item->PR_id])}}" class="">{{ substr($item->project_name, 0, 40) }}</a></td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->quotation}}</td>
      <td>
    @if($item->quotation_approval1 == 'True' && $item->quotation_approval2 == 'True')
      <p style="color:lime;">Approved</p>
    @elseif($item->quotation_approval1 == 'False' || $item->quotation_approval2 == 'False')
    <p style="color:red;">Disapproved</p>
    @else
    <p>Waiting for other BOD approval</p>
    @endif
</div>
</td>
    </tr>
    @endif
   @endforeach
  </tbody>
</table>



@endsection