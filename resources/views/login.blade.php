@extends('layouts.wlrLayout')
@section('title')login @endsection
@section('loginContent')

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
        <h1 class="text-center">Login</h1>
        <div class="col-md-6 offset-md-3">
            <form action="{{route('login.test')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="rank">Rank:</label>
                    <select class="form-control" id="rank" name="rank">
                        <option value="Worker">Worker</option>
                        <option value="Department head">Department head</option>
                        <option value="DAF">Director of administration and finance (DAF)</option>
                        <option value="Asset managment and logistic coordinator">Asset managment and logistic coordinator</option>
                        <option value="BOD">Board of directors (BOD)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

@endsection