<?php session_start();
require("common.php");
?>
<?php
    $error = 0;
    if($_POST['status']=="login")
    {
        $query = "
            SELECT
                id,
                username,
                password,
                salt,
                email,
                fname
            FROM Users
            WHERE
                username = :username
        ";

        $query_params = array(
            ':username' => $_POST['username']
        );

        try
        {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage());
        }


        $login_ok = false;

        $row = $stmt->fetch();
        if($row)
        {

            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++)
            {
                $check_password = hash('sha256', $check_password . $row['salt']);
            }

            if($check_password === $row['password'])
            {
                $login_ok = true;
            }
        }


        if($login_ok)
        {

            $_SESSION['username'] = $row['username'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['id'] = $row['id'];

            unset($row['salt']);
            unset($row['password']);



           header("Location: index.html");
           die("Redirecting to: index.html");
        }
        else
        {
            $error = 1;
        }
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />

    </head>
    <body>
			<h1>Login</h1>
			<div class="content">
					<form class="login" action="login.php" method="post">
              <label>Username:</label>
							<input type="text" name="username" />
							<span class="error" <?php if ($error==1) { echo "style='visibility:visible;'>";} ?>Incorrect Username or Password</span>
							<label>Password: </label>
							<input type="password" name="password" />
						  <input type="submit" value="Login"></input>
              <input type="hidden" value="login"></input>
							<a href="register.php" rel="register" class="linkform">Register here</a>
					</form>
		  </div>

    </body>
</html>[
