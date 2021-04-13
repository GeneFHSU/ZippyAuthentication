<?php include('header.php') ?>
<section>
    <?php if(!empty($login_message)) {?>
        <div style="color: red; font-weight: bold;"><?=$login_message?></div>
    <?php } ?>
    <div style="color: goldenrod; font-weight: bold;">Please fill in your credentials to log in.</div>
    <form action="/admin/index.php" method="POST" id="login">
        <input type="hidden" name="action" value="login">
        <div><label for="username">Username:</label></div>
        <div><input type="text" id="username" name="username"maxlength="255" required></div>
        <div><label for="password">Password:</label></div>
        <div><input type="password" id="password" name="password" maxlength="255" required></div>
        <div><input type="submit" value="Sign In" class="button blue button-slim" maxlength="15"></div>
    </form>
</section>
<?php include('footer.php') ?>