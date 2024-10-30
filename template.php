<?php
class Template {
    public $title;
    public $icon;

    // Constructor to initialize title and icon
    function __construct($title = 'Default Title', $icon = 'favicon.ico') {
        $this->title = $title;
        $this->icon = $icon;
    }

    // Method to output the header section
    public function header() {
        return '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>' . htmlspecialchars($this->title) . '</title>
            
            <!-- Web icon (favicon) -->
            <link rel="icon" href="' . htmlspecialchars($this->icon) . '" type="image/x-icon">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>';
    }

    // Method to output the footer section
    public function footer() {
        return '
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        ';
    }
}
?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
