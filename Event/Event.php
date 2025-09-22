<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Event Gallery Form</title>
</head>
<body>

<?php
// ---------- 1. Initialise ----------
$eventName = $Departments = $eventDate = $description = "";
$errors = [];

// ---------- 2. Handle POST ----------
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Helper to clean text input
    function clean($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // --- Text fields ---
    $eventName   = clean($_POST["event_name"] ?? "");
    $Departments       = clean($_POST["Departments"] ?? "");
    $eventDate   = clean($_POST["event_date"] ?? "");
    $description = clean($_POST["description"] ?? "");
   

    // --- Validation ---
    if (empty($eventName))   $errors[] = "Event name is required.";
   if (empty($Departments)) $errors[] = "Valid Departments is required.";
    if (empty($eventDate))   $errors[] = "Event date is required.";
    if (empty($description)) $errors[] = "Description is required.";
    

    // --- File upload (single image) ---
    if (!isset($_FILES['event_image']) || $_FILES['event_image']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Please upload an image for the gallery.";
    } else {
        $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
        $type = mime_content_type($_FILES['event_image']['tmp_name']);
        $size = $_FILES['event_image']['size'];
        if (!in_array($type, $allowed)) {
            $errors[] = "Only JPG, PNG, GIF or WEBP images allowed.";
        }
        if ($size > 2*1024*1024) {
            $errors[] = "Image must be under 2 MB.";
        }
    }

    // --- Save if OK ---
    if (!$errors) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $ext = pathinfo($_FILES['event_image']['name'], PATHINFO_EXTENSION);
        $newName = uniqid('event_', true) . "." . $ext;
        move_uploaded_file($_FILES['event_image']['tmp_name'], $uploadDir . $newName);

        echo "<h2>Event Saved:</h2>";
        echo "<strong>Name:</strong> $eventName<br>";
        echo "<strong>Departments:</strong> $Departments<br>";
        echo "<strong>Date:</strong> $eventDate<br>";
        echo "<strong>Description:</strong> $description<br>";
        echo "<img src='uploads/" . htmlspecialchars($newName) . "' width='300'><br>";
    } else {
        echo "<ul style='color:red'>";
        foreach ($errors as $e) echo "<li>" . htmlspecialchars($e) . "</li>";
        echo "</ul>";
    }
}
?>

<!-- ---------- 3. HTML Form ---------- -->
<h2>Event Gallery Submission</h2>
<form method="post" action="" enctype="multipart/form-data">
  Event Name: <input type="text" name="event_name" value="<?=htmlspecialchars($eventName)?>"><br><br>

  Department: <input type="text" name="Departments"value="<?=htmlspecialchars($Departments)?>"><br><br>

  Event Date: <input type="date" name="event_date" value="<?=htmlspecialchars($eventDate)?>"><br><br>
  Description: <textarea name="description" rows="4" cols="40"><?=htmlspecialchars($description)?></textarea><br><br>

  Upload Gallery Image: <input type="file" name="event_image" accept="image/*"><br><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>