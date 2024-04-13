<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome On LoyaltyCard</title>
    <link rel="stylesheet" href="{{url('style/index.css')}}">
</head>
<body>

<x-navbar></x-navbar>
<main>
    <header>
        <div class="write">
            <h1>Welcome on LoyaltyCard</h1>
            <p>Where you can create your personalized Fidelity Card plan for your activity</p>

            <div class="bttns">
                <p><a href="/register">Register</a></p>
                <p><a href="/login">Your activity</a></p>
            </div>

        </div>
        <div class="card">

            <div class="example">
                <h4>Your Shop</h4>
                <div class="card-info">
                    <p>Mario Rossi</p>
                    <p>9982732934</p>
                    <p>Mariorossi@mail.com</p>
                    <p>12349837283294423</p>
                </div>
            </div>
            <h3>Example of a card</h3>
        </div>
    </header>


    <article class="descriptions">
        <div class="par">
            <h2>What's LoyaltyCard?</h2>
            <p>
                LoyaltyCard is a website that allows you to improve your activity with an efficient loyalty card service.
                With the dashboard of this website you can manage all your customers and with our APIs you can add to your website
                a page in order your client could manage their electronic LoyaltyCard.
                You can select your favourite plan (it's depends on your need).
            </p>
        </div>
        <div class="par right">
            <h2>Why you should choose us?</h2>
            <p>
                LoyaltyCard is a website that allows you to improve your activity with an efficient loyalty card service.
                With the dashboard of this website you can manage all your customers and with our APIs you can add to your website
                a page in order your client could manage their electronic LoyaltyCard.
                You can select your favourite plan (it's depends on your need).
            </p>
        </div>
    </article>

    <article class="maps">
        <h2>Shops who use FidelityCard</h2>
        <img src="https://www.ionos.it/digitalguide/fileadmin/DigitalGuide/Screenshots_2023/google-my-maps.png">
    </article>

    <h2 class="plans">Our Plans</h2>
    <article class="prices">
        <div class="select-abb">
            <div class="info-select">
                <h2>Free Plan</h2>
                <p class="descp">Perfect for your familiar run business</p>
                <p class="price">0,00</p>
                <a href="/register">Subscribe</a>
            </div>
            <hr>
            <p class="srvc">Services</p>
            <ul>
                <li>
                    <b>500</b> card for your customers
                </li>
                <li>
                    1 <b>type of card</b>
                </li>
                <li>
                    1 <b>account</b>
                </li>
                <li>
                    <b>Free APIs</b> services
                </li>
            </ul>
        </div>
        <div class="select-abb">
            <div class="info-select">
                <h2>Premium Plan</h2>
                <p class="descp">Perfect for your medium activity</p>
                <p class="price">3,99</p>
                <a href="/register">Subscribe</a>
            </div>
            <hr>
            <p class="srvc">Services</p>
            <ul>
                <li>
                    <b>1500</b> card for your customers
                </li>
                <li>
                    2 <b>type of cards</b>
                </li>
                <li>
                    5 <b>accounts</b>
                </li>
                <li>
                    <b>Free APIs</b> services
                </li>
            </ul>
        </div>
        <div class="select-abb">
            <div class="info-select">
                <h2>Business Plan</h2>
                <p class="descp">Perfect for your large activity</p>
                <p class="price">8,99</p>
                <a href="/register">Subscribe</a>
            </div>
            <hr>
            <p class="srvc">Services</p>
            <ul>
                <li>
                    <b>5000</b> card for your customers
                </li>
                <li>
                    3 <b>type of cards</b>
                </li>
                <li>
                    15 <b>accounts</b>
                </li>
                <li>
                    <b>Free APIs</b> services
                </li>
            </ul>
        </div>
    </article>
    <x-flash></x-flash>
</main>
<x-footer></x-footer>

</body>
</html>
