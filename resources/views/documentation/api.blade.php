<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Api page</title>
    <link rel="stylesheet" href="{{url('style/api.css')}}">
</head>
<body>
<x-layout>
    <main>
        <h1>Api Manage Page</h1>
        <section class="your-data paragraph">
            <h2>Our API</h2>
            <p>
                If you want to create your application or add the functionality of this service on your website you can use our api.
                We provide you free and unlimited API for your activity: you only need to follow the steps that we give you in this guide.
                For more information you can read the following <a href="#">API's documentation</a>
            </p>
            <h2>Your data</h2>
            <p>
                If you need to use your API you must pass to our server your personal data:
            </p>
            <div class="pass">
                <span>Email:</span>
                <input type="text" value="{{ $user['email'] }}" readonly>
            </div>
            <div class="pass">
                <span>Password:</span>
                <span>Your password</span>
            </div>
            <div class="pass">
                <span>Api Token:</span>
                <input type="text" value="{{ $user['api_token'] }}" readonly>
            </div>
        </section>
        <section class="your-data how-to">
            <h2>Login</h2>
            <p>
                If you want to use our API you must be logged: you must make a POST request with your data (for example in <a href="https://www.postman.com/">Postman</a> or python).
                You have to make a request like this:
            </p>
            <x-code-section>
                    <pre>
                    mydata = {
                        "email" : "{{ $user["email"] }}",
                        "password" : "mypassword",
                        "api_token" : "{{ $user["api_token"] }}"
                    }
                    </pre>
            </x-code-section>
            <p>
                Once you logged correctly you'll get back that json set:
            </p>
            <x-code-section>
                    <pre>
                    {
                        "status": "Request successfull",
                        "message": null,
                        "data": {
                            "user": {
                                    "id": "{{ $user["id"] }}",
                                    "name": "{{ $user["name"]  }}",
                                    "surname": "{{ $user["surname"]  }}",
                                    "email": "{{ $user["email"]  }}",
                                    "phone_number": {{ $user["phone_number"]  }},
                                    "api_token": "{{ $user["api_token"] }}",
                                    "company_id": "{{$user["company_id"]}}",
                                    "created_at": "{{ $user["created_at"] }}",
                                    "updated_at": "{{ $user["updated_at"] }}"
                            },
                            "token": "77|jhWk6kGKLEje6Do9LL3RI2jbrtU4TWpy7myL9pKn6a2c98d0
                        }
                    }
                    </pre>
            </x-code-section>
            <p>
                When you get the token you can use it (with Bearer) to access to every APIs of your account.
                This code change everytime you use the login function, so if you decide to make an app remember that this value is variable.
            </p>
        </section>
    </main>
</x-layout>
</body>
</html>
