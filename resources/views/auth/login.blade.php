<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">

    <script src="{{ asset('js/jquery2.0.3.min.js') }}"></script>
</head>

<body>

<div class="log-w3">
    <div class="w3layouts-main">

        <h2>Sign In Now</h2>

        <form id="loginForm">

            @csrf

            <input type="email" name="Email" class="ggg" placeholder="E-MAIL" required>

            <input type="password" name="Password" class="ggg" placeholder="PASSWORD" required>
                <span><input type="checkbox" />Remember Me</span>
                <h6><a href="javascript:void(0)">Forgot Password?</a></h6>
                    <div class="clearfix"></div>
            <input type="submit" value="Sign In">

        </form>
        <p>Don't Have an Account ?<a href="javascript:void(0)">Create an account</a></p>

       <div id="errorMsg"
            style="display:none;text-align:center;color:#d9534f;background:#f8d7da;padding:10px;border:1px solid #d9534f;border-radius:4px;font-weight:bold;margin-top:10px;">
        </div>

    </div>
</div>

<script src="{{ asset('js/bootstrap.js') }}"></script>

<script>
$(function () {

    $("#loginForm").on("submit", function (e) {

        e.preventDefault();

        // Purana message hide karo
        $("#errorMsg").hide().html("");

        $.ajax({

            url: "{{ route('check.login') }}",

            type: "POST",

            data: $(this).serialize(),

            success: function (response) {

                if (response.status) {

                    window.location = response.redirect;

                } else {

                    $("#errorMsg")
                        .html(response.message)
                        .show();

                }

            },

            error: function (xhr) {

                // console.log(xhr.responseText);

                $("#errorMsg")
                    .html("Something went wrong.")
                    .show();

            }

        });

    });

});
</script>

</body>
</html>