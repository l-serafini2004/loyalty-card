<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome On LoyaltyCard</title>
    <link rel="stylesheet" href="{{url('style/mycard.css')}}">
</head>
<body>
<x-navbar>
</x-navbar>
    <main>
        <h1>Your cards</h1>
        <form method="get" action="/mycards">
            <p>Your email</p>
            <input type="email" name="email">
            <input type="submit" value="Search">
        </form>
        @isset($cards)
            <h2 class="sub">Result</h2>
        @endisset
        <div class="cards">
            @isset($cards)
                @foreach($cards as $card)
                    <div class="carta">
                        <x-card :card=" $card ">
                        </x-card>
                        <p class="punti">Points: {{$card['point']}}</p>
                    </div>
                @endforeach
            @endisset
        </div>

    </main>


</body>
</html>
