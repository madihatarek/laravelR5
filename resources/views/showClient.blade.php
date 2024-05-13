<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Show {{ $client->clientName }} </title>
</head>

<body>

  @include('includes.clientNav');
  <h2><strong>Client Name: </strong>{{ $client->clientName }}</h2>
  <br>
  <h3><strong>Client Phone: </strong>{{ $client->phone }}</h3>
  <br>
  <h3><strong>Client Email: </strong>{{ $client->email }}</h3>
  <br>
  <h3><strong>Client Website: </strong>{{ $client->website }}</h3>
  <br>
    
      

</body>

</html>