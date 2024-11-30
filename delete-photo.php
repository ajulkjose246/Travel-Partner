<?php
session_start();
require_once 'includes/db_connect.php';

try {
    if (!isset($_POST['photo_id'])) {
        throw new Exception('No photo ID provided.');
    }

    $photoId = $_POST['photo_id'];

    // Get photo filename from database
    $stmt = $pdo->prepare("SELECT filename FROM gallery_photos WHERE id = ?");
    $stmt->execute([$photoId]);
    $photo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$photo) {
        throw new Exception('Photo not found.');
    }

    // Delete file from server
    $filepath = 'assets/images/gallery/' . $photo['filename'];
    if (file_exists($filepath) && !unlink($filepath)) {
        throw new Exception('Failed to delete photo file.');
    }

    // Delete record from database
    $stmt = $pdo->prepare("DELETE FROM gallery_photos WHERE id = ?");
    $stmt->execute([$photoId]);

    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Photo deleted successfully!';

} catch (Exception $e) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = $e->getMessage();
}

// Redirect back
header('Location: manage-gallery.php');
exit;