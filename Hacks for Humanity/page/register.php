<?php session_start(); ?>
<?php
require("common.php");
$error=array(0,0,0,0,0,0,0);
$submitted_username = '';

function spamcheck($field)
  {
    include("common.php");
    // Sanitize e-mail address
    $field=filter_var($field, FILTER_SANITIZE_EMAIL);
    // Validate e-mail address
    $query = "
            SELECT
                *
            FROM Users
            WHERE
                email = :email
        ";

    $query_params = array(
        ':email' => $_POST["submitemail"]
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


    $row = $stmt->fetch();
    if($row)
      {
        $x=1;
      }
    else
      {
        $x=0;
      }
      if(filter_var($field, FILTER_VALIDATE_EMAIL) && $x==1)
        {
          return TRUE;
        }
      else
        {
          return FALSE;
        }
  }
?>
<?php
    if($_POST['status']=="register")
    {
        if(empty($_POST['username']))
        {
            $error[0]=1;
        }
        if(empty($_POST['password']))
        {
            $error[1]=1;
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $error[2]=1;
        }


        $query = "
            SELECT
                1
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
            //change when finished--possibly reroute to another page
            die("Failed to run query: " . $ex->getMessage());
        }


        $row = $stmt->fetch();


        if($row)
        {
            $error[3]=1;
        }

        $query = "
            SELECT
                1
            FROM Users
            WHERE
                email = :email
        ";

        $query_params = array(
            ':email' => $_POST['email']
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

        $row = $stmt->fetch();

        if($row)
        {
            $error[4]=1;
        }

       if ($error[0]==0 && $error[1]==0 && $error[2]==0 && $error[3]==0 && $error[4]==0) {
        $query = "
            INSERT INTO Users (
                username,
                password,
                salt,
                email
            ) VALUES (
                :username,
                :password,
                :salt,
                :email
            )
        ";


        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

        $password = hash('sha256', $_POST['password'] . $salt);

        for($round = 0; $round < 65536; $round++)
        {
            $password = hash('sha256', $password . $salt);
        }

        $query_params = array(
            ':username' => $_POST['username'],
            ':password' => $password,
            ':salt' => $salt,
            ':email' => $_POST['email']
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



  function redirect() {



        header("Location: login.php");

        die("Redirecting to login.php");
   }

 redirect();

    }
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Register</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
			<div class="content">
					<form class="register" action="register.php" method="post">
            <input type="hidden" name="status" value="register" />
						<h1>Register</h1>
								<label>Username:</label>
								<input type="text" name="username" value="<?php echo $_POST['username']; ?>"/>
								<span class="error" <?php if ($error[3]==1) { echo "style='visibility:visible;'>Username is already taken";} if ($error[0]==1) { echo "style='visibility:visible;'>Cannot be blank";} ?></span>

								<label>Email:</label>
								<input type="text" name="email" value="<?php echo $_POST['email']; ?>"/>
								<span class="error" <?php if ($error[2]==1) { echo "style='visibility:visible;'>Invalid email";} if ($error[4]==1) { echo "style='visibility:visible;'>Email is already registered";}?></span>

								<label>Password:</label>
								<input type="password" name="password"/>
								<span class="error" <?php if ($error[1]==1) { echo "style='visibility:visible;'>Cannot be blank";} ?></span>

							<input type="submit" value="Register" />
					</form>
        </div>
    </body>
</html>
