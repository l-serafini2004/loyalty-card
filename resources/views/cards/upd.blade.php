<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card update</title>
    <link rel="stylesheet" href="{{url('/style/cardcreate.css')}}">
</head>
<x-layout>


    <main>
        <h1>Update a card</h1>

        <form method="post" action="/card/update">
            @csrf
            <input type="hidden" name="id" value="{{$card['id']}}">
            <h2>Change your card</h2>
            <div class="inp">
                <label>
                    Name of the card
                </label>
                <input name="cardName" type="text" value="{{$card['cardName']}}" id="cardname" class="inpt">
                @error('cardName')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="inp">
                <label >
                    Color of the card
                </label>
                <input name="color" type="color" id="color" class="inpt" value="{{$card['color']}}">
                @error('color')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="inp">
                <label>
                    Background color
                </label>
                <input name="bgColor" type="color" id="bg-color" class="inpt" value="{{$card['bgColor']}}">
                @error('bgColor')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Update">
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

<script src="{{url("script/cardcreate.js")}}"></script>
