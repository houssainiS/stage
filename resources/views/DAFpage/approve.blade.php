@extends('layouts.DAFLayout')
@section('title') DAF @endsection
@section('DAFapproveContent')

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
    <tr>
      <th scope="row">{{$item->PR_id}}</th>
      <td><a href="" class="">{{ substr($item->project_name, 0, 40) }}</a></td>
      <td>{{$item->created_at}}</td>
      <td>
    @if($item->DAF_approval == "none")  
      <div style="display:inline;">
      <a href=""><button type="button" class="btn btn-success">Approve</button></a>
      <a href=""><button type="button" class="btn btn-danger">Disapprove</button></a>
      @elseif($item->DAF_approval == "True") 
      <p>Approved</p>
      @elseif(($item->DAF_approval == "False") )
      <p>Disapproved</p> 
      @else 
      hi
      @endif
</div>
</td>
    </tr>
   @endforeach
  </tbody>
</table>


@endsection
