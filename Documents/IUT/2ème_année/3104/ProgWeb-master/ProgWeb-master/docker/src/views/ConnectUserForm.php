<!DOCTYPE html>
<head>
    <title>SportTrack | Sign in</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <?php include "Header.php"; ?>
    <form method="post">
        <div class="editor-field editor-field__textbox">
            <div class="editor-field__label-container">
                <label class="editor-field__label">Mail</label>
            </div>

            <div class="editor-field__container">
                <input type="text" name="mail" class="editor-field__input"/>
            </div>
            <span class="editor-field__bottom"></span>
        </div>
        <div class="editor-field editor-field__textbox">
            <div class="editor-field__label-container">
                <label class="editor-field__label">Password</label>
            </div>

            <div class="editor-field__container">
                <input type="password" name="password" class="editor-field__input"/>
            </div>
            <span class="editor-field__bottom"></span>
        </div>
        <input type="hidden" name="page" value="user_connect">
        <button class="cybr-btn">
            Sign in<span aria-hidden>_</span>
            <span aria-hidden class="cybr-btn__glitch">Sign in</span>
            <span aria-hidden class="cybr-btn__tag">R25</span>
        </button>
    </form>
</body>