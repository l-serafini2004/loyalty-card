<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Plan</title>
    <link rel="stylesheet" href="{{url('style/changeplan.css')}}">
</head>
<x-layout>

    <main>
        <div class="changeplan">
            <h1>Change your plan</h1>

            <form method="post" action="/company/updateplan">
                @csrf
                <p>You can update your plan here: </p>
                <select name="plan">
                    <option value="free">Free</option>
                    <option value="premium">Premium</option>
                    <option value="business">Business</option>
                </select>
                <input type="submit" value="Update">
                @error('plan')
                    <p class="error">{{ $message }}</p>
                @enderror
                @if(session()->has('success'))
                    <p class="success">{{ @session('success') }}</p>
                @endif
            </form>

            <p class="curr">Your currently plan is: <code>{{auth()->user()->company->plan}}</code></p>
        </div>

    </main>
</x-layout>
<x-flash></x-flash>
</html>

<script src="{{url('/script/cardcreate.js')}}"></script>
