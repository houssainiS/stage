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
      <th scope="col">Quotation</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->PR_id}}</th>
      <td><a href="{{route('AMLCwork.onePr',[$worker,$item->PR_id])}}" class="">{{ substr($item->project_name, 0, 40) }}</a></td>
      <td>{{$item->created_at}}</td>

<td>
    <form method="post" action="{{route('AMLCwork.sendQstore',[$worker,$item->PR_id])}}" >
        @csrf
        @method('put')
        <div class="input-group ">
  <span class="input-group-text">DT</span>
    <input style="width:200px" type="number" name="price" class="form-control">
  <span class="input-group-text">.000</span>
  <button type="submit" class="btn btn-primary ml-1">Send</button>
</div>

    </form>

</td>
    </tr>
   @endforeach
  </tbody>
</table>



@endsection