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
                <li><a href="#card-delete">Delete</a></li>
            </ul>
            <li><a href="#association"><b>Association</b></a></li>
            <ul class="subcat">
                <li><a href="#association-all">All</a></li>
                <li><a href="#association-update">Update points</a></li>
            </ul>
            <li><a href="#customer"><b>Customer</b></a></li>
            <ul class="subcat">
                <li><a href="#customer-add">Add</a></li>
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
                <pre>{{ $base_add . 'api/' }}card/index</pre>
            </x-code-section>
            <p>You'll get all the card of your company account: in particular card name, color and background color</p>

            <h3 id="card-get-specific">
                Specific
            </h3>
            <p>If you want only some card, i.e. only the cards that name that start with "go", you can use this address  (GET REQUEST): </p>
            <x-code-section>
                <pre>{{ $base_add . 'api/' }}card/show</pre>
            </x-code-section>
            <p>You have to specify the card name, or part of that, though. By the way, you'll get an array that contains all the cards that match the string you passed at the request (in this way):</p>
            <x-code-section>
                <pre>
                {
                    "cardName" : "nameYouWantToPass"
                }
                </pre>
            </x-code-section>
            <h3 id="card-delete">
                Delete
            </h3>
            <p>If you want to delete a card (ATTENTION: if you delete that you'll remove all the associations with that card in database, think straight before do it) you have to pass this address: </p>
            <x-code-section>
                <pre>{{ $base_add . 'api/' }}card/delete</pre>
            </x-code-section>
            <p>You have to specify the id of the card you want remove, like this:</p>
            <x-code-section>
                <pre>
                    {
                        "id" : 3
                    }
                </pre>
            </x-code-section>
            <h2 id="association">
                Association
            </h2>
            <h3 id="association-all">
                All
            </h3>
            <p>With the following link you can get all the associations in your company, with card name, card number, points, email, name and surname of the owner of the card:</p>
            <x-code-section>
                <pre>
                    {{ $base_add . 'api/' }}association/all
                </pre>
            </x-code-section>
            <p>You don't need to pass any parameters to get that.</p>
            <h3 id="association-update">
                Update points
            </h3>
            <p>With this link you can update the points of an association (of a card own by a customer):</p>
            <x-code-section>
                <pre>
                    {{ $base_add . 'api/' }}association/update
                </pre>
            </x-code-section>
            <p>You need to pass two parameters: the email of the owner and the points you want to add or subtract to his count. If you want to add points you only have to pass the number; if you put "-" before this number you'll remove that number of points. </p>
            <x-code-section>
                <pre>
                    {
                        "email":"email@email.com",
                        "changePoint":numberOfPoints
                    }
                </pre>
            </x-code-section>
            <h2 id="customer">Customer</h2>
            <h3 id="customer-add">
                Add
            </h3>
            <p>If you want to add a customer you have to use the following address. If the user already exists this operation will fail:</p>
            <x-code-section>
                <pre>
                    {{$base_add . 'api/'}}customer/store
                </pre>
            </x-code-section>
            <p>You need to pass some parameters in order this function works:</p>
            <x-code-section>
                <pre>
                    {
                        "name":"Name",
                        "surname":"Surname",
                        "email":"Email",
                        "customer_number":"Number"
                    }
                </pre>
            </x-code-section>

        </article>


    </section>
</main>
<x-footer></x-footer>

</body>
</html>

