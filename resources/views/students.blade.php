<!DOCTYPE html>
<html lang="en">

<head>
    <title>Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.studentNav');
    <div class="container">
        <h2>Students</h2>
        @include('includes.alertSuccess');
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>age</th>
                    <th>Edit</th>
                    <th>Show</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->studentName }}</td>
                    <td>{{ $student->age }}</td>
                    <td><a href="editStudent/{{ $student->id }}" onclick="return confirm('Are you sure you want to update this student?')">Edit</a></td>
                    <td><a href="showStudent/{{ $student->id }}">Show</a></td>
                    <td>
                        <form action="{{ route('deleteStudent') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <input type="submit" value="Delete"  onclick="return confirm('Are you sure you want to delete this student?')">
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>