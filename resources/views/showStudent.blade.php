<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Show {{ $student->studentName }} </title>
</head>

<body>

  @include('includes.studentNav');
  <h2><strong>Student Name: </strong>{{ $student->studentName }}</h2>
  <hr>
  <h3><strong>Student Age: </strong>{{ $student->age }}</h3>
  <hr>
    
      

</body>

</html>