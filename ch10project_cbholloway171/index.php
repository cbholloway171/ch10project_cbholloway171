<?php
// ----- Page data -----
// Project name, author name, and the current date are stored in variables
// so they can be reused in the page output below.
$projectName = "Building a Dynamic Form with PHP";
$authorName = "Chandler Holloway";
$currentDate = date("F j, Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $projectName; ?></title>
    <!-- Link to the external stylesheet in the styles folder -->
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>

    <h1><?php echo $projectName; ?></h1>

    <p><?php echo $authorName; ?></p>

    <p><?php echo $currentDate; ?></p>

    <!--
        The form sends its data to confirm.php using the POST method.
        HTML5 validation: "required" on every field and type="email" on the email input.
    -->
    <form method="post" action="confirm.php">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <input type="text" id="message" name="message" required>

        <input type="submit" value="Submit">

    </form>

</body>
</html>
