<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{ 
    LaravelLocalization::getCurrentLocaleDirection() }}">
    
<head>
    <title>Clients</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.clientNav');
    <div class="container">
        <h2> {{ __('messages.client_data') }} </h2>
        @include('includes.alertSuccess')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('messages.client_name') }}</th>
                    <th>{{ __('messages.phone') }}</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Active</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Show</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $client->clientName }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->website }}</td>
                    <td>{{ $client->active ? 'Yes' : 'No' }}</td>
                    <td>{{ $client->image }}</td>
                    <td><a href="editClient/{{ $client->id }}" onclick="return confirm('Are you sure you want to update this client?')">Edit</a></td>
                    <td><a href="showClient/{{ $client->id }}">Show</a></td>
                    <td>
                        <form action="{{ route('deleteClient') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $client->id }}">
                            <input type="submit" value="Delete"  onclick="return confirm('Are you sure you want to delete this client?')">
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>