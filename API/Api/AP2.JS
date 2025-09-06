<!DOCTYPE html>
<html>
<head>
    <title>Send Mail with SMTPJS Api</title>
    <script src="https://smtpjs.com/v3/smtp.js"> </script>
         </head>
    <body>
   
    <form method="post">
        <input type="button" value="Send Email" onclick="sendEmail()" />
    </form>

    <script type="text/javascript">
    function sendEmail() { 
    Email.send({
                SecureToken : "C973D7AD-F097-4B95-91F4-40ABC5567812",
                From: "helpdesk@mail.sjctni.edu",
                To: "rockyanantha7@gmail.com",
                Subject: "Welcome",
                Body : "This Anand From ict in St Joseph's College",
                 }).then( 
                    alert("mail sent successfully")
                 )
                }
          
            
    </script>
</body>


</html>