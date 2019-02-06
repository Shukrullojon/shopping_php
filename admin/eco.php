<?php
include "../db/db.php";
include "session.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eco</title>
</head>
<body>
<div id="wrapper">
    <?php include "admin_heading.php" ?>
    <div id="page-wrapper">
        <hr>
        <form action="action.php" method="POST">
            <textarea class="form-control" name="eco" rows="10">
            </textarea>
            <br>
            <input type="submit" name="create_eco" value="create eco" class="form-control btn btn-success">
        </form>
    </div>
</div>
</body>
</html>
