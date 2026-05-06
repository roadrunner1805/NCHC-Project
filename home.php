<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <title>NCHC - Home</title>
    <style>
        body {
            padding-left: 50px;
            padding-right: 50px;
            background-image: url("../team_logos/Ice-Bakcground.jpeg");
            background-size: cover;
            background-attachment: fixed;
            font-family: sans-serif;
            margin: 0;
        }

        .header {
            position: relative;
            text-align: center;
            margin-bottom: 15px;
        }

        #title {
            font-size: 28px;
            font-weight: bold;
            margin: 25px 0 15px 0;
        }

        /* Menu Bar */
        #menu table {
            text-align: center;
            margin: 0 auto 30px auto;
            border-collapse: collapse;
        }

        #menu td {
            background-color: #333;
            color: white;
            font-weight: bold;
            padding: 0;
            border: 1px solid #b8cce4;
            width: 150px;
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

        /* Login Button Style */
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

        /* Search Bar */
        .top-search {
            position: absolute;
            top: 28px;
            right: -35px;
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 100;
        }

        .top-search input[type="text"] {
            padding: 10px 16px;
            width: 260px;
            border: 2px solid #333;
            border-radius: 25px;
            font-size: 15px;
            background-color: rgba(255, 255, 255, 0.95);
        }

        .top-search input[type="submit"] {
            padding: 10px 24px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
        }

        .top-search input[type="submit"]:hover {
            background-color: #b8cce4;
            color: #333;
        }

        /* === MATCHUPS STYLES === */
        .matchups-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .matchups-wrapper {
            border: 3px solid #333;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            gap: 15px;
            background-color: rgba(184, 204, 228, 0.45);
        }

        .matchup-table {
            border: 2px solid #333;
            border-collapse: collapse;
            box-shadow: 0 4px #333;
        }

        .matchup-table td {
            padding: 10px;
            background-color: #dce6f1;
            text-align: center;
        }

        .team-logo-cell img {
            width: 50px;
            height: 50px;
        }

        .team-name-cell {
            font-weight: bold;
            font-size: 12px;
            background-color: #333;
            color: white;
            width: 90px;
        }

        .score-cell {
            font-size: 18px;
            font-weight: bold;
            width: 30px;
        }

        .vs-cell {
            font-size: 14px;
            font-weight: bold;
            background-color: #b8cce4;
        }

        .game-info-cell {
            color: #333;
            font-size: 11px;
            border-top: 2px solid #333;
            background-color: #b8cce4;
        }

        .leader-table tr:nth-child(even) {
            background-color: #b8cce4;
        }

        .leader-table tr:nth-child(odd) {
            background-color: #dce6f1;
        }
    </style>
</head>
<body>

    <div class="header">
        <span id="title">NCHC Mock Website</span>
        <!-- Search Bar -->
        <div class="top-search">
            <form action="searchresult.php" method="POST" style="display: flex; align-items: center; gap: 8px;">
                <input type="text" name="player_name" placeholder="Search players..." />
                <input type="submit" value="Go" />
            </form>
        </div>
    </div>

    <!-- Menu -->
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

    <!-- Matchups -->
    <div class="matchups-container">
        <div class="matchups-wrapper">

            <table class="matchup-table">
                <tr>
                    <td class="team-logo-cell"><img src="../team_logos/CC.jpeg" alt="CC Logo" /></td>
                    <td class="vs-cell" rowspan="2">VS</td>
                    <td class="team-logo-cell"><img src="../team_logos/DU.jpeg" /></td>
                </tr>
                <tr>
                    <td class="team-name-cell">Colorado College</td>
                    <td class="team-name-cell">Denver</td>
                </tr>
                <tr>
                    <td class="score-cell">1</td>
                    <td class="vs-cell"></td>
                    <td class="score-cell">4</td>
                </tr>
                <tr>
                    <td colspan="3" class="game-info-cell">Feb 7, 2026<br />7:00 PM MT</td>
                </tr>
            </table>

            <table class="matchup-table">
                <tr>
                    <td class="team-logo-cell"><img src="../team_logos/ND.jpeg" alt="ND Logo" /></td>
                    <td class="vs-cell" rowspan="2">VS</td>
                    <td class="team-logo-cell"><img src="../team_logos/MD.jpeg" alt="MN Logo" /></td>
                </tr>
                <tr>
                    <td class="team-name-cell">North Dakota</td>
                    <td class="team-name-cell">Minnesota Duluth</td>
                </tr>
                <tr>
                    <td class="score-cell">4</td>
                    <td class="vs-cell"></td>
                    <td class="score-cell">1</td>
                </tr>
                <tr>
                    <td colspan="3" class="game-info-cell">Feb 7, 2026<br />7:00 PM MT</td>
                </tr>
            </table>

            <table class="matchup-table">
                <tr>
                    <td class="team-logo-cell"><img src="../team_logos/WM.jpeg" alt="WM Logo" /></td>
                    <td class="vs-cell" rowspan="2">VS</td>
                    <td class="team-logo-cell"><img src="../team_logos/Miami.jpeg" alt="Miami Logo" /></td>
                </tr>
                <tr>
                    <td class="team-name-cell">Western Michigan</td>
                    <td class="team-name-cell">Miami</td>
                </tr>
                <tr>
                    <td class="score-cell">3</td>
                    <td class="vs-cell"></td>
                    <td class="score-cell">1</td>
                </tr>
                <tr>
                    <td colspan="3" class="game-info-cell">Feb 7, 2026<br />7:00 PM MT</td>
                </tr>
            </table>

            <table class="matchup-table">
                <tr>
                    <td class="team-logo-cell"><img src="../team_logos/SCU.jpeg" alt="SCU Logo" /></td>
                    <td class="vs-cell" rowspan="2">VS</td>
                    <td class="team-logo-cell"><img src="../team_logos/ASU.jpeg" alt="ASU Logo" /></td>
                </tr>
                <tr>
                    <td class="team-name-cell">St. Cloud State</td>
                    <td class="team-name-cell">Arizona State</td>
                </tr>
                <tr>
                    <td class="score-cell">4</td>
                    <td class="vs-cell"></td>
                    <td class="score-cell">1</td>
                </tr>
                <tr>
                    <td colspan="3" class="game-info-cell">Feb 7, 2026<br />7:00 PM MT</td>
                </tr>
            </table>

        </div>
    </div>

    <!-- League Leaders -->
    <div style="margin-top: 50px">
        <h2 style="text-align: center">NCHC League Leaders</h2>
        <table border="1" class="leader-table" style="border-collapse: collapse; width: 60%; margin: 0 auto; background-color: white;">
            <thead>
                <tr style="background-color: #333; color: white">
                    <th style="padding: 12px">Category</th>
                    <th style="padding: 12px">Player</th>
                    <th style="padding: 12px">Team</th>
                    <th style="padding: 12px">Stat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 12px; font-weight: bold">Goals Leader</td>
                    <td style="padding: 12px">Jack Devine</td>
                    <td style="padding: 12px">Denver</td>
                    <td style="padding: 12px; font-weight: bold">25</td>
                </tr>
                <tr>
                    <td style="padding: 12px; font-weight: bold">Assists Leader</td>
                    <td style="padding: 12px">Luke Grainger</td>
                    <td style="padding: 12px">Western Michigan</td>
                    <td style="padding: 12px; font-weight: bold">33</td>
                </tr>
                <tr>
                    <td style="padding: 12px; font-weight: bold">Points Leader</td>
                    <td style="padding: 12px">Jackson Blake</td>
                    <td style="padding: 12px">North Dakota</td>
                    <td style="padding: 12px; font-weight: bold">48</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Highlights -->
    <div style="margin-top: 50px">
        <h2 style="text-align: center">Morning Skate / Highlights</h2>
        <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 40px;">
            <iframe width="380" height="215" src="https://www.youtube.com/embed/azApFS827ok" frameborder="0" allowfullscreen></iframe>
            <iframe width="380" height="215" src="https://www.youtube.com/embed/7StWUCmgWtw" frameborder="0" allowfullscreen></iframe>
            <iframe width="380" height="215" src="https://www.youtube.com/embed/VuZDbQlklug" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

</body>
</html>