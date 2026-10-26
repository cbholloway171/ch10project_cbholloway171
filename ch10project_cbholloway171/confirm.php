<?php
// ----- Page data -----
// Project name, author name, and the current date used in the page output.
$projectName = "Building a Dynamic Form with PHP";
$authorName = "Chandler Holloway";
$currentDate = date("F j, Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation - <?php echo $projectName; ?></title>
    <!-- Link to the external stylesheet in the styles folder -->
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>

    <h1><?php echo $projectName; ?></h1>

    <p><?php echo $authorName; ?></p>

    <p><?php echo $currentDate; ?></p>

    <?php
    // ----- Form submission check -----
    // Only process the data if the page was reached by submitting the form (POST request).
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // ----- Retrieval and trimming -----
        // Store the submitted values from the $_POST array in variables.
        // trim() removes unnecessary whitespace from the start and end of each input.
        // The ?? "" fallback prevents warnings if a field is missing.
        $name = trim($_POST["name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $message = trim($_POST["message"] ?? "");

        // ----- Sanitization -----
        // Remove illegal characters from the email address.
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // ----- Validation -----
        // Check whether any field is empty. If so, store an error message
        // and assign it the CSS class "error".
        if ($name === "" || $email === "" || $message === "") {
            $output = "Error: All fields are required. Please go back and complete the form.";
            $class = "error";
        } else {
            // All inputs are valid, so build a confirmation message from the submitted
            // values and assign it the CSS class "success".
            // htmlspecialchars() prevents user input from being run as HTML.
            $output = "Thank you, " . htmlspecialchars($name) . "! Your message has been received.";
            $class = "success";
        }

        // ----- Display the message -----
        // Show the error or success message inside a styled div.
        echo "<div class=\"confirmation $class\">$output</div>";

        // ----- Display the submitted data -----
        // Below the message, show each submitted value (only when valid).
        if ($class === "success") {
            echo "<div class=\"submitted-data\">";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Message:</strong> " . htmlspecialchars($message) . "</p>";
            echo "</div>";
        }

    } else {
        // ----- No submission -----
        // If the page was opened directly (not through the form), show an error.
        echo "<div class=\"confirmation error\">No form data was submitted.</div>";
    }
    ?>

    <p><a href="index.php">Back to the form</a></p>

</body>
</html>
