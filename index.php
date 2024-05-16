<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Website Main Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 50px 20px;
    }
    h1 {
        color: #333;
        text-align: center;
    }
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        text-align: center;
    }
    li {
        margin-bottom: 10px;
    }
    li a {
        display: block;
        padding: 10px 20px;
        background-color: #f0f0f0;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s ease;
    }
    li a:hover {
        background-color: #e0e0e0;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Welcome to My Website</h1>
    <ul id="directoryList">
        <?php
        // Get directory listing
        $directories = glob('*', GLOB_ONLYDIR);
        foreach ($directories as $directory) {
            echo "<li><a href=\"/{$directory}/\">{$directory}</a></li>";
        }
        ?>
    </ul>
</div>
</body>
</html>
