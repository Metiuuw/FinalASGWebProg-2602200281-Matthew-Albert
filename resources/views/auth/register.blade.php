<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Register</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('registered') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="linkedin_username" class="form-label">LinkedIn Username:</label>
                    <input type="text" id="linkedin_username" name="linkedin_username" class="form-control"
                        value="{{ old('linkedin_username') }}" required>
                </div>

                <div class="mb-3">
                    <label for="fields_of_work" class="form-label">Fields of Work:</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Technology">
                        <label class="form-check-label">Art</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Health">
                        <label class="form-check-label">Banking</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Education">
                        <label class="form-check-label">Education</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Finance">
                        <label class="form-check-label">Technology</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Art">
                        <label class="form-check-label">Politics</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number:</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control"
                        value="{{ old('mobile_number') }}" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" style="background-color:green">Register</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
