<?php
session_start();

// Session check - if not logged in, boot them back to login page
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NCHC Stats & News</title>
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

      /* Logout button */
      #menu td.logout-btn {
        background-color: #c0392b;
      }

      #menu td.logout-btn a {
        color: white;
      }

      #menu td.logout-btn:hover {
        background-color: #e74c3c;
      }

      /* Welcome banner */
      .welcome-banner {
        text-align: center;
        background-color: rgba(184, 204, 228, 0.85);
        padding: 10px;
        margin: 15px auto;
        width: 50%;
        border-radius: 8px;
        font-weight: bold;
        color: #333;
        border: 1px solid #333;
      }

      /* Section headers */
      .section-title {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        margin-top: 40px;
        margin-bottom: 15px;
        color: #333;
      }

      /* Leaders Table */
      .leaders-table {
        text-align: center;
        margin: 0 auto;
        background-color: white;
        border-collapse: collapse;
        width: 70%;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      }

      .leaders-table th {
        background-color: #333;
        color: white;
        padding: 10px;
      }

      .leaders-table tr:nth-child(even) {
        background-color: #b8cce4;
      }

      .leaders-table tr:nth-child(odd) {
        background-color: #dce6f1;
      }

      .leaders-table td {
        padding: 10px;
      }

      /* Transfer Portal Cards */
      .portal-container {
        width: 70%;
        margin: 20px auto 50px auto;
      }

      .portal-card {
        background-color: white;
        border: 2px solid #333;
        border-radius: 8px;
        padding: 18px 22px;
        margin-bottom: 16px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.15);
      }

      .portal-card .headline {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin-bottom: 6px;
      }

      .portal-card .detail {
        font-size: 13px;
        color: #555;
      }

      .portal-card .tag {
        display: inline-block;
        font-size: 11px;
        font-weight: bold;
        padding: 3px 8px;
        border-radius: 4px;
        margin-bottom: 8px;
      }

      .tag-entering  { background-color: #d4edda; color: #155724; }
      .tag-departing { background-color: #f8d7da; color: #721c24; }
      .tag-committed { background-color: #b8cce4; color: #333; }
    </style>
</head>
<body>

    <div style="text-align: center; margin-top: 20px;">
        <span id="title">NCHC League Leaders &amp; Transfer Portal</span>
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

    <div class="welcome-banner">
        Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! You are viewing member-only content.
    </div>

    <?php
    // League Leaders - Category, Player, Team, Stat
    $leaders = array(
        array("Goals",      "Jack Devine",    "Denver",            "25 G"),
        array("Assists",    "Luke Grainger",  "Western Michigan",  "33 A"),
        array("Points",     "Jackson Blake",  "North Dakota",      "48 PTS"),
        array("Plus/Minus", "Riese Gaber",    "North Dakota",      "+22"),
        array("GAA",        "Zach Aucoin",    "North Dakota",      "2.01"),
        array("Save %",     "Cameron Rowe",   "Western Michigan",  ".928"),
        array("Shutouts",   "Zach Aucoin",    "North Dakota",      "4 SO"),
        array("PIM",        "Marcus Thrane",  "St. Cloud State",   "30 PIM")
    );

    // Transfer Portal - Status, Headline, Detail
    $portal = array(
        array("committed", "Tyler Weston (F) Commits to Denver", "Forward Tyler Weston, formerly of Arizona State, has officially committed to Denver for the 2026-27 season. Weston recorded 14 goals and 11 assists in 35 games last year and is expected to slot into a top-six role immediately."),
        array("departing", "Cole Knuble (F) Enters Transfer Portal", "Denver forward Cole Knuble has entered the transfer portal following his junior season. Knuble posted 14 goals and 24 assists this year and is expected to draw significant interest from programs across the country."),
        array("entering", "Marcus Thrane (F) Enters Portal from St. Cloud State", "St. Cloud State forward Marcus Thrane has entered the transfer portal. Despite leading the team in penalty minutes this season, Thrane contributed 15 goals and is considered a high-impact transfer target heading into the offseason."),
        array("committed", "Goalie Devon Hale Commits to Minnesota Duluth", "Goaltender Devon Hale, a sophomore transfer from Omaha, has committed to Minnesota Duluth. Hale went 10-12 last season with a .902 save percentage and is expected to compete for the starting job next fall."),
        array("departing", "Aiden Dubinsky (F) Explores Options After Strong Season", "Minnesota Duluth forward Aiden Dubinsky has entered the portal after finishing with 35 points this season. Multiple NCHC programs are reportedly in contact, with North Dakota and Western Michigan among the frontrunners."),
        array("committed", "Defenseman Jake Perreault Commits to Western Michigan", "Blueliner Jake Perreault has committed to Western Michigan after one season at Colorado College. Perreault averaged over 20 minutes of ice time per game and is seen as a key piece for the Broncos' defensive core next year.")
    );
    ?>

    <!-- League Leaders Table -->
    <div class="section-title">NCHC League Leaders</div>
    <table border="1" class="leaders-table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Player</th>
                <th>Team</th>
                <th>Stat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($leaders as $row) {
                echo "<tr>";
                echo "<td style='font-weight: bold;'>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td style='font-weight: bold;'>" . $row[3] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Transfer Portal News -->
    <div class="section-title">Transfer Portal News</div>
    <div class="portal-container">
        <?php
        foreach ($portal as $item) {
            $status   = $item[0];
            $headline = $item[1];
            $detail   = $item[2];

            if ($status == "committed") {
                $tag_class = "tag-committed";
                $tag_label = "Committed";
            } elseif ($status == "departing") {
                $tag_class = "tag-departing";
                $tag_label = "Entering Portal";
            } else {
                $tag_class = "tag-entering";
                $tag_label = "In Portal";
            }

            echo "<div class='portal-card'>";
            echo "<span class='tag " . $tag_class . "'>" . $tag_label . "</span>";
            echo "<div class='headline'>" . $headline . "</div>";
            echo "<div class='detail'>" . $detail . "</div>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>