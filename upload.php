<?php
session_start();
require_once 'includes/db_connect.php';

try {
    // Validate if files were uploaded
    if (!isset($_FILES['images']) || empty($_FILES['images']['name'][0])) {
        throw new Exception('No files uploaded.');
    }

    // Validate category
    if (!isset($_POST['category']) || empty($_POST['category'])) {
        throw new Exception('Category is required.');
    }

    $category = $_POST['category'];
    $uploadDir = 'assets/images/gallery/';
    $successCount = 0;
    $errorCount = 0;
    
    // Create upload directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Process each uploaded file
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        try {
            if ($_FILES['images']['error'][$key] !== UPLOAD_ERR_OK) {
                throw new Exception('Upload error occurred for ' . $_FILES['images']['name'][$key]);
            }

            // Validate file type
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $fileType = $_FILES['images']['type'][$key];
            if (!in_array($fileType, $allowedTypes)) {
                throw new Exception($_FILES['images']['name'][$key] . ' has invalid file type. Only JPG, PNG and GIF are allowed.');
            }

            // Generate unique filename
            $extension = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;

            // Move uploaded file
            if (!move_uploaded_file($tmp_name, $uploadDir . $filename)) {
                throw new Exception('Failed to move uploaded file ' . $_FILES['images']['name'][$key]);
            }

            // Save to database
            $stmt = $pdo->prepare("INSERT INTO gallery_photos (filename, category) VALUES (?, ?)");
            $stmt->execute([$filename, $category]);

            $successCount++;

        } catch (Exception $e) {
            $errorCount++;
            // Log the error or handle individual file upload failures
            error_log($e->getMessage());
        }
    }

    // Set appropriate message based on results
    if ($successCount > 0) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = $successCount . ' image(s) uploaded successfully!' . 
            ($errorCount > 0 ? ' ' . $errorCount . ' failed.' : '');
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Failed to upload any images.';
    }

} catch (Exception $e) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = $e->getMessage();
}

// Redirect back
header('Location: manage-gallery.php');
exit;
?> 