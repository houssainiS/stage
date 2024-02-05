@extends('layouts.DHLayout')
@section('title')History @endsection
@section('DHhistoryContent')




<h1 align="center" style="margin-top: 30px;">Stationery Requests History</h1>
<p>Number of requests: {{$requests_number}}</p>
<table class="table mt-5">

  <thead>
    <tr>
      <th scope="col">Reference</th>
      <th scope="col">description</th>
      <th scope="col">type</th>
      <th scope="col">date</th>
      <th scope="col">DH approval</th>
      <th scope="col">Finished or not</th>
      <th scope="col">Duration</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->reference}}</th>
      <td><a href="{{route('DHrequestall.history',[$worker,$item->reference])}}" class="">{{ substr($item->description1, 0, 40) }}</a></td>
      <td>{{$item->IT_ST}}</td>
      <td>{{$item->created_at}}</td>
      <td>@if($item->DH_approval == "True") 
      <p style="color:lime">Approved</p>
      @elseif(($item->DH_approval == "False") )
      <p style="color:red">Disapproved</p> </td>
      @else
      <p>waiting</p>
      @endif</td>
      <td>@if($item->AMLC_bought == "True")
        <p style="color:lime">Done !</p>
        @else
        not yet!
        @endif
      </td>
      <td>
        @if(isset($item->AMLC_bought_date))
        @php
// Create DateTime instances from the date strings
$AMLC_bought_date = new DateTime($item->AMLC_bought_date);
$created_at = new DateTime($item->created_at);

// Get the interval between the two dates
$interval = $AMLC_bought_date->diff($created_at);

// Calculate total hours (including days)
$totalHours = $interval->days * 24 + $interval->h;

// Loop through each day and subtract if it is a weekend
for ($i = 0; $i < $interval->days; $i++) {
    // Modify the date by adding one day
    $AMLC_bought_date->modify('+1 day');
    // Get the day of the week as a number (0 for Sunday, 6 for Saturday)
    $dayOfWeek = $AMLC_bought_date->format('w');
    // Subtract 24 hours if it is a weekend
    if ($dayOfWeek == 0 || $dayOfWeek == 6) {
        $totalHours -= 24;
    }
}

// Display the duration in the view blade
echo "$totalHours hours";
@endphp

@endif
</td>
    </tr>
   @endforeach
  </tbody>
</table>





@endsection