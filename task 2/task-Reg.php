<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title>IDE Back-End mohanad
    </title>
</head>

<body>

    <?php
    $nameErr = $emailErr = $genderErr = $passwordErr =  $repasswordErr = $mobileErr = "";
    $name = $email = $gender = $password =  $repassword = $mobile = "";
    $validate = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            $validate = true;

            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            $validate = true;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Please enter your password";
        } else {
            $password = test_input($_POST["password"]);
            $validate = true;
        }

        if (empty($_POST["repassword"])) {
        } elseif ($password = $repassword) {
            $repassword = test_input($_POST["repassword"]);
            $validate = true;
        } else {
            $repasswordErr = "Password doesn't match the first.";
        }


        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
            $validate = true;
        }
        if (empty($_POST["mobile"])) {
            $mobileErr = "mobile is required";
        } else {
            $mobile = test_input($_POST["mobile"]);
            $validate = true;
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Regestiter Form Validation </h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo $validate ? 'suc.php' : htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>

        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>

        <br><br>
        Password: <input type="password" name="password" value="<?php echo $password; ?>">
        <span class="error"><?php echo $passwordErr; ?></span>

        <br><br>
        Re-Password: <input type="password" name="re-password" value="<?php echo $repassword; ?>">
        <span class="error"><?php echo $repasswordErr; ?></span>

        <br><br>
        Mobile: <input type="text" name="Mobile" value="<?php echo $mobile; ?>">
        <span class="error"><?php echo $mobileErr; ?></span>

        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>


</body>

</html>