<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="{{url('style/sign.css')}}">
</head>
<body>
<x-layout>
<main>
    <form action="/users/create" method="post">
        @csrf
        <h1>Create a user</h1>

        <label>
            Name
        </label>
        <input type="text" name="name">
        @error('name')
            <p class="error">{{$message}}</p>
        @enderror
        <label>
            Surname
        </label>
        <input type="text" name="surname">
        @error('surname')
            <p class="error">{{$message}}</p>
        @enderror

        <label>
            Phone Number
        </label>
        <input type="text" name="customer_number">

        @error('customer_number')
            <p class="customer_number">{{$message}}</p>
        @enderror

        <label>
            Email
        </label>
        <input type="email" name="email">
        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Create">
    </form>
</main>
</x-layout>
</body>
</html>

