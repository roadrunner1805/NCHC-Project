<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>NCHC Login</title>
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
        width: 100%;
        height: 100%;
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

      #menu td.login-btn:hover {
        background-color: #9ab8d8;
      }

      /* Logout Button Style */
      #menu td.logout-btn {
        background-color: #c0392b;
      }
      #menu td.logout-btn a {
        color: white;
      }

      /* Login Box */
      .login-container {
        margin: 60px auto;
        width: 380px;
        background-color: white;
        border: 2px solid #333;
        border-radius: 10px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.3);
        padding: 40px;
      }

      .login-container h2 {
        text-align: center;
        margin-top: 0;
        margin-bottom: 25px;
        color: #333;
        font-size: 22px;
      }

      .login-container label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
        color: #333;
      }

      .login-container input[type="text"],
      .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #999;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
      }

      .login-container input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #333;
        color: white;
        font-weight: bold;
        font-size: 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .login-container input[type="submit"]:hover {
        background-color: #b8cce4;
        color: #333;
      }

      /* Error message */
      .error-msg {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 14px;
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

    <div class="login-container">
        <h2>Member Login</h2>

        <?php
        // Show error message if login failed
        if (isset($_GET['error']) && $_GET['error'] == '1') {
            echo "<div class='error-msg'>Invalid username or password. Please try again.</div>";
        }
        ?>

        <form action="login_handler.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>