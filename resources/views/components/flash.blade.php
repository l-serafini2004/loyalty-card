@if(session()->has('success'))
    <head>
        <link rel="stylesheet" href="{{url('style/components/flash.css')}}">
    </head>
    <body>
        <div class="pup"  id="pop">
            <div class="upper">
                <p>LoyaltyCard</p>
                <i class="fa-solid fa-xmark" id="closeBtn"></i>
            </div>
            <div class="content">
                <p>{{@session('success')}}</p>
            </div>
        </div>
    </body>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>
    <script src="{{url('script/components/flash.js')}}"></script>
@endif
