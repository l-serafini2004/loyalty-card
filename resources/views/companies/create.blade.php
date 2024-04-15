<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{url('style/company-create.css')}}">
    <title>Create Shop</title>
</head>
<body>
<main>

    <header>
        <h1>Add your shop</h1>
        <p>Here you can add your shop to create fidelity card for your customers. Please do not create an account for a shop that isn't yours.</p>
    </header>


    <form action="/create-company" method="post">
        @csrf
        <div class="info">
            <div class="billing">
                <h2>Shop information</h2>
                <div class="inp">
                    <label>
                        Name
                    </label>
                    <input type="text" name="company_name" value="{{old('company_name')}}">
                </div>
                @error('company_name')
                    <p class="error">{{$message}}</p>
                @enderror
                <div class="inp">
                    <label>
                        Phone Number (Optional)
                    </label>
                    <input type="tel" name="company_number" value="{{old('company_number')}}">
                </div>
                <div class="inp">
                    <label>
                        Email (of the activity)
                    </label>
                    <input type="email" name="email" placeholder="account@myshop.com" value="{{old('email')}}">
                </div>
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror
                <div class="inp location">
                    <div>
                        <label>
                            State
                        </label>
                        <input type="text" name="state" value="{{old('state')}}">
                        @error('state')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label>
                            City
                        </label>

                        <input type="text" name="city" value="{{old('city')}}">
                        @error('city')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label>
                            Address
                        </label>
                        <input type="text" name="address" value="{{old('address')}}">
                        @error('address')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                </div>

                <hr>

                <h2>Account data</h2>
                <div class="inp">
                    <label>
                        Account code (5 numbers)
                    </label>
                    <input type="number" name="id" value="{{old('id')}}">
                </div>
                @error('id')
                    <p class="error">{{$message}}</p>
                @enderror

                <div class="inp">
                    <label>
                        Superuser Password
                    </label>
                    <input type="password" name="rootPassword">
                </div>
                @error('rootPassword')
                    <p class="error">{{$message}}</p>
                @enderror

                <div class="inp">
                    <label>
                        Repeat password
                    </label>
                    <input type="password" name="repeat">
                </div>
                @error('repeat')
                    <p class="error">{{$message}}</p>
                @enderror

                <hr>

                <h2>Payment</h2>
                <div class="inp">
                    <label>Plan</label>
                    <select id="tipoAbb" name="plan">
                        <option value="free" id="0">Free</option>
                        <option value="premium" id="1">Premium</option>
                        <option value="business" id="2">Business</option>
                    </select>
                </div>

            </div>

        </div>
        <div class="payment">
            <h2>Your cart</h2>
            <div class="paga">
                <div class="cart-obj">
                    <p class="price" id="price">0.00</p>
                    <p class="title">Subscription</p>
                    <p class="desc" id="plan">Free Plan</p>
                </div>
                <input type="submit" value="Buy">
                <p class="spec">If you select the free plan you don't need to provide your card data</p>
            </div>
        </div>

    </form>


    <section class="bottom">
        <p>Copyright@ 2024</p>
        <ul>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li>
        </ul>
    </section>
</main>
</body>
</html>

<script src="{{url('script/company-create.js')}}"></script>
