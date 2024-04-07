<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome On LoyaltyCard</title>
    <link rel="stylesheet" href="{{url('style/documentation.css')}}">
</head>
<body>

<x-navbar></x-navbar>
<main>
    <h1>Documentation</h1>
    <section class="indice">
        <ul>
            <li><a href="#introduzione"><b>Introduction</b></a></li>
            <li><a href="#company"><b>Company</b></a></li>
            <ul class="subcat">
                <li><a href="#company-get">Get all the data</a></li>
            </ul>
            <li><a href="#card"><b>Card</b></a></li>
            <ul class="subcat">
                <li><a href="#card-get-all">All</a></li>
                <li><a href="#card-get-specific">Specific</a></li>
            </ul>
        </ul>
    </section>
    <section class="content">
        <article class="pic">
            <h2 id="introduzione">
                Introduction
            </h2>
            <p>
                In this article I'll explain to you how did APIs works in LoyaltyCard. Before you started to read this guide make sure that you're already signed up, and you belong a company.
                Instead, you have to create an account and login to a company (or create new one) before reading this article. Here you can find all the APIs address that you can use for your activity.
                Alternatively you can use the pre-created library in PHP or Python that I made for this website. Let's begin.
                Firstly you have to install an app that allows you to make requests to my app: I recommend <a target="_blank" href="https://www.postman.com/">Postman</a> that is easy-to-use and free.
                If you want to get the access to API you have to generate a token: follow <a href="/documentation/api">this guide</a> to do it.
            </p>
            <h2 id="company">
                Company
            </h2>
            <h3 id="company-get">
                Get all the data
            </h3>
            <p>
                If you want to get all the data of your company you have to make a get request to the following address:
                <x-code-section>
                    <pre>{{ $base_add . 'api/' }}company/info</pre>
                </x-code-section>
                <p>You'll get a result like this:</p>
                <x-code-section>
                    <pre>
                        "company" : {
                            "id": id,
                            "company_name": "Your_company_name",
                            "company_number": "Your_company_number",
                            "company_email": "yourcompany@domain.dm",
                            "state": "state",
                            "city": "city",
                            "address": "address",
                            "plan": "your_plan",
                            "created_at": "data",
                            "updated_at": "data"
                        }
                    </pre>
                </x-code-section>
            </p>
            <h2 id="card">
                Card
            </h2>
            <h3 id="card-get-all">
                All
            </h3>
            <p>If you want to get all the cards that you've been created, you only make a get request to this address:</p>
            <x-code-section>
                <pre>http://127.0.0.1:8000/api/card/index</pre>
            </x-code-section>
            <p>You'll get all the card of your company account: in particular card name, color and background color</p>

            <h3 id="card-get-specific">
                Specific
            </h3>
            <p>If you want only some card, i.e. only the cards that name that start with "go", you can use this address  (GET REQUEST): </p>
            <x-code-section>
                <pre>http://127.0.0.1:8000/api/card/show</pre>
            </x-code-section>
            <p>You have to specify the card name, or part of that, though. By the way, you'll get an array that contains all the cards that match the string you passed at the request (in this way):</p>
            <x-code-section>
                <pre>
                {
                    "cardName" : "nameYouWantToPass"
                }
                </pre>
            </x-code-section>
        </article>

    </section>
</main>
<x-footer></x-footer>

</body>
</html>

