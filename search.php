<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NCHC Player Search</title>
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
      #menu td.logout-btn {
        background-color: #c0392b;
      }
      #menu td.logout-btn a {
        color: white;
      }

      .search-container {
        margin: 40px auto;
        width: 60%;
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      }

      .search-container input[type="text"] {
        width: 70%;
        padding: 12px;
        font-size: 16px;
        border: 2px solid #333;
        border-radius: 5px;
      }

      .search-container input[type="submit"] {
        padding: 12px 25px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
      }
    </style>
</head>
<body>

    <div style="text-align: center; margin-top: 20px;">
        <span id="title">NCHC Player Search</span>
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
            <td><a href="search.php">Player Search</a></td>
            <td class="logout-btn"><a href="logout.php">Logout</a></td>
          <?php else: ?>
            <td class="login-btn"><a href="login.php">Login</a></td>
          <?php endif; ?>
        </tr>
      </table>
    </div>

    <div class="search-container">
        <h2 style="text-align:center;">Search NCHC Players</h2>
        <form action="searchresult.php" method="POST">
            <p>Enter player name (partial match):</p>
            <input type="text" name="player_name" placeholder="e.g. Blake or Devine" required>
            <input type="submit" value="Search">
        </form>
    </div>

</body>
</html>