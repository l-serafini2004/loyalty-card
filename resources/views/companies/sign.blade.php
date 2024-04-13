<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SingIn</title>
    <link rel="stylesheet" href="{{url('style/sign.css')}}">
</head>
<body>

<main>
    <p class="name">LoyaltyCard</p>
    <form action="/join" method="post">
        @csrf
        <h1>Connect to your company</h1>

        <label>
            Company Code (5 numbers)
        </label>
        <input type="text" name="id" value="{{old('id')}}">
        @error('id')
            <p class="error">{{$message}}</p>
        @enderror
        <label>
            Root Password
        </label>
        <input type="password" name="rootPassword">
        @error('rootPassword')
            <p class="error">{{$message}}</p>
        @enderror

        @error('others')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Sign in">
        <span>Don't have a company to join? <a href="/create-company">Create one</a></span>
    </form>
</main>
</body>
</html>
