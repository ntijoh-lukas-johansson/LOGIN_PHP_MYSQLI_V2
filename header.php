<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Logsite</title>
</head>

<body>

    <header>

        <a href="index.php" class="logo">
            <img src="" alt="Website Logo">
        </a>

        <nav>
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<button class="button" type="button" name="init_log">Log</button>';
                }
            ?>
            <a href="#" class="button">Browse</a>
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<a href="profile.php" class="button">Profile</a>';
                }
            ?>
            <form id="search_form">
                <input type="text" name="search" placeholder="Search">
                <button class="button" type="submit" name="submit_search">Search</button>
            </form>
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<a href="inc/logout.inc.php" class="button">Log Out</a>';
                } else {
                    echo '<a href="login.php" class="button">Log in</a>';
                }
            ?>
        </nav>

    </header>