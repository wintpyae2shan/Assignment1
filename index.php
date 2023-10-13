<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subcription</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <header>
                <h2>MusicSpace</h2>
            </header>
            <form class="form-group" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="username">username</label>
                    <input type="text" id="username" name="username" required>

                    <label for="email">email</label>
                    <input type="text" id="email" name="email" required>

                    <label for="password">password</label>
                    <input type="text" id="password" name="password" required>

                    <input type="submit" name="submit" value="subscribe">

                    <nav>
                        <a href="view.php">View Subscribers List</a>
                    </nav>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
include("database.php");
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if (!preg_match("/^[A-Za-z ]+$/", $name)) {
        $errors[] = "Invalid Name";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email Address";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO sublist (name, username, email, password)
                VALUES ('$name', '$username', '$email', '$hash')";

        if (mysqli_query($conn, $sql)) {
            echo "Subscription completed";
        } else {
            echo "Cannot proceed subscription" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>