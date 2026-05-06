<?php
$search_term = trim($_REQUEST['player_name'] ?? '');

if (empty($search_term) && !isset($_REQUEST['player_name'])) {
    header("Location: home.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NCHC Search Results</title>
    <style>
        body {
            padding-left: 50px; padding-right: 50px;
            background-image: url("../team_logos/Ice-Bakcground.jpeg");
            background-size: cover;
            background-attachment: fixed;
            font-family: sans-serif;
        }
        #title { font-size: 26px; text-align: center; margin: 30px 0; font-weight: bold; }

        #menu table { text-align: center; margin: 0 auto 30px auto; border-collapse: collapse; background: white; }
        #menu td {
            background-color: #333; color: white; font-weight: bold; padding: 0;
            border: 1px solid #b8cce4; width: 160px;
        }
        #menu td a { display: block; padding: 14px 10px; color: white; text-decoration: none; }
        #menu td:hover { background-color: #b8cce4; }
        #menu td:hover a { color: #333; }

        /* Logout button styling */
        #menu td.logout-btn {
            background-color: #c0392b;
        }
        #menu td.logout-btn a {
            color: white;
        }

        .results-table {
            margin: 0 auto;
            width: 85%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .results-table th {
            background-color: #333;
            color: white;
            padding: 12px;
        }
        .results-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .results-table tr:nth-child(even) { background-color: #b8cce4; }
    </style>
</head>
<body>

    <div style="text-align: center; margin-top: 20px;">
        <span id="title">NCHC Search Results</span>
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

    <?php
    include 'connection.inc';

    $query = "SELECT * FROM players 
              WHERE player_name LIKE ? 
              OR team LIKE ? 
              ORDER BY points DESC";
    
    $stmt = mysqli_prepare($con, $query);
    $like = "%" . $search_term . "%";
    mysqli_stmt_bind_param($stmt, "ss", $like, $like);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    echo "<h2 style='text-align:center;'>Results for: <strong>" . htmlspecialchars($search_term) . "</strong></h2>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='results-table' border='1'>";
        echo "<tr><th>Player</th><th>Team</th><th>Position</th><th>GP</th><th>G</th><th>A</th><th>PTS</th><th>+/-</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><strong>" . htmlspecialchars($row['player_name']) . "</strong></td>";
            echo "<td>" . htmlspecialchars($row['team']) . "</td>";
            echo "<td>" . htmlspecialchars($row['position']) . "</td>";
            echo "<td>" . $row['gp'] . "</td>";
            echo "<td>" . $row['goals'] . "</td>";
            echo "<td>" . $row['assists'] . "</td>";
            echo "<td><strong>" . $row['points'] . "</strong></td>";
            echo "<td>" . $row['plus_minus'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center; font-size:18px; color:red; background:white; display:block; padding:20px; width:50%; margin: 0 auto;'>No players found matching '<strong>" . htmlspecialchars($search_term) . "</strong>'.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    ?>

    <p style="text-align:center; margin-top:40px;">
        <a href="home.php">← Back to Home</a>
    </p>

</body>
</html>