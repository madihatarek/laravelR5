<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('includes.studentNav');
    <div class="container">
        <h2>Insert Student</h2>
        <form action="{{ route('insertStudent') }}" method= "post">
            @csrf
            <div class="form-group">
                <label for="studentName">Student Name:</label>
                <input type="studentName" class="form-control"  id="studentName" placeholder="Enter Student Name"
                    name="studentName">
                    <p style="color: rgb(247, 17, 17)">
                        @error('studentName')
                            {{ $message }}
                        @enderror
                    </p>
            </div>
            <div class="form-group">
                <label for="age">Student age:</label>
                <input type="age" class="form-control" id="age"  placeholder="Enter age" name="age">
                <p style="color: rgb(247, 17, 17)">
                    @error('age')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>
