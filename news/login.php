<?php
session_start();
Include("header.php");
Include("connect.php");

if (isset($_POST['log'])) {
    global $mysqli;
    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query( $dbcon, $sql );
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);  
    $followingdata = $result->fetch_assoc();
    if ($count == 1) {
        $_SESSION['username'] = $username;
        header("location: admin.php");
    } else {
        echo "Incorrect details!";
    }
} else {
    ?>

<body class="text-center">
    <main class="form-signin container">
        <div class="h3 mb-3 fw-normal">Login</div>
        <form action="" method="POST" class="form-floating">

            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Password</label>
            </div>

            <input type="submit" name="log" value="Login" class="w-100 btn btn-lg btn-primary" type="submit">
        </form>
    </main>
</body>
<?php
}
Include("footer.php");