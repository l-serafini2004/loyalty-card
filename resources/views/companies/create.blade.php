<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/company-create.css">
    <title>Create Shop</title>
</head>
<body>
<main>

    <header>
        <h1>Add your shop</h1>
        <p>Here you can add your shop to create fidelity card for your customers. Please do not create an account for a shop that isn't yours.</p>
    </header>


    <form>
        <div class="info">
            <div class="billing">
                <h2>Shop information</h2>
                <div class="inp">
                    <label>
                        Name
                    </label>
                    <input type="text">
                </div>
                <div class="inp">
                    <label>
                        Phone Number (Optional)
                    </label>
                    <input type="text">
                </div>
                <div class="inp">
                    <label>
                        Email (of the activity)
                    </label>
                    <input type="email" placeholder="account@myshop.com">
                </div>
                <div class="inp location">
                    <div>
                        <label>
                            State
                        </label>
                        <input type="text">
                    </div>
                    <div>
                        <label>
                            City
                        </label>

                        <input type="text">
                    </div>
                    <div>
                        <label>
                            Address
                        </label>
                        <input type="text">
                    </div>
                </div>

                <hr>

                <h2>Account data</h2>
                <div class="inp">
                    <label>
                        Account code
                    </label>
                    <input type="text">
                </div>

                <div class="inp">
                    <label>
                        Superuser Password
                    </label>
                    <input type="password">
                </div>

                <div class="inp">
                    <label>
                        Repeat password
                    </label>
                    <input type="password">
                </div>

                <hr>

                <h2>Payment</h2>
                <div class="inp">
                    <label>Plan</label>
                    <select id="tipoAbb">
                        <option value="0">Free</option>
                        <option value="1">Premium</option>
                        <option value="2">Business</option>
                    </select>
                </div>
                <div class="inp">
                    <label>Name on card</label>
                    <input type="text" placeholder="John Doe">
                </div>
                <div class="inp">
                    <label>Card number</label>
                    <input type="text" placeholder="1234567812345678">
                </div>
                <div class="inp">
                    <label>Expiration</label>
                    <input type="text" placeholder="MM/YYYY">
                </div>
                <div class="inp">
                    <label>CVV</label>
                    <input type="text" placeholder="123">
                </div>
            </div>

        </div>
        <div class="payment">
            <h2>Your cart</h2>
            <div class="paga">
                <div class="cart-obj">
                    <p class="price" id="price">3.99</p>
                    <p class="title">Abbonamento</p>
                    <p class="desc" id="plan">Premium Plan</p>
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

<script src="script/company-create.js"></script>
