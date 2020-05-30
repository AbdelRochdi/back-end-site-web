<? session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Cup - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <!-- <script src="js/script.js" defer></script> -->
</head>

<body>

    <div class="brand">The Perfect Cup</div>
    <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

    <!-- Navigation -->
    <?php include 'nav.php' ?>

<?php
    $message = "";
if (isset($_POST['login'])) {

    

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);

    $query = "SELECT * FROM members WHERE email = '{$email}'";
    $login_query = mysqli_query($connection,$query);

    if (!$login_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($login_query)){
        $db_id = $row['id'];
        $db_email = $row['email'];
        $db_password = $row['password'];
        $db_fname = $row['fname'];
        $db_lname = $row['lname'];
    } 
    $row_count = mysqli_num_rows($login_query);
    if ($row_count < 1) {
        $message = "<div class='alert alert-danger'>this email does not exist, try again or <a href='register.php'>register</a> </div>";;
    }else {
        if (password_verify($password, $db_password)) {
            // $message = "<div class='alert alert-success'>Welcome $db_fname </div>";
            $_SESSION['id'] = $db_id;
            $_SESSION['fname'] = $db_fname;
            $_SESSION['lname'] = $db_lname;

            header('Location: blog.php');
        } else{
            $message =  "<div class='alert alert-danger'>your password in incorrect</div>";
        }
    }
    



}

?>   


    <div class="container">
        <div class="row ">
            <div class="box ">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>login</strong>
                    </h2>
                    <hr>
                    <div id="add_err2"><?php echo $message ?></div>
                    <form role="form" action ="login.php" method="post">
                        <div class="row">       
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                            <label>Password</label>
                                <input type="password" id="password" name="password" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" id="login" name = "login" class="btn btn-default">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group col-lg-12">
                                <a href = "register.php" id="register" class="btn btn-default">Not a member ? register here</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; The Perfect Cup 2019</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>