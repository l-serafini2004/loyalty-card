<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="../style/sign.css">
</head>
<body>
<x-layout>
<main>

    <form action="/users/update" method="post">
        @csrf
        <h1>Subscribe users to a card</h1>

        <label>
            Email
        </label>
        <input type="email" name="email">
        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

        <label>
            Card
        </label>
        <select name="card_id">
            @foreach($cards as $card)
                <option value="{{$card->id}}">{{ $card->cardName }}</option>
            @endforeach
        </select>

        <input type="submit" value="Add">
    </form>
</main>
</x-layout>
</body>
</html>


