@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('PRformContent')

<br>
<table class="dates" border=1><tr>
  <td>
  Project name:     <input type="text" name="project_name" style="width:71%;"  placeholder=".....................">
  </td>
  <td >
  Project code:   <input type="text" name="project_code" style="width:71%;" placeholder=".....................">
  </td></tr><tr>
  <td >
  Division name:  <input type="text" name="division_name" style="width:69%;" placeholder=".....................">
  </td>
  <td>
  Date: {{$date}}
  </td></tr>
  <tr>
  <td >
  Cost center:   <input type="text" name="cost_center" style="width:75%;" placeholder=".....................">
  </td>
  <td>
  Reference: <input type="text" name="reference" style="width:77%;" placeholder=".....................">
  </td>
  </tr>
</table>
<br>
<br>
<br>


<form  method="post" action="">
@csrf


    <table border=1 align="center" style="margin-right:600px;">
      <tr style="background-color:#b4cfec;">
            <th>NO</th><th>DESCRIPTION</th><th>QUANTITY</th><th>UNIT</th><th>Specific requirement/Drawing N°/Ref</th> <th>GETS / CLIENT REQUEST</th>
        </tr>
        <!-- Add more rows as needed -->
        @for ($i = 1; $i <= 34; $i++)
        <tr>
            <td>{{$i}}</td>
            <td><input type="text" name="{{'DESCRIPTION'.$i}}"></td>
            <td><input type="text" name="{{'QUANTITY'.$i}}"></td>
            <td><input type="text" name="{{'UNIT'.$i}}"></td>
            <td><input type="text" name="{{'SRDR'.$i}}"></td>
            <td><input type="text" name="{{'GCR'.$i}}"></td>
        </tr>
    @endfor
    <tr>
        <td colspan=6 style="background-color:#b4cfec;">Explanation (regarding the reasons of the request etc. )</td>
    </tr>
    <tr>
    <td colspan=6><textarea name="" id="" cols="130" rows="5"></textarea></td>
    </tr>
    <tr>
        <td>
        </td>
        <td style="background-color:#b4cfec;">Requested by</td>
        <td style="background-color:#b4cfec;">Direct Supervisor</td>
        <td style="background-color:#b4cfec;">Head of Department Approval</td>
        <td colspan=2 style="background-color:#b4cfec;">Board Of Director Approval</td>
    </tr>
    <tr>
        <td>Name:
        </td>
        <td align ="center"> {{$name}}</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
    </tr>
    <tr style="background-color:#b4cfec;">
        <td>Position:
        </td>
        <td align ="center"> {{$rank}}</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
        <td align ="center">Executive Director</td>
        <td align ="center">Executive Director</td>
    </tr>
    <td>Signature:
        </td>
        <td align ="center"> Signed</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
    </tr>
    <tr border=0>
    <td colspan=6  align="center" ><input type="submit" class="btn btn-primary mt-2 mb-2"></td>
</form>



<style>
    form {
  max-width: 900px;
  margin: auto;
}



table {
  width:100%;
}

.dates{
  max-width:700px;
  margin:auto;
  width : 100%;
  float:center;
}
</style>

@endsection