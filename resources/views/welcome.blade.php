@extends('layouts.wlrLayout')
@section('title')welcome @endsection
@section('welcomeContent')
<style>
.w {
  text-align: center;
  padding: 50px;
}
.button-container {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}
.button {
  padding: 10px 20px;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  cursor: pointer;
  border-radius: 5px;
  margin-right: 10px;
}
.button:hover {
  background-color: #45a049; /* Darker green */
}
</style>
</head>
<body>
  <div class="w">
    <h1>Welcome!</h1>
<div class="button-container">
  <a class="button" href="{{route('login')}}">Login</a>
  <a class="button" href="{{route('register')}}">Register</a>
</div>
  </div>

@endsection