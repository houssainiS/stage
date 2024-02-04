@extends('layouts.BODLayout')
@section('title') BOD @endsection
@section('BODworkContent')

<style>
    .button-container {
        text-align: center;
        margin-bottom: 20px; /* Add margin between button containers */
    }

    .button {
        padding: 10px 20px;
        font-size: 16px;
        margin: 10px 20px; /* Adjust margin for better spacing */
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .button:hover {
        background-color: #2980b9;
    }

    /* Style for the first button container */
    .button-container-first {
        margin-top: 270px; /* Adjust the margin-top for the first container */
    }

    /* Style for the second button container */
    .button-container-second {
        margin-top: 10px; /* Adjust the margin-top for the second container */
    }
</style>

<div class="button-container button-container-first">
    <a href="{{route('BODwork.PRapprove',$worker)}}"><button class="button">Approve PR</button></a>
    <a href="{{route('BODwork.approvedPR',$worker)}}"><button class="button">PR approved</button></a>
</div>

<div class="button-container button-container-second">
    <!-- New buttons -->
    <a href="#"><button class="button">Approve PR Quotation</button></a>
    <a href="#"><button class="button">PR Quotation approved</button></a>
</div>

@endsection