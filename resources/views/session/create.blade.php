<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SingIn</title>
    <link rel="stylesheet" href="style/sign.css">
</head>
<body>

<main>
    <p class="name">LoyaltyCard</p>
    <form action="/login" method="post">
        @csrf
        <h1>Please Sign in</h1>

        <label>
            Email
        </label>
        <input type="email" name="email" value="{{old('email')}}">
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


        <input type="submit" value="Sign in">
        <span>Don't have an account? <a href="/register">Register now</a></span>
    </form>
</main>
</body>
</html>
