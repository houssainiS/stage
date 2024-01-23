@extends('layouts.BODLayout')
@section('title')BOD @endsection
@section('BODrequestContent')




@if (session('showAlert'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@if (session('showalert'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif



<div class="container">
  <div class="main-buttons">
    <button class="order-button">Order</button>
    <button class="history-button">history</button>
  </div>
  <div class="hidden-buttons">
    <a href="{{route('AMLCITrequest.order',$worker)}}" class="custom-button">IT</a>
    <a href="{{route('AMLCSTrequest.order',$worker)}}" class="custom-button">Stationary</a>
  </div>
  <div class="hidden-buttons2">
    <a href="{{route('AMLCIThistory',$worker)}}" class="custom-button">IT</a>
    <a href="{{route('AMLCSThistory',$worker)}}" class="custom-button">Stationary</a>
    <a href="{{route('AMLCHistory',$worker)}}" class="custom-button">ALL</a>
  </div>
</div>



<style>
    .container {
  display: flex;
  flex-direction: column; /* Arrange elements vertically */
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.main-buttons {
  display: flex;
  justify-content: space-around;
  width: 200px; /* Adjust width as needed */
}

.order-button,
.history-button {
  /* Your desired styles for both buttons */
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer; /* Indicate clickability */
}

.hidden-buttons {
  display: none; /* Initially hidden */
}

.hidden-buttons .custom-button {
  /* Your desired styles for the hidden link buttons */
  margin-top: 10px; /* Add spacing between buttons */
}
.hidden-buttons .custom-button {
  /* Your desired styles for the hidden link buttons */
  background-color: #007bff; /* Blue */
  border: none;
  color: white;
  margin-left:5px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 10px; /* Add spacing between buttons */
  cursor: pointer; /* Indicate clickability */
  border-radius: 5px; /* Rounded corners */
}
.hidden-buttons2 {
  display: none; /* Initially hidden */
}

.hidden-buttons2 .custom-button {
  /* Your desired styles for the hidden link buttons */
  margin-top: 10px; /* Add spacing between buttons */
}
.hidden-buttons2 .custom-button {
  /* Your desired styles for the hidden link buttons */
  background-color: #007bff; /* Blue */
  border: none;
  color: white;
  margin-left:5px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 10px; /* Add spacing between buttons */
  cursor: pointer; /* Indicate clickability */
  border-radius: 5px; /* Rounded corners */
}
</style>


<script>
    const orderButton = document.querySelector('.order-button');
const hiddenButtons = document.querySelector('.hidden-buttons');
const historyButton = document.querySelector('.history-button');
const hiddenButtons2 = document.querySelector('.hidden-buttons2');
orderButton.addEventListener('click', () => {
  hiddenButtons.style.display = 'flex'; /* Show the hidden buttons */
  historyButton.style.display = 'none'; /* Hide the History button */
});
historyButton.addEventListener('click', () => {
  hiddenButtons2.style.display = 'flex'; /* Show the hidden buttons */
  orderButton.style.display = 'none'; /* Hide the History button */
});
</script>

@endsection

