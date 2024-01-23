@extends('layouts.AMLCLayout')
@section('title')AMLC @endsection
@section('AMLCapprovalContent')

<style>
          /* Style for the container holding the buttons on the left */
          .left-container {
            width: 200px; /* Adjust width as needed */
            margin: 100px 30px 20px 200px; /* Top, Right, Bottom, Left */
            float: left;
        }

        /* Style for the container holding the buttons on the right */
        .right-container {
            width: 200px; /* Adjust width as needed */
            margin: 100px 200px 20px 30px; /* Top, Right, Bottom, Left */
            float: right;
        }

        /* Style for each button */
        .button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff; /* Adjust color as needed */
            border: 1px solid #007bff; /* Adjust color as needed */
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for buttons */
        .button:hover {
            background-color: #0056b3; /* Adjust color as needed */
            color:white;
        }
    </style>


    <div class="left-container">
        <h3 align ="center">IT</h3>
        <a href="#" class="button">Approved from BOD</a>
        <a href="#" class="button">Searched for suppliers</a>
        <a href="#" class="button">sent to BOD</a>
        <a href="#" class="button">Confirm the order</a>
    </div>

    <div class="right-container">
        <h3 align ="center">Stationary</h3>
        <a href="#" class="button">requests</a>
        <a href="#" class="button">requests searched in the stock</a>
        <a href="#" class="button">Purchase requisition sent</a>
        <a href="#" class="button">searching for item</a>
        <a href="#" class="button">PRICE+PR sent to BOD</a>
        <a href="#" class="button">Confirmed to supplier</a>
        <a href="#" class="button">Ensure the Payment</a>
    </div>

@endsection