@extends('layouts.DAFLayout')
@section('title') DAF @endsection
@section('DAFoneRContent')

<table class="dates" border=1><tr>
  <td>
  Project name: {{$data[0]->project_name}}  
  </td>
  <td >
  Project code: {{$data[0]->project_code}}   
  </td></tr><tr>
  <td >
  Division name: {{$data[0]->division_name}}  
  </td>
  <td>
  Date: {{$data[0]->created_at}}
  </td></tr>
  <tr>
  <td >
  Cost center: {{$data[0]->cost_center}}  
  </td>
  <td>
  Reference:  {{$data[0]->PR_reference}}
  </td>
  </tr>
</table>
<br>
<br>
<br>




    <table border=1 align="center" style="margin-right:600px;">
      <tr style="background-color:#b4cfec;">
            <th>NO</th><th>DESCRIPTION</th><th>QUANTITY</th><th>UNIT</th><th>Specific requirement/Drawing N°/Ref</th> <th>GETS / CLIENT REQUEST</th>
        </tr>
        <!-- Add more rows as needed -->
        @for ($i = 1; $i <= 34; $i++)
    @if (isset($data[$i]))
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $data[$i]->description }}</td>
            <td>{{ $data[$i]->quantity }}</td>
            <td>{{ $data[$i]->unit }}</td>
            <td>{{ $data[$i]->SRDR }}</td>
            <td>{{ $data[$i]->GCR }}</td>
        </tr>
    @else
        {{-- Stop the loop if the key is not defined --}}
        @break
    @endif
@endfor

    <tr>
        <td colspan=6 style="background-color:#b4cfec;">Explanation (regarding the reasons of the request etc. )</td>
    </tr>
    <tr>
    <td colspan=6>{{$data[0]->explanation}}</td>
    </tr>
    <tr>
        <td>
        </td>
        <td style="background-color:#b4cfec;" align ="center">Requested by</td>
        <td style="background-color:#b4cfec;" align ="center">Direct Supervisor</td>
        <td style="background-color:#b4cfec;" align ="center">Head of Department Approval</td>
        <td colspan=2 style="background-color:#b4cfec;" align="center">Board Of Director Approval</td>
    </tr>
    <tr>
        <td>Name:
        </td>
        <td align ="center"> {{$user2->name}}</td>
        <td align ="center">anyone</td>
        <td align ="center">anyone</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
    </tr>
    <tr style="background-color:#b4cfec;">
        <td>Position:
        </td>
        <td align ="center">{{$user->rank}} </td>
        <td align ="center">Direct Supervisor</td>
        <td align ="center">Head of Department</td>
        <td align ="center">Executive Director</td>
        <td align ="center">Executive Director</td>
    </tr>
    <td>Signature:
        </td>
        <td align ="center"> Signed</td>
        <td align ="center">signed</td>
        <td align ="center">signed</td>
        <td align ="center">waiting</td>
        <td align ="center">waiting</td>
    </tr>
</table>



    
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