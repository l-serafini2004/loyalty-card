
<body>
    <aside id="aclose">
        <h2 id="close">LoyaltyCard</h2>
        <div class="sect">
            <h3><i id="open1" class="fa-solid fa-chevron-right"></i>Card</h3>
            <ul id="opt1" class="und">
                <li><a href="/cards/create">Create</a></li>
                <li><a href="/cards/update">Modify</a></li>
                <li><a href="/associations/index">Users</a></li>
                <li><a href="/company/updateplan">Plan</a></li>
            </ul>
        </div>
        <div class="sect">
            <h3><i id="open2" class="fa-solid fa-chevron-right"></i>Personal</h3>
            <ul class="und" id="opt2">
                <li><a href="/documentation/api">APIs token</a></li>
                <li><a href="/company/left">Leave company</a></li>
            </ul>
        </div>
        <div class="sect">
            <h3><i id="open3" class="fa-solid fa-chevron-right"></i>Customers</h3>
            <ul class="und" id="opt3">
                <li><a href="/users/create">Add Customers</a></li>
                <li><a href="/users/update">Associate card</a></li>
            </ul>
        </div>
        <div class="signout" id="user-option">
            <form method="post" action="/logout"> @csrf <input type="submit" value="Sign out"></form>
            <p><a href="/">Back home</a></p>
        </div>
        <div class="user-image">
            <img src="https://i.pinimg.com/236x/20/2c/6d/202c6d0314ccd842f6d733789d0b6374.jpg">
            <h3 id="openoption">
                {{ auth()->user()->name . " " . auth()->user()->surname }}
            </h3>
        </div>
    </aside>

    <div class="alternative-aside" id="altaside">

    </div>
</body>
</html>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>

<script src="../../script/components/aside.js"></script>
