@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('AMLCContent')

<style>
    .welcome-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh; /* 100% of the viewport height */
      background-color: #f4f4f4; /* Optional background color */
    }

    .welcome-text {
      font-size: 3em; /* Adjust the font size as needed */
      text-align: center;
      color: #333; /* Text color */
    }
  </style>

<div class="welcome-container">
    <h1 class="welcome-text">Welcome!</h1>
  </div>

@endsection