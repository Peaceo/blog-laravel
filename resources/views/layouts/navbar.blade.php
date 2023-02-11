
<div class="navbar">
    <div class="logo_div">
        <a href="index.php">
            <h1>LifeBlog</h1>
        </a>
    </div>

    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="create.php">Create New Post</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>

    <div class="profile">
        <?php
        if (isset($_SESSION['user_id'])) {
        ?>
            <ul>
                <li><a class="welcomeUser"><?php echo "Welcome " . $_SESSION['user_username']; ?></a></li>
                <li><a href="includes/logout.inc.php">LOGOUT</a></li>
            </ul>
        <?php
        } else {
        ?>
            <ul>
                <li><a href="view/login.php">LOGIN</a></li>
                <li><a href="view/signup.php">REGISTER</a></li>
            </ul>
        <?php
        }
        ?>
    </div>


</div>