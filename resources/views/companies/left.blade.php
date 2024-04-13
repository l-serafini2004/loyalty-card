<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave company</title>
    <link rel="stylesheet" href="{{url('style/leftcomp.css')}}">
</head>
<x-layout>
    <main>
        <div class="leftcmp">
            <h1>Leave company</h1>
            <p>
                If you want to leave your company, you only have to click the button below,
                but remember that you can't do if only one user is associated with your company.
                After you click this button you'll leave your company page, and you can change company or create a new one.
            </p>
            <form method="post" action="/company/left">
                @csrf
                @if($n !== 1)
                    <input type="submit" value="Leave" >
                @else
                    <input type="submit" value="Leave" disabled class="disable">
                @endif

            </form>
        </div>
    </main>

</x-layout>
