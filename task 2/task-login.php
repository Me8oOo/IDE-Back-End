<?php
// define variables and set to empty values
$email  = $password = "";

$validate = false;
$emails = ['me8a.mohanad@gmail.com', 'test@test.com', 'test123@test.com', 'test@test123.com'];
$passwords = [];
$passwords = ['12345678', '987654321'];
$errors = [];

$errors['emailErr'] = $errors['passwordErr'] =  "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $errors['emailErr'] = "Please Enter your Email";
        $validate = true;
    } else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailErr'] = "Invalid Email";
        }
    }
    if ($errors['emailErr'] == "") {
        for ($i = 0; $i < count($emails); $i++) {
            if ($email == $emails[$i]) {
                $validate = true;
                break;
            }
        }
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
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login Form</title>
</head>

<body>

    <div class="form">

        <h1>Please Login </h1>


        <form method="POST" action="<?php echo $validate ? htmlspecialchars($_SERVER["PHP_SELF"]) : 'suc.php'; ?>">



            <label id="label" for="Email">Email address</label>



            <input required type="email" class="form-control" name="email" value=<?php echo $email ?>>
            <span class="error">* <?php echo $errors['emailErr']; ?></span>

            <br> <br>





            <label for="Password">Password</label>


            <input required type="password" class="form-control" name="password">
            <span class="error">* <?php echo $errors['passwordErr']; ?></span>

            <button type="submit" class="btn  submit-btn">Login</button>
        </form>

    </div>


</body>

</html>