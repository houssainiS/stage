@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('AMLConeRequestContent')



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
          @if($order->DH_approval == "True") 
      <p>Approved</p>
      @elseif(($order->DH_approval == "False") )
      <p>Disapproved</p> 
      @else
      <p>waiting</p>
      @endif
        </td>
      </tr>
     </table>
     <br>
     @if($order->AMLC_approval == "none" && $order->AMLC_found =="none") 
     <div class="text-center">
    <div style="display:inline;">
        <a href="{{ route('AMLCwork.STapprove', [$worker, $order->reference]) }}">
            <button type="button" class="btn btn-success mx-auto">Approve</button>
        </a>
        <a href="{{ route('AMLCwork.STdisapprove', [$worker, $order->reference]) }}">
            <button type="button" class="btn btn-danger mx-auto">Disapprove</button>
        </a>
        <a href="{{ route('AMLCwork.STfound', [$worker, $order->reference]) }}">
            <button type="button" class="btn btn-warning mx-auto">Found in stock</button>
        </a>
    </div>
</div>

    @endif
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
