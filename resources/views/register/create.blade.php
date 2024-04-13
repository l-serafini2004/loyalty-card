<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style/sign.css">
</head>
<body>

<main>
    <p class="name">LoyaltyCard</p>
    <form method="post" action="/register">
        @csrf
        <h1>Please Register</h1>

        <label>
            Name
        </label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <p class="error">{{$message}}</p>
        @enderror
        <label>
            Surname
        </label>
        <input type="text" name="surname" value="{{ old('surname') }}">
        @error('surname')
            <p class="error">{{$message}}</p>
        @enderror

        <label>
            Phone number*
        </label>
        <input type="text" name="phone_number">
        @error('phone_number')
            <p class="error">{{$message}}</p>
        @enderror
        <label>
            Email
        </label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

        <label>
            Password
        </label>
        <input type="password" name="password">
        @error('password')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Create account">
        <span>Have you already an account? <a href="/login">Sign in</a></span>
    </form>
</main>
</body>
</html>
