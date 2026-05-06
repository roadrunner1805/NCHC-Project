<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - NCHC</title>
    <style>
        body { 
            padding: 50px; 
            background: url("../team_logos/Ice-Bakcground.jpeg") fixed; 
            background-size: cover; 
            font-family: sans-serif; 
        }
        .form-box { 
            background: white; 
            padding: 30px; 
            max-width: 600px; 
            margin: 0 auto; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.2); 
        }
        input, textarea { 
            width: 100%; 
            padding: 10px; 
            margin: 10px 0; 
            border: 1px solid #ccc; 
            box-sizing: border-box; 
        }
        button { 
            background: #333; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            cursor: pointer; 
            width: 100%; 
        }
        button:hover { 
            background: #b8cce4; 
            color: #333; 
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

    <div class="form-box">
        <h2>Contact the NCHC</h2>
        <p><strong>Office Location:</strong><br>
        1631 Mesa Avenue, Suite C<br>
        Colorado Springs, CO 80906</p>
        
        <p><strong>Email:</strong> info@nchchockey.com</p>

        <hr>
        <h3>Send us a Message</h3>
        <form action="#" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="How can we help?"></textarea>
            <button type="submit">Send Feedback</button>
        </form>
    </div>

</body>
</html>