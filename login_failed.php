<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Failed - NCHC</title>
    <style>
      body {
        padding-left: 50px;
        padding-right: 50px;
        background-image: url("../team_logos/Ice-Bakcground.jpeg");
        background-size: cover;
        background-attachment: fixed;
        font-family: sans-serif;
      }

      #title {
        font-size: 25px;
        text-align: center;
        display: block;
        margin-top: 20px;
        margin-bottom: 20px;
        font-weight: bold;
      }

      /* Menu Bar */
      #menu table {
        text-align: center;
        margin: 0 auto;
        border-collapse: collapse;
      }

      #menu td {
        background-color: #333;
        color: white;
        font-weight: bold;
        padding: 0;
        border: 1px solid #b8cce4;
        cursor: pointer;
        width: 150px;
      }

      #menu td a {
        display: block;
        padding: 10px;
        color: white;
        text-decoration: none;
      }

      #menu td:hover {
        background-color: #b8cce4;
      }

      #menu td:hover a {
        color: #333;
      }

      #menu td.login-btn {
        background-color: #b8cce4;
      }
      #menu td.login-btn a {
        color: #333;
      }

      /* Error Container */
      .error-container {
        margin: 60px auto;
        width: 380px;
        background-color: white;
        border: 2px solid #721c24;
        border-radius: 10px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.3);
        padding: 40px;
        text-align: center;
      }

      .error-container h2 {
        color: #721c24;
        margin-top: 0;
      }

      .error-container p {
        font-size: 16px;
        color: #333;
        margin: 15px 0;
      }

      .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 30px;
        background-color: #333;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        font-size: 15px;
      }

      .btn:hover {
        background-color: #b8cce4;
        color: #333;
      }
    </style>
</head>
<body>

    <div style="text-align: center; margin-top: 20px;">
        <span id="title">NCHC Member Login</span>
    </div>

    <div id="menu">
      <table border="1">
        <tr>
          <td><a href="home.php">Home</a></td>
          <td><a href="standings.php">Standings</a></td>
          <td><a href="around.php">Around The League</a></td>
          <td><a href="news.php">News</a></td>
          <td><a href="contact.php">Contact Us</a></td>
          
          <?php if (isset($_SESSION['logged_in'])): ?>
            <td class="logout-btn"><a href="logout.php">Logout</a></td>
          <?php else: ?>
            <td class="login-btn"><a href="login.php">Login</a></td>
          <?php endif; ?>
        </tr>
      </table>
    </div>

    <div class="error-container">
        <h2>Login Failed</h2>
        <p>Invalid username or password.</p>
        <p>Please try again.</p>
        <a href="login.php" class="btn">← Try Again</a>
    </div>

</body>
</html>