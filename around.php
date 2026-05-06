<!DOCTYPE html>
<html>
<head>
    <title>Around the League - NCHC</title>
    <style>
        body { 
            padding: 50px; 
            background: url("../team_logos/Ice-Bakcground.jpeg") fixed; 
            background-size: cover; 
            font-family: sans-serif; 
        }
        .content-box { 
            background: rgba(255, 255, 255, 0.9); 
            padding: 30px; 
            border-radius: 8px; 
            max-width: 900px; 
            margin: 0 auto; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.3); 
        }
        h1, h2 { 
            color: #333; 
            border-bottom: 2px solid #b8cce4; 
            padding-bottom: 10px; 
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

    <div class="content-box">
        <h1>Around the League</h1>
        <h2>Expansion: The St. Thomas Tommies</h2>
        <p>The NCHC is set to grow! Starting in the <strong>2026-27 season</strong>, the University of St. Thomas will officially join as the conference's 10th member. This marks a major shift in the landscape of college hockey in the Midwest.</p>
        
        <h3>Key Changes:</h3>
        <ul>
            <li><strong>New Travel Partners:</strong> St. Thomas will be paired with St. Cloud State for travel scheduling.</li>
            <li><strong>Tournament Format:</strong> Beginning in 2027, all 10 teams will qualify for the NCHC Frozen Faceoff.</li>
            <li><strong>The Venue:</strong> St. Thomas will host games at the brand-new 4,000-seat Lee & Penny Anderson Arena.</li>
        </ul>
    </div>

</body>
</html>