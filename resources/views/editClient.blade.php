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
        <form action="{{ route('updateClient', $client->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="clientName">Client Name:</label>
                <input type="clientName" class="form-control" id="clientName" placeholder="Enter Client Name"
                    name="clientName" value="{{ $client->clientName }}">
                <p style="color: #f61717">
                    @error('clientName')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="phone">Client Phone:</label>
                <input type="phone" class="form-control" id="phone" placeholder="Enter Phone" name="phone"
                    value="{{ $client->phone }}">
                <p style="color: #f61717">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="email">Client Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                    value="{{ $client->email }}">
                <p style="color: #f61717">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="website">Client Website:</label>
                <input type="website" class="form-control" id="website" placeholder="Enter Website" name="website"
                    value="{{ $client->website }}">
                <p style="color: #f61717">
                    @error('website')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="city">City:</label><br>
                <select name="city" id="city" class="form-control">
                    <option value="Cairo" {{ $client->city == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                    <option value="Giza" {{ $client->city == 'Giza' ? 'selected' : '' }}>Giza</option>
                    <option value="Alex" {{ $client->city == 'Alex' ? 'selected' : '' }}>Alex</option>
                </select>
            </div>
            <div class="checkbox">
                <label> <input type="checkbox" id="active" name="active"
                        {{ $client->active ? 'checked' : '' }}><strong>Active:</strong></label>
            </div>

            <div class="form-group">
                <label for="image">Image:</label><br>
                <input type="file" id="image" name="image" class="form-control"><br>
                <p style="color: rgb(247, 17, 17)">
                    @error('image')
                        {{ $message }}
                    @enderror
                </p>
                <img src="{{ asset('assets/images/' . $client->image) }}" alt="{{ $client->clientName }}"
                    style='width:200px'>
            </div>
            <input type='hidden' name='oldImage' value="{{ $client->image }}">
            <button type='submit' class='btn btn-primary'>Update</button>
        </form>
    </div>

</body>

</html>
