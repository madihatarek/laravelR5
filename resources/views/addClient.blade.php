<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  @include('includes.clientNav');
    <div class="container">
        <h2>Insert Client</h2>
        <form action="{{ route('insertClient') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="clientName">Client Name:</label>
                <input type="clientName" class="form-control" id="clientName" placeholder="Enter Client Name"
                    name="clientName">
            </div>
            <div class="form-group">
                <label for="phone">Client Phone:</label>
                <input type="phone" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
            </div>
            <div class="form-group">
                <label for="email">Client Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
                <label for="website">Client Website:</label>
                <input type="website" class="form-control" id="website" placeholder="Enter Website" name="website">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>