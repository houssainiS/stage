@extends('layouts.workersLayout')
@section('title')request @endsection
@section('workerRequestContent')

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

<div class="container">
  <div class="main-buttons">
    <button class="order-button">Order</button>
    <a href="#" class="history-button">History</a>
  </div>
  <div class="hidden-buttons">
    <a href="#" class="custom-button">IT</a>
    <a href="#" class="custom-button">Stationary</a>
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

</style>


<script>
    const orderButton = document.querySelector('.order-button');
const hiddenButtons = document.querySelector('.hidden-buttons');
const historyButton = document.querySelector('.history-button');

orderButton.addEventListener('click', () => {
  hiddenButtons.style.display = 'flex'; /* Show the hidden buttons */
  historyButton.style.display = 'none'; /* Hide the History button */
});

</script>


@endsection