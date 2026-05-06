<?php
// Final connection using joe user
$con = mysqli_connect("127.0.0.1", "joe", "joe123", "INFS3800Project", 8889);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
