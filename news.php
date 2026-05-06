<!DOCTYPE html>
<html>
<head>
    <title>NCHC News</title>
    <style>
        body { 
            padding: 50px; 
            background: url("../team_logos/Ice-Bakcground.jpeg") fixed; 
            background-size: cover; 
            font-family: sans-serif; 
        }
        .news-item { 
            background: white; 
            margin-bottom: 20px; 
            padding: 20px; 
            border-left: 5px solid #333; 
        }
        .news-date { 
            color: #666; 
            font-size: 0.9em; 
        }
        #menu table { 
            text-align: center; 
            margin: 0 auto 30px auto; 
            border-collapse: collapse; 
            background: white; 
        }
        #menu td { 
            background-color: #333; 
            color: white; 
            font-weight: bold; 
            border: 1px solid #b8cce4; 
            width: 160px; 
        }
        #menu td a { 
            display: block; 
            padding: 14px 10px; 
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
        #menu td.logout-btn {
            background-color: #c0392b;
        }
        #menu td.logout-btn a {
            color: white;
        }
    </style>
</head>
<body>

    <div id="menu">
      <table border="1">
        <tr>
          <td><a href="home.php">Home</a></td>
          <td><a href="standings.php">Standings</a></td>
          <td><a href="around.php">Around The League</a></td>
          <td><a href="news.php">News</a></td>
          <td><a href="contact.php">Contact Us</a></td>
          
          <?php 
            session_start();
            if (isset($_SESSION['logged_in'])): 
          ?>
            <td class="logout-btn"><a href="logout.php">Logout</a></td>
          <?php else: ?>
            <td class="login-btn"><a href="login.php">Login</a></td>
          <?php endif; ?>
        </tr>
      </table>
    </div>

    <div style="max-width: 800px; margin: 0 auto;">
        <div class="news-item">
            <span class="news-date">April 21, 2026</span>
            <h3>NCHC Reveals 2026-2027 Conference Schedule</h3>
            <p>The league has officially released the slate for the upcoming season, featuring 120 conference games and the inclusion of St. Thomas.</p>
        </div>

        <div class="news-item">
            <span class="news-date">April 12, 2026</span>
            <h3>Tournament Moves to Campus Sites</h3>
            <p>For the first time in league history, the entire NCHC Frozen Faceoff will be held on campus sites starting in 2026, moving away from neutral-site venues.</p>
        </div>
    </div>

</body>
</html>