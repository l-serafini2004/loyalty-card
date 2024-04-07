<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card create</title>
    <link rel="stylesheet" href="../style/cardcreate.css">
</head>
<x-layout>


<main>
    <h1>Create a card</h1>

    <form method="post" action="/cards/create">
        @csrf
        <h2>Insert Data</h2>
        <div class="inp">
            <label>
                Name of the card
            </label>
            <input name="cardName" type="text" placeholder="Platinum Card..." id="cardname" class="inpt">
            @error('cardName')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="inp">
            <label >
                Color of the card
            </label>
            <input name="color" type="color" id="color" class="inpt" value="#ffffff">
            @error('color')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="inp">
            <label>
                Background color
            </label>
            <input name="bgColor" type="color" id="bg-color" class="inpt">
            @error('bgColor')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        <input type="submit" value="Create">
    </form>
    <article class="result">
        <h2>Result</h2>
        <div class="card" id="card">
            <h4 id="nameOnCard">Card name</h4>
            <div class="card-info">
                <p>John Doe</p>
                <p>9982732934</p>
                <p>Mariorossi@mail.com</p>
                <p>12349837283294423</p>
            </div>
        </div>

    </article>
</main>
</x-layout>
</html>

<script src="../script/cardcreate.js"></script>
