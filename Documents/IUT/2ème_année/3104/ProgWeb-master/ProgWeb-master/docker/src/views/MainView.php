<head>
    <link href="./public/css/style.css" rel="stylesheet" type="text/css">
    <title>SportTrack</title>
</head>
<body>
    <?php include('Header.php'); ?>
    <main>
        <form method="post">
            <input type="hidden" name="page" value="user_add_form">
            <button class="cybr-btn">
                Register<span aria-hidden>_</span>
                <span aria-hidden class="cybr-btn__glitch">Register</span>
                <span aria-hidden class="cybr-btn__tag">R25</span>
            </button>
        </form>

        <?php if(!isset($_SESSION['mail'])) { ?>
        <form method="post">
            <input type="hidden" name="page" value="user_connect_form">
            <button class="cybr-btn">
                Sign in<span aria-hidden>_</span>
                <span aria-hidden class="cybr-btn__glitch">Sign in</span>
                <span aria-hidden class="cybr-btn__tag">R25</span>
            </button>
        </form>
        <?php } ?>


        <?php if(isset($_SESSION['mail'])) {?>
        <form method="post">
            <input type="hidden" name="page" value="user_disconnect">
            <button class="cybr-btn">
                Sign out<span aria-hidden>_</span>
                <span aria-hidden class="cybr-btn__glitch">Sign out</span>
                <span aria-hidden class="cybr-btn__tag">R25</span>
            </button>
        </form>
        <form method="post">
            <input type="hidden" name="page" value="upload_activity_form">
            <button class="cybr-btn">
                Upload<span aria-hidden>_</span>
                <span aria-hidden class="cybr-btn__glitch">Upload</span>
                <span aria-hidden class="cybr-btn__tag">R25</span>
            </button>
        </form>
        <?php }?>
    </main>

</body>
