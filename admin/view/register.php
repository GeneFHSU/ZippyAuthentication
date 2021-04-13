<?php include('header.php') ?>
    <section>
            <div style="color: goldenrod; font-weight: bold; font-size: larger;">Register a new admin user</div>
            <?php if (!empty($errors)) { ?>
                <div>
                    <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php } ?>
            <form action="." method="POST" id="register">
                <input type="hidden" name="action" value="register">
                <div><label for="username">Username:</label></div>
                <div><input type="text" id="username" name="username" maxlength="255" required></div>
                <div><label for="password">Password:</label></div>
                <div><input type="password" id="password" name="password" maxlength="255" required></div>
                <div><label for="confirm_password">Confirm Password:</label></div>
                <div><input type="password" id="confirm_password" name="confirm_password" maxlength="255" required></div>
                <div><input type="submit" value="Register" class="button blue button-slim"></div>
            </form>
    </section>
<?php include('footer.php') ?>