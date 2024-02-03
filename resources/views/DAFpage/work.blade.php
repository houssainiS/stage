@extends('layouts.DAFLayout')
@section('title') DAF @endsection
@section('DAFworkContent')

<style>
.button-container {
margin-top:300px;
      text-align: center;
    }

    .button {
      padding: 10px 20px;
      font-size: 16px;
      margin: 10px 20px 10px 20px;

    }

    /* Additional styling for better appearance */
    .button {
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #2980b9;
    }
  </style>

  <div class="button-container">
    <a href="{{route('DAFwork.approve',$worker)}}"><button class="button">Approve PR</button></a>
    <a href=""><button class="button">PR approved</button></a>
  </div>

@endsection