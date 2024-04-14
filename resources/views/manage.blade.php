<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a profile</title>
    <link rel="stylesheet" href="style/manage.css">
</head>
<body>
<main>
    <header>
        <h1>Get started with LoyaltyCard</h1>
        <p>
            You have created an account, but now you have to create your own activity or become member of another activity.
            Now you must
            If you need some advices, you can check bottom in this page
        </p>
        <a href="/admin">Sign up to your shop</a>
    </header>
    <article>
        <section>
            <h2>Start project</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar, elit id cursus mattis, risus ex feugiat justo, sed sollicitudin odio libero at sem. Fusce efficitur lobortis neque in bibendum. Phasellus sagittis dignissim scelerisque. </p>
            <ul>
                <li><a href="/create-company">New Shop</a></li>
                <li><a href="/join">Join a company</a></li>
                <li><a href="/documentation/api">APIs for your website</a></li>
                <li><a href="#">Get the library</a></li>
            </ul>
        </section>
        <section>
            <h2>Guides</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar, elit id cursus mattis, risus ex feugiat justo, sed sollicitudin odio libero at sem. Fusce efficitur lobortis neque in bibendum. Phasellus sagittis dignissim scelerisque. </p>
            <ul>
                <li><a href="/documentation">Documentation</a></li>
                <li><a href="#">Info</a></li>
                <li><a href="#">Price</a></li>
                <li><a href="#">How can I use it</a></li>
                <form method="post" action="/logout">
                    @csrf
                    <input type="submit" value="Logout">
                </form>
            </ul>
        </section>
        <span class="material-symbols-outlined"></span>
    </article>
    <x-flash></x-flash>
</main>
</body>
</html>
