<?php
include 'template.php';
$title = "My Custom Page";
$icon = "custom-favicon.ico";
$template = new Template($title, $icon);
echo $template->header();
?>

<h1> Shahrear Al Sakib </h1>

<?php
echo $template->footer();
?>
