<!DOCTYPE html>
<html>
    <head>
        <title>SportTrack | Register</title>
        <link  rel="stylesheet" href="../public/css/style.css">
    </head>

    <body>
        <?php include('Header.php')?>
        <h2>Register</h2>

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
                        <select name="gender" class="editor-field__input">
                            <option value="Man">Man</option>
                            <option value="Woman">Woman</option>
                            <option value="Non-specified">Other</option>
                        </select>
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Height</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="number" name="height" pattern="[0-9]{1,3}" class="editor-field__input" />
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Weight</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="number" name="weight" pattern="[0-9]{1,3}" class="editor-field__input" />
                    </div>
                    <span class="editor-field__bottom"></span>
                </div>
                <div class="editor-field editor-field__textbox">
                    <div class="editor-field__label-container">
                        <label class="editor-field__label">Mail</label>
                    </div>

                    <div class="editor-field__container">
                        <input type="email" name="mail" class="editor-field__input"/>
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
                <input type="hidden" name="page" value="user_add">
                <button class="cybr-btn">
                    Submit<span aria-hidden>_</span>
                    <span aria-hidden class="cybr-btn__glitch">Submit</span>
                    <span aria-hidden class="cybr-btn__tag">R25</span>
                </button>
            </form>


        </div>
    <?php include('Footer.php') ?>
    </body>
</html>