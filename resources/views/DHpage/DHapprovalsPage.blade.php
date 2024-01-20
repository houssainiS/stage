@extends('layouts.DHLayout')
@section('title')History @endsection
@section('DhApproval')

<div class="container">
        <!-- Two buttons -->
      <a href="{{route('waiting',$worker)}}"><button>Waiting to approve</button></a>  
     <a href=""><button>Approved</button></a>   
    </div>
<style>
        /* Center the container using flexbox */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make sure the container takes up the full viewport height */
        }

        /* Style the buttons (you can add more styles as needed) */
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 0 10px;
        }
    </style>
@endsection