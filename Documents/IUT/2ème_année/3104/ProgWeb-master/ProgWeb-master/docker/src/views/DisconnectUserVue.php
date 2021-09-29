<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SportTrack | Disconnect</title>
        <link href="./public/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php include('Header.php'); ?>
        <h2>You are disconnected</h2>
        <form method="post">
            <input type="hidden" name="page" value="user_add_form">
            <button class="cybr-btn">
                Register<span aria-hidden>_</span>
                <span aria-hidden class="cybr-btn__glitch">Register</span>
                <span aria-hidden class="cybr-btn__tag">R25</span>
            </button>
        </form>
        <form method="post">
            <input type="hidden" name="page" value="user_connect_form">
            <button class="cybr-btn">
                Sign in<span aria-hidden>_</span>
                <span aria-hidden class="cybr-btn__glitch">Sign in</span>
                <span aria-hidden class="cybr-btn__tag">R25</span>
            </button>
        </form>
    </body>
</html>
