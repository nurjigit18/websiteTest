<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_name = $_SESSION["user_name"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
.test-style {
    color: #adf3ec !important;
    font-size: 20px !important;
    margin-left: 20px;
    font-weight: bold !important;
}
.navigation .btnLogout-popup {
    width: 120px;
    height: 40px;
    background: transparent;
    color:#eeeeee;
    border: 2px solid #eeeeee; 
    outline: none;
    border-radius: 7px;
    cursor: pointer;    /* changes cursor icon when hovering */
    font-size: 1em;
    font-weight: 560;
    margin-left: 30px;
    transition: 0.5s;   /* smooth transition*/
}

.navigation .btnLogout-popup:hover {
    background: #dedeee;
    color:#000000
}

}
</style>
<body>
    <header>
        <h2 class="logo">Cloud</h2>
        <nav class="navigation">
            <a href="index.html">Home</a>
            <a href="files.php">Files</a>
            <span class="user-name test-style">Welcome, <?php echo htmlspecialchars($user_name); ?></span>
            <a href="logout.php">
                <button class="btnLogout-popup"> Logout </button>
            </a>
        </nav>
    </header>

    <div class="wrap">
        
    </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>