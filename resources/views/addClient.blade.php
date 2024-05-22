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
        <form action="{{ route('insertClient') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="clientName">Client Name:</label>
                <input type="clientName" class="form-control" id="clientName" placeholder="Enter Client Name"
                    name="clientName" value="{{ old('clientName') }}">
                <p style="color: rgb(247, 17, 17)">
                    @error('clientName')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="phone">Client Phone:</label>
                <input type="phone" class="form-control" id="phone" placeholder="Enter Phone" name="phone"
                    value="{{ old('phone') }}">
                <p style="color: #f61717">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="email">Client Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                    value="{{ old('email') }}">
                <p style="color: rgb(247, 17, 17)">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>

            </div>
            <div class="form-group">
                <label for="website">Client Website:</label>
                <input type="website" class="form-control" id="website" placeholder="Enter Website" name="website"
                    value="{{ old('website') }}">
                <p style="color: rgb(247, 17, 17)">
                    @error('website')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="city">City:</label><br>
                <select name="city" id="city" class="form-control">
                    <option value="">Please Select City</option>
                    <option value="Cairo"  {{ old('city') == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                    <option value="Giza"  {{ old('city') == 'Giza' ? 'selected' : '' }}>Giza</option>
                    <option value="Alex"   {{ old('city') == 'Alex' ? 'selected' : '' }}>Alex</option>
                </select>
                <p style="color: rgb(247, 17, 17)">
                    @error('city')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="checkbox">
                <label> <input type="checkbox" id="active" name="active" {{ old('active') ? 'checked' : '' }}><strong>Active:</strong></label>
            </div>

            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image" class="form-control"><br>
            <p style="color: rgb(247, 17, 17)">
                @error('image')
                    {{ $message }}
                @enderror
            </p>

           <div class="form-group">
            <button type='submit' class='btn btn-primary'>Submit</button>
        </div>
        </form>
    </div>
</body>

</html>
