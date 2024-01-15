@if (session('showAlert'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif


@extends('layouts.wlrLayout')
@section('title')register @endsection
@section('registerContent')
    <div class="container">
        <h1 class="text-center">Register</h1>
        <div class="col-md-6 offset-md-3">
            <form action="{{route('register.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age">
                </div>
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <select class="form-control" id="department" name="department">
                        <option value="IT">IT Department</option>
                        <option value="Stationery">Stationery Department</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="rank">Rank:</label>
                    <select class="form-control" id="rank" name="rank">
                        <option value="1">Rank 1</option>
                        <option value="2">Rank 2</option>
                        <option value="3">Rank 3</option>
                        <option value="4">Rank 4</option>
                        <option value="5">Rank 5</option>
                        <option value="6">Rank 6</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="rank_code">Rank Code:</label>
                    <input type="text" class="form-control" id="rank_code" name="rank_code">
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection
