<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card update</title>
    <link rel="stylesheet" href="../style/updatecard.css">
</head>
    <x-layout>
        <main>
            <h1 class="upd-tit">Update card</h1>
            <section class="carte">
                @foreach($cards as $card)
                    <article class="carta">
                        <x-card :card=" $card " />
                        <div class="info-card">
                            <p><b>{{ $card->cardName }}</b></p>
                            <p><a href="#">Modify</a></p>
                        </div>
                    </article>
                @endforeach
            </section>





        </main>
    </x-layout>


</html>
