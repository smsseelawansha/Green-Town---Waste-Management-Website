<?PHP include("templates/nav1.php"); 
?>
<link href="com/style.css" rel="stylesheet" type="text/css">

<style> input[type="text"], input[type="email"], textarea { margin:0 !important }</style>

<body>
   <center>
    <br><br>
  <h1 style="font-size:32; font-weight:800">Add Complain Here </h1><br>
  <form action="submit.php" method="POST" style="    padding-top: 50px;">
    <table>
      <tr>
        <td>
    <label for="name">Name:</label>
       </td>
    <td>
    <input type="text" id="name" name="name" required><br><br>
    </td>
      </tr>
      <tr>
        <td>
    <label for="email">Email:</label>
  </td>
  <td>
    <input type="email" id="email" name="email" required><br><br>
  </td>
</tr>
<tr>
  <td>
    <label for="subject">Subject:</label>
  </td>
  <td>
    <input type="text" id="subject" name="subject" required><br><br>
  </td>
</tr>
<tr>
  <td>
    <label for="message">Message:</label><br>
  </td>
  <td>
    <textarea id="message" name="message" rows="5" cols="30" required></textarea><br><br>
  </td>
</tr>
</table>
    <input type="submit" value="Submit">
  </form>
</center>
</body>
</html>
