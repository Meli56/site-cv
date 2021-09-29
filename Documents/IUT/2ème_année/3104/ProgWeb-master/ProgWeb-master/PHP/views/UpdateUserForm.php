
<!DOCTYPE html>
<html>
    <head>
        <title>SportTrack</title>
        <link  rel="stylesheet" href="./public/css/style.css">
    </head>

    <body>
        <?php include('Header.php');?>
        <?php if(!isset($_SESSION['mail'])){?>
        <div class="error-update">
            <p>You have to be connected to update your account</p>
            <form method="post" class="update">
                <input type="hidden" name="page" value="user_add_form">
                <button class="cybr-btn">
                    Register<span aria-hidden>_</span>
                    <span aria-hidden class="cybr-btn__glitch">Register</span>
                    <span aria-hidden class="cybr-btn__tag">R25</span>
                </button>
            </form>
            <form method="post" class="update">
                <input type="hidden" name="page" value="user_connect_form">
                <button class="cybr-btn">
                    Sign in<span aria-hidden>_</span>
                    <span aria-hidden class="cybr-btn__glitch">Sign in</span>
                    <span aria-hidden class="cybr-btn__tag">R25</span>
                </button>
            </form>
        </div>

        <?php }
        else {?>

        <h2>Update your account</h2>
        <div class="container">
            <form method="post">
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">First Name</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="text" name="fname" class="editor-field__input" pattern="[a-zA-Z-]*"/>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Last Name</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="text" name="lname" class="editor-field__input" pattern="[a-zA-Z-]*"/>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Birth Date</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="date" name="birthDate" class="editor-field__input"/>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Gender</label>
                    </div>

                    <div class="editor-field__container">
                        <select class="editor-field__input">
                            <option value="1">Man</option>
                            <option value="2">Woman</option>
                            <option value="0">Other</option>
                        </select>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Height</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="number" name="height" pattern="[0-9]{1,3}" class="editor-field__input"/>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Weight</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="number" name="weight" pattern="[0-9]{1,3}" class="editor-field__input"/>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Mail</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="email" name="mail" pattern="[0-9]{1,3}" class="editor-field__input"/>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Password</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="password" name="password" pattern="[0-9]{1,3}" class="editor-field__input"/>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
            </form>
            <button class="cybr-btn" onclick="window.location.href = 'index.php?page=user_connect_form';">
                Submit<span aria-hidden>_</span>
                <span aria-hidden class="cybr-btn__glitch">Submit</span>
                <span aria-hidden class="cybr-btn__tag">R25</span>
            </button>

        </div>
        <?php }?>
        <?php include('Footer.php') ?>
    </body>
    <script>
          document.getElementById('heightValue').value=documentd.getElementById('height').value;
          document.getElementById('weightValue').value=documentd.getElementById('weight').value; 
    </script>
</html>