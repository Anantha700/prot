<!DOCTYPE html>
<html>
<head>
  <title>Send Mail</title>
</head>
<body>
  <form id="mailForm">
    <button type="submit">Send Email</button>
  </form>

  <script>
    document.getElementById('mailForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const res = await fetch('send_mail.php', { method: 'POST' });
      const data = await res.text();
      alert('Server response: ' + data);
    });
  </script>
</body>
</html>
