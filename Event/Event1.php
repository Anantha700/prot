<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Gallery Form</title>
  <style>
    /* --- Base Page --- */
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: #f5f5f5;
      padding: 40px;
    }
    h2 {
      text-align: center;
      color: #333;
    }

    /* --- Form Container --- */
    .form-wrapper {
      background: #fff;
      max-width: 500px;
      margin: 0 auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* --- Labels and Inputs --- */
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 6px;
      color: #444;
    }
    input[type="text"],
    input[type="date"],
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      font-size: 14px;
    }
    textarea {
      resize: vertical;
      min-height: 100px;
    }

    /* --- Submit Button --- */
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
      transition: background 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }

    /* --- Error List --- */
    ul.error-list {
      background: #ffe0e0;
      border: 1px solid #ff9999;
      color: #b30000;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      list-style: none;
    }
    ul.error-list li {
      margin: 5px 0;
    }
  </style>
</head>
<body>

<?php
// ---------- PHP Section ----------
$eventName = $Departments = $eventDate = $description = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function clean($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $eventName   = clean($_POST["event_name"] ?? "");
    $Departments = clean($_POST["Departments"] ?? "");
    $eventDate   = clean($_POST["event_date"] ?? "");
    $description = clean($_POST["description"] ?? "");

    if (empty($eventName))   $errors[] = "Event name is required.";
    if (empty($Departments)) $errors[] = "Valid Departments is required.";
    if (empty($eventDate))   $errors[] = "Event date is required.";
    if (empty($description)) $errors[] = "Description is required.";

    if (!isset($_FILES['event_image']) || $_FILES['event_image']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Please upload an image for the gallery.";
    } else {
        $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
        $type = mime_content_type($_FILES['event_image']['tmp_name']);
        $size = $_FILES['event_image']['size'];
        if (!in_array($type, $allowed)) {
            $errors[] = "Only JPG, PNG, GIF or WEBP images allowed.";
        }
        if ($size > 2 * 1024 * 1024) {
            $errors[] = "Image must be under 2 MB.";
        }
    }

    if (!$errors) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $ext = pathinfo($_FILES['event_image']['name'], PATHINFO_EXTENSION);
        $newName = uniqid('event_', true) . "." . $ext;
        move_uploaded_file($_FILES['event_image']['tmp_name'], $uploadDir . $newName);

        echo "<div class='form-wrapper'>";
        echo "<h2>Event Saved:</h2>";
        echo "<strong>Name:</strong> $eventName<br>";
        echo "<strong>Departments:</strong> $Departments<br>";
        echo "<strong>Date:</strong> $eventDate<br>";
        echo "<strong>Description:</strong> $description<br>";
        echo "<img src='uploads/" . htmlspecialchars($newName) . "' width='300'><br>";
        echo "</div>";
    } else {
        echo "<div class='form-wrapper'><ul class='error-list'>";
        foreach ($errors as $e) echo "<li>" . htmlspecialchars($e) . "</li>";
        echo "</ul></div>";
    }
}

?>
    <body style="background: radial-gradient(circle at top, #ffffce , #e2f3e2);">
        <div style="text-align: right; color: blue; background-color: #580000; padding: 20px;">
            <span style="font-size: 30px; font-weight: bold; color: yellow; padding-bottom: 20px;">
                <center>St. Joseph's College (Autonomous), Tiruchirappalli.</center>
            </span>
        </div>
        <div id="navigation">
<div style="text-align: right; color:Blue; background-color: #dceef3ff; padding: 5px; margin-top: 10px; margin-bottom:10px ;
background: linear-gradient(90deg,rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%)">;
    <span style="font-size: 30px; font-weight: bold; color: whitesmoke; padding-bottom: 10px;"> 
    <center>"Extension Department - Shepherd"</center>
</span> 
</div>
                                           
                          

<div class="form-wrapper">
  <h2>Event Gallery Submission</h2>
  <form method="post" action="" enctype="multipart/form-data">
    <label for="event_name">Event Name</label>
    <input type="text" id="event_name" name="event_name"
           value="<?=htmlspecialchars($eventName)?>">

    <label for="Departments">Department</label>
    <input type="text" id="Departments" name="Departments"
           value="<?=htmlspecialchars($Departments)?>">

    <label for="event_date">Event Date</label>
    <input type="date" id="event_date" name="event_date"
           value="<?=htmlspecialchars($eventDate)?>">

    <label for="description">Description</label>
    <textarea id="description" name="description"
              rows="4"><?=htmlspecialchars($description)?></textarea>

    <label for="event_image">Upload Gallery Image</label>
    <input type="file" id="event_image" name="event_image" accept="image/*">

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
