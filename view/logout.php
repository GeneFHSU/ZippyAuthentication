<?php include('header.php') ?>
    <section>
        <?php if (!empty($firstname)) {?>
            <div>
                <?php if(is_null($firstname)){ ?>
                    <div>You have already signed out.</div>
                <?php } else {?>
                <p style="color:#d08504; font-size: 1.5rem; font-weight: bold">
                    Thank you for signing out, <?=$firstname ?>!
                </p>
                <?php }?>
            </div>
            <div>
                <a href="index.php">Click here</a> to view our vehicle list.
            </div>
        <?php } else {?>
            <form action="index.php" method="get" id="make_selection">
                <input type="hidden" name="action" value="register">
                <div><label for="firstname">Please enter your first name:</label></div>
                <div><input type="text" id="firstname" name="firstname"></div>
                <div><input type="submit" value="Register" class="button blue button-slim" maxlength="15"></div>
            </form>
        <?php } ?>
    </section>
<?php include('footer.php') ?>