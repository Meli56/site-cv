<div id="header">
    <div class="return">
        <form method="post">
            <input hidden name="page" value="/">
            <button class="return">&#x21A2</button>

        </form>

    </div>
    <div class="title">
        <h1>SportTrack</h1>
        <?php if(isset($_SESSION['mail'])) { ?>
        <div class="user-info">
            <p> First name : <?php echo $_SESSION['fname'] ?></p>
            <p> Last name : <?php echo $_SESSION['lname'] ?></p>
        </div>

        <?php } ?>
    </div>
</div>