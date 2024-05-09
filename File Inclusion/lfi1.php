<?php include("../common/header.php"); ?>

<!-- from https://pentesterlab.com/exercises/php_include_and_post_exploitation/course -->
<?php hint("will include the arg specified in the GET parameter \"page\""); ?>

<form action="/LFI-1/index.php" method="GET">
    <input type="text" name="page">
</form>

<?php
// Define a whitelist of allowed files/directories
$allowed_files = array(
    "page1.php",
    "page2.php",
    // Add more allowed files here
);

// Check if the requested file is in the whitelist
if (isset($_GET["page"]) && in_array($_GET["page"], $allowed_files)) {
    include($_GET["page"]);
} else {
    // Handle invalid or unauthorized requests
    echo "Invalid page requested";
}
?>
