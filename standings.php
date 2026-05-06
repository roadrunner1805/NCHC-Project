<!DOCTYPE html>
<html>
<head>
    <title>NCHC Dynamic Standings</title>
    <style>
      /* Main Page Styles */
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

      /* Menu Bar Styles */
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

      /* Login / Logout button styles */
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

      /* Standings Table Styles */
      .standings-table {
        text-align: center;
        margin: 0 auto;
        background-color: white;
        border-collapse: collapse;
        width: 90%;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      }

      .standings-table th {
        background-color: #333;
        color: white;
        padding: 10px;
      }

      .standings-table tr:nth-child(even) {
        background-color: #b8cce4;
      }

      .standings-table tr:nth-child(odd) {
        background-color: #dce6f1;
      }
    </style>
</head>
<body>

    <div style="text-align: center; margin-top: 20px;">
        <span id="title">NCHC Dynamic Standings</span>
    </div>

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

    <?php
    // Data stored in Indexed Arrays
    $team1 = array("North Dakota", 54, 23, "17-5-1", "1-3", 0, "93-54", 33, "25-7-1", ".818", "128-75");
    $team2 = array("Denver", 49, 23, "16-6-1", "2-1", 1, "78-50", 34, "20-11-3", ".662", "118-77");
    $team3 = array("Western Michigan", 46, 23, "15-7-1", "2-1", 1, "85-62", 33, "23-9-1", ".727", "123-80");
    $team4 = array("Minnesota Duluth", 34, 23, "11-12-0", "3-4", 0, "62-64", 33, "20-13-0", ".667", "108-83");
    $team5 = array("St. Cloud State", 30, 24, "9-14-1", "1-2", 1, "73-86", 34, "16-17-1", ".515", "108-106");
    $team6 = array("Colorado College", 28, 23, "7-11-5", "2-3", 1, "61-64", 33, "13-15-5", ".515", "90-89");
    $team7 = array("Miami", 25, 23, "8-13-2", "3-1", 1, "56-72", 33, "17-14-2", ".561", "98-97");
    $team8 = array("Omaha", 24, 23, "8-15-0", "0-0", 0, "55-82", 33, "12-21-0", ".364", "89-115");
    $team9 = array("Arizona State", 22, 23, "7-15-1", "2-1", 1, "61-90", 35, "14-20-1", ".429", "105-128");

    $standings = array($team1, $team2, $team3, $team4, $team5, $team6, $team7, $team8, $team9);
    ?>

    <div style="margin-top: 40px">
        <table border="1" class="standings-table">
            <thead>
                <tr>
                    <th style="text-align: left">Team</th>
                    <th>PTS</th>
                    <th>CONF. GP</th>
                    <th>CONF. W-L-T</th>
                    <th>OW-OLS</th>
                    <th>WCONF.</th>
                    <th>GF-GA</th>
                    <th>GP</th>
                    <th>OVERALL W-L-T</th>
                    <th>WIN%</th>
                    <th>GF-GA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($standings as $row) {
                    echo "<tr>";
                    echo "<td style='padding: 10px; font-weight: bold; text-align: left;'>" . $row[0] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[1] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[2] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[3] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[4] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[5] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[6] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[7] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[8] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[9] . "</td>";
                    echo "<td style='padding: 10px;'>" . $row[10] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>