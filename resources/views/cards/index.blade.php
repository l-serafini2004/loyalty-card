<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="{{url('/style/showuser.css')}}">
</head>
<body>
<x-layout>
    <main>
        <form>
            <div class="head-form">
                <p>Search System (Search for users that match ALL criteria)</p>
            </div>
            <div class="search-row">
                <div>
                    <span>Name</span>
                    <input type="text">
                </div>
                <div>
                    <span>Surname</span>
                    <input type="text">
                </div>
                <div>
                    <span>Email</span>
                    <input type="text">
                </div>
                <div>
                    <span>Points</span>
                    <input type="text">
                </div>
                <div>
                    <span>Card</span>
                    <select>
                        <option value="none">--SELECT--</option>
                        @foreach($cards as $card)
                            <option value="{{$card->id}}">{{$card->cardName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="bottoni">
                <a id="clear" class="button">Clear</a>
                <input type="button" value="Search">
            </div>
        </form>
        <div class="database">
            <div class="row top">
                <div>
                    <p>Card Number</p>
                </div>
                <div>
                    <p>Name</p>
                </div>
                <div>
                    <p>Surname</p>
                </div>
                <div>
                    <p>Email</p>
                </div>
                <div>
                    <p>Phone number</p>
                </div>
                <div>
                    <p>Type</p>
                </div>
                <div>
                    <p>Points</p>
                </div>
            </div>
            <div class="row">
                @foreach($associations as $association)
                    <div>
                        <p><a class="ident" href="/associations/index/{{ $association->card_number }}">{{$association->card_number}}</a></p>
                    </div>
                    <div>
                        <p>{{ $association->name  }}</p>
                    </div>
                    <div><p>{{$association->surname}}</p></div>
                    <div><p>{{$association->email}}</p></div>
                    <div><p>{{$association->customer_number}}</p></div>
                    <div><p>{{$association->cardName}}</p></div>
                    <div><p>{{$association->point}}</p></div>
                @endforeach

            </div>
        </div>
    </main>
</x-layout>
<x-flash></x-flash>
</body>
</html>


<!-- Script -->
<script src="../script/showuser.js"></script>
