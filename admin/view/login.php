<?php include('header.php') ?>
<section>
    <?php if (!empty($firstname)) {?>
        <div>
            <p style="color:#d08504; font-size: 1.5rem; font-weight: bold">
                Thank you for registering, <?=$firstname ?>!
            </p>
        </div>
        <div>
            <a href="index.php">Click here</a> to view our vehicle list.
        </div>
    <?php } else {?>
        <div style="color: goldenrod; font-weight: bold; font-size: larger;">Please fill in your credentials to log in.</div>
        <form action="/admin/index.php" method="POST" id="login">
            <input type="hidden" name="action" value="login">
            <div><label for="username">Username:</label></div>
            <div><input type="text" id="username" name="username"maxlength="255"></div>
            <div><label for="password">Password:</label></div>
            <div><input type="password" id="password" name="password" maxlength="255"></div>
            <div><input type="submit" value="Sign In" class="button blue button-slim" maxlength="15"></div>
        </form>
    <?php } ?>
</section>
<?php include('footer.php') ?>