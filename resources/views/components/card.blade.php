<link rel="stylesheet" href="{{url('style/components/card.css')}}">
<div class="card" style="color: {{$card->color}}; background-color: {{$card->bgColor}};">

    <h4>{{ $card['cardName'] }}</h4>
    <div class="card-info">
        @if(isset($card['name']))
            <p>{{ $card['name'] . ' ' . $card['surname']}}</p>
            <p>{{$card['customer_number']}}</p>
            <p>{{ $card['email'] }}</p>
            <p>{{$card['card_number']}}</p>
        @else
            <p>John Doe</p>
            <p>4357283945</p>
            <p>j.doe@email.com</p>
            <p>839402935632</p>
        @endif
    </div>
</div>

