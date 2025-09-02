<!DOCTYPE HTML>
<html>
  <head>
    <title>Send Mail with  </title>
    <script>api Email</script>
  </head>
<body>
<form method="post">
   <input type="button" value="Send Email" onclick="sendEmail()"/>
</form>
<script type="text/javascript">
  Function sendEmail()  {
      Email.send({
    Host : "s1.maildns.net",
    To : 'rockyanantha7@gmail.com',
    From : "realanantha@gmail.com",
    Subject : "This is the subject",
    Body : "I this S Ananthapathmanapan for St Joseph's College"
}).then(
  message => alert(message)
); }
   
</script>
</body>
</html>