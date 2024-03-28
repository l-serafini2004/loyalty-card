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
                            <p><a class="delete" id="{{ $card->id }}">Delete</a></p>
                        </div>
                    </article>
                @endforeach
            </section>



        <div class="deleteSection hid" id="delete-section">

            <form method="post" action="/cards/delete">
                @csrf
                <input type="hidden" id="hiddeninput" name="idToRemove">
                <div class="head">
                    <h2>LoyaltyCard</h2>
                </div>

                <div class="body">
                    <p>Are you really sure to delete this card? All the users connected to that will lose their data! </p>
                    <div class="buttons">
                        <a id="retry-button">Retry</a>
                        <input type="submit" value="Delete">
                    </div>
                </div>
            </form>
        </div>

        </main>
    </x-layout>


</html>

<script src="../script/updatecard.js"></script>
