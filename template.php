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
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . htmlspecialchars($this->title) . '</title>
            
            <!-- Web icon (favicon) -->
            <link rel="icon" href="' . htmlspecialchars($this->icon) . '" type="image/x-icon">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRHS7h4c5yId5RXcgmgHX9DOalZ5F5e5c5rTkI5vF" crossorigin="anonymous">
        </head>
        <body>
        ';
    }

    // Method to output the footer section
    public function footer() {
        return '
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybQxGVihJZy5tyGA5RWgUpfF3vcI5zsmXHYFI2h65V8sntA8+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93J6SifRWgsMG+v9N6I3Z4zWusB5l96rPNEsFARw5yGc7moJ1S9gVreKQ5Pjq6" crossorigin="anonymous"></script>
        </body>
        </html>
        ';
    }
}
?>
