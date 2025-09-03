
<html>
  <head>
    <title>Send Mail with  </title>
    <script>api Email</script>
  </head>
<body>
<form method="post">
   <input type="button" value="Send Email" onclick="sendEmail()"/>
</form>
<script>
function sendEmail() {
  fetch("http://localhost:3000/send-email", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      to: "rockyanantha7@gmail.com",
      subject: "This is the subject",
      body: "I am S Ananthapathmanapan from St Joseph's College"
    })
  })
  .then(res => res.text())
  .then(data => alert(data));
}
</script>
</body>
</html>

