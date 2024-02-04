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
        .midB{
            margin:100px 600px 20px 600px;
        }
        .mid-button{
            float: center;
            display: block;
            width: 200 px;
            padding: 10px;
            margin-bottom: 10px ; /* Top, Right, Bottom, Left */
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #32cd32; /* Adjust color as needed */
            border: 1px solid lime; /* Adjust color as needed */
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .mid-button:hover {
            background-color: lime; /* Adjust color as needed */
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
        <a href="{{route('AMLCwork.STrequests',$worker)}}" class="button">requests</a>
        <a href="{{route('AMLCwork.STrequestsFoundInStock',$worker)}}" class="button">requests found in the stock</a>
        <a href="{{route('AMLCwork.AMLCSTapproved',$worker)}}" class="button">Approved requests</a>
        <a href="#" class="button">Confirm Purchase</a>
        <a href="#" class="button">Requests bought</a>
    </div>
    <div class="midB">
        <a href="{{route('AMLCwork.PRform',$worker)}}" class="mid-button">Create Purchase requisition</a>
        <a href="{{route('AMLCwork.requestsPrSent',$worker)}}" class="mid-button">Purchases sent</a>
        <a href="{{route('AMLCwork.approvedPR',$worker)}}" class="mid-button">Approved PR</a>
        <a href="{{route('AMLCwork.sendQ',$worker)}}" class="mid-button">Send quotation</a>
        <a href="{{route('AMLCwork.approvedQ',$worker)}}" class="mid-button">Quotation sent</a>
        <a href="{{route('AMLCwork.Qapproved',$worker)}}" class="mid-button">Quotation approved</a>

    </div>
    
@endsection