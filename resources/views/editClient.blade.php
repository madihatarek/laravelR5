<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  @include('includes.clientNav');
    <div class="container">
        <h2>Edit Client</h2>
        <form action="{{ route('updateClient', $client->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="clientName">Client Name:</label>
                <input type="clientName" class="form-control" id="clientName"  placeholder="Enter Client Name"
                    name="clientName" value="{{ $client->clientName }}">
                    <p style="color: #f61717">
                        @error('clientName')
                            {{ $message }}
                        @enderror
                        </p>
            </div>
            <div class="form-group">
                <label for="phone">Client Phone:</label>
                <input type="phone" class="form-control" id="phone"  placeholder="Enter Phone" name="phone"
                value="{{ $client->phone }}" >
                <p style="color: #f61717">
                    @error('phone')
                        {{ $message }}
                    @enderror
                    </p>
            </div>
            <div class="form-group">
                <label for="email">Client Email:</label>
                <input type="email" class="form-control" id="email"  placeholder="Enter Email" name="email"
                value="{{ $client->email }}">
                <p style="color: #f61717">
                    @error('email')
                        {{ $message }}
                    @enderror
                    </p>
            </div>
            <div class="form-group">
                <label for="website">Client Website:</label>
                <input type="website" class="form-control" id="website"  placeholder="Enter Website" name="website"
                value="{{ $client->website }}">
                <p style="color: #f61717">
                    @error('website')
                        {{ $message }}
                    @enderror
                    </p>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>