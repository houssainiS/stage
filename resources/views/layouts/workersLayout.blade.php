<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>
<body>
<header>
  <a href="{{route('welcome')}}" class="welcome">Welcome!</a>
  <nav>
    <ul>
      <li><a href="#">request</a></li>
      <li><a href="#">about me</a></li>
      <li><a href="#">logout</a></li>
    </ul>
  </nav>
</header>

    

@yield('workerContent')





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<style>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #eee;
  padding: 1em;
}

.welcome {
  font-size: 1.5em;
  font-weight: bold;
  color: #333;
  text-decoration: none;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  padding: 0.5em;
}

nav li a {
  text-decoration: none;
  color: #333;
}

nav li a:hover {
  color: #666;
}
</style>

</body>
</html>
</html>