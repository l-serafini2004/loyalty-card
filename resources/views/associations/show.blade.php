<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="../../style/associationsshow.css">
</head>
<body>
<x-layout>
    <main>

        <h1>Card data</h1>

        <div class="dati">
            <a href="/associations/index" class="comeback">Come Back</a>

            <div class="datahead">
                <h2>Here you can modify the users data</h2>
            </div>
            <div class="mod">
                <p>Name: {{$assoc->name}}</p>
                <p>Surname: {{$assoc->surname}}</p>
                <p>Email: {{$assoc->email}}</p>
                <p>Phone number: {{$assoc->customer_number}}</p>
                <p>Card number: {{$assoc->card_number}}</p>
                <form method="post" action="/associations/update">
                    @csrf
                    <label>Points</label>
                    <input type="hidden" name="id" value="{{ $assoc->id }}">
                    <input type="number" name="points" value="{{$assoc->point}}">
                    <input type="submit" value="Update" class="upd-btn">
                </form>

                <form method="post" action="/associations/delete">
                    @csrf
                    <input type="hidden" name="id" value="{{ $assoc->id }}">
                    <input type="submit" value="Delete" class="del-btn">
                </form>
            </div>
        </div>

    </main>
</x-layout>


</body>
</html>
