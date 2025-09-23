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
    .navigation{
      max-width: 500px;
      margin: 0 auto;
      padding: 30px;
      border-radius: 12px;

    }

    ul {
	padding:30px;
	
  list-style-type: none;
  overflow: hidden;
  background:#00ffff;
   background-repeat: no-repeat;
   background-size: 1420px  100px;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  text-align: center;
  top: 0;
   border-radius:10px;
}

li {
  float: left;
  text-align: center;
}

li a {
  display: block;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #ccffff;
}

.active {
  background-color: #4CAF50;
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
      text-align: center;
      list-style: none;
    }
    ul.error-list li {
      margin: 5px 0;
    }
  </style>
</head>
<body>



    <body style="background: radial-gradient(circle at top, #ffffce , #e2f3e2);">
        <div style="text-align: right; color: blue; background-color: #580000; padding: 20px;">
            <span style="font-size: 30px; font-weight: bold; color: yellow; padding-bottom: 20px;">
                <center>St. Joseph's College (Autonomous), Tiruchirappalli.</center>
            </span>
        </div>
        <div id="navigation">
<div style="text-align: right; color:Blue; background-color: #dceef3ff; padding: 5px; margin-top: 10px; margin-bottom: 10px;;
background: linear-gradient(90deg,rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%)">;
    <span style="font-size: 30px; font-weight: bold; color: whitesmoke; padding-bottom: 10px;">
    <center>"Extension Department - Shepherd"</center>
</span> 
</div>
<ul>
  
	 <li><a href="#">&nbsp; </a></li>
  <li><a  href="Event1.php"><strong>Event Gallery</a></li>
  <li><a href="#">&nbsp;</a></li>
  <li><a href="admin.php"><strong> Shepherd Gallery</a></li>
   <li><a href="#">&nbsp;</a></li>
  <li><a href="merchant.php"><strong>Alumin Gallery</a></li>
  
</ul>

  </form>
</div>

</body>
</html>
