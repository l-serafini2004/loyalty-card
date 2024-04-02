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
        <form method="get" action="/associations/index">

            <div class="head-form">
                <p>Search System (Search for users that match ALL criteria)</p>
            </div>
            <div class="search-row">
                <div>
                    <span>Name</span>
                    <input type="text" name="name">
                </div>
                <div>
                    <span>Surname</span>
                    <input type="text" name="surname">
                </div>
                <div>
                    <span>Email</span>
                    <input type="text" name="email">
                </div>
                <div>
                    <span>Points</span>
                    <input type="text" name="point">
                </div>
                <div>
                    <span>Card</span>
                    <select name="card" >
                        <option value="">--SELECT--</option>
                        @foreach($cards as $card)
                            <option value="{{$card->id}}">{{$card->cardName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="bottoni">
                <a id="clear" class="button">Clear</a>
                <input type="submit" value="Search">
            </div>
        </form>

        @if(!empty($associations[0]))
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
        @else
            <p class="results">
                There aren't associations who respect that parameters
            </p>
        @endif
    </main>
</x-layout>
<x-flash></x-flash>
</body>
</html>


<!-- Script -->
<script src="../script/showuser.js"></script>
