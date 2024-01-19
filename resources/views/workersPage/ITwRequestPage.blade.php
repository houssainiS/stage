@extends('layouts.workersLayout')
@section('title')request @endsection
@section('ITwRequestPageContent')

<header>


  <a href="{{route('goWorker',$worker)}}" class="welcome">Welcome!</a>
  <nav>
    <ul>
      <li><a href="{{route('request',$worker)}}">request</a></li>
      <li><a href="{{route('aboutme',$worker)}}">about me</a></li>
      <li><a href="{{route('welcome')}}">logout</a></li>
    </ul>
  </nav>
</header>


<br>
<table class="dates" border=1><tr>
  <td>
    Reference:
  </td>
  <td>
    !!!!
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


<form  method="post" action="{{route('ITrequestStore.store',$worker)}}">
@csrf
<h2 class="test" align="center">TO / IT DPT</h2>
    <!-- Add more fields as needed -->

    <table border=1>
      <tr>
        <th colspan=3>
        <label for="name">Full Name: {{$name}} {{$lastname}}</label><br>

    <label for="id">ID N°: {{$id}}</label><br>

    <label for="position">Position: {{$rank}}</label><br>

    <label for="dpt">DPT: {{$department}}</label><br>
        </th></td>
        <tr>
            <th>DESCRIPTION:</th><th>QUANTITY:</th><th>REMARKS:</th>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
            <td>
              <textarea name="description1" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="quantity1" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="remarks1" id="" cols="30" rows="5"></textarea>
            </td>
        </tr> 
        <tr>
            <td>
              <textarea name="description2" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="quantity2" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="remarks2" id="" cols="30" rows="5"></textarea>
            </td>
        </tr> 
        <tr>
            <td>
              <textarea name="description3" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="quantity3" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="remarks3" id="" cols="30" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td>
              <textarea name="description4" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="quantity4" id="" cols="30" rows="5"></textarea>
            </td>
            <td>
            <textarea name="quantity4" id="" cols="30" rows="5"></textarea>
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
        <label for="image-upload">Upload Signature:</label>
  <input type="file" id="image-upload" name="signature">
        </td>
        <td align="center">
        waiting
        </td>
      </tr>
     </table>
     <br>
     <!-- Submit Button -->
     <center><button type="submit" class="btn btn-primary">Submit Request</button> </center>
     
</form>



<style>
    form {
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