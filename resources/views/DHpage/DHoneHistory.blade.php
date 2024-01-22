@extends('layouts.DHLayout')
@section('title')aboutme @endsection
@section('DHoneHistoryContent')





<br>
<table class="dates" border=1><tr>
  <td>
    Reference:
  </td>
  <td>
    {{$order->reference}}
  </td></tr><tr>
    <td>
    Date:
  </td>
  <td>
{{$date}}
  </td></tr>
</table>
<br>
<br>
<br>

<h2 class="test" align="center">TO / {{$order->IT_ST}} DPT</h2>
    <!-- Add more fields as needed -->

    <table border=1>
      <tr>
        <th colspan=3>
        <label for="name">Full Name: {{$name}} {{$lastname}}</label><br>

    <label for="id">ID N°: {{$id}}</label><br>

    <label for="position">Position: {{$rank}}</label><br>

    <label for="dpt">DPT:{{$department}} department</label><br>
        </th></td>
        <tr>
            <th>DESCRIPTION:</th><th>QUANTITY:</th><th>REMARKS:</th>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
            <td>
           {{$order->description1}}
            </td>
            <td>
           {{$order->quantity1}}
            </td>
            <td>
            {{$order->remarks1}}
            </td>
        </tr> 
        <tr>
            <td>
              {{$order->description2}}
            </td>
            <td>
           {{$order->quantity2}}
            </td>
            <td>
         {{$order->remarks2}}
            </td>
        </tr> 
        <tr>
            <td>
              {{$order->description3}}
            </td>
            <td>
            {{$order->quantity3}}
            </td>
            <td>
            {{$order->remarks3}}
            </td>
        </tr>
        <tr>
            <td>
             {{$order->description4}}
            <td>
            {{$order->quantity4}}
            </td>
            <td>
          {{$order->quantity4}}
            </td>
        </tr>  
     </table>
  <br>
     <table border=2>  
      <tr>
        <td>
        Requestor Signature:
        </td>
        <td>
        Head of DPT Signature:
        </td>
      </tr>
      <tr>
        <td align="center">
        <label for="image-upload">Done !</label>
        </td>
        <td align="center">
          @if($order->DH_approval=="none")
          <div style="display:inline;">
      <a href="{{route('DHapprove',[$worker,$order->reference])}}"><button type="button" class="btn btn-success">Approve</button></a>
      <a href="{{route('DHdisapprove',[$worker,$order->reference])}}"><button type="button" class="btn btn-danger">Disapprove</button></a>
      @elseif($order->DH_approval == "True") 
      <p>Approved</p>
      @elseif(($order->DH_approval == "False") )
      <p>Disapproved</p> 
      @endif
        </td>
      </tr>
     </table>
     <br>


     <style>
    table {
  max-width: 600px;
  margin: auto;
}

label, input {
  display: block;
  margin-bottom: 5px;
}

table {
  width:100%;
}

.dates{
  max-width:300px;
  margin:auto;
  width : 100%;
  float:right;
}
</style>


@endsection