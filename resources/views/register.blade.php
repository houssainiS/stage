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
                        <option value="other">normal worker</option>
                        </select>
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
                <div class="form-group">
                    <label for="rank_code">Rank Code:</label>
                    <input type="text" class="form-control" id="rank_code" name="rank_code">
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>

<script>
   document.getElementById('department').addEventListener('change', function() {
    const selectedDepartment = this.value;
    const rankDiv = document.getElementById('rank').parentElement;
    const rankCodeDiv = document.getElementById('rank_code').parentElement;

    if (selectedDepartment === 'other') {
        rankDiv.style.display = 'none';
        rankCodeDiv.style.display = 'none';
    } else {
        rankDiv.style.display = 'block';
        rankCodeDiv.style.display = 'block';
    }
});

</script>


            </form>
        </div>
    </div>
@endsection

