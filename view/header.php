<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>
    <main>
        <header>
            <div style="text-align: right">
                <?php /*If the user is on the register page, do not display username. Otherwise display. */?>
                <?php if(($action != "register") && ($action != "logout")) {?>
                    <?php if(isset($_SESSION['userid'])) {?>
                        Welcome <?=$_SESSION['userid']?>! <a href="index.php?action=logout">(Sign Out)</a>
                    <?php } else {?>
                        <a href="index.php?action=register">Register</a>
                    <?php } ?>
                <?php } ?>
            </div>

            <h1>Zippy Used Autos</h1>
        </header>