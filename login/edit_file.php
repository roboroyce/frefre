<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get file path and content from form
    $file_path = $_POST["file_path"];
    $file_content = $_POST["file_content"];
    
    // Open the file for writing
    $file = fopen($file_path, "w") or die("Unable to open file!");
    
    // Write the new content to the file
    fwrite($file, $file_content);
    
    // Close the file
    fclose($file);
    
    // Display success message
    echo "File edited successfully!";
}
?>
