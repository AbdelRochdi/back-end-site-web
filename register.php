<?php session_start() ?>


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

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $fname = mysqli_real_escape_string($connection,$fname);
        $lname = mysqli_real_escape_string($connection,$lname);
        $email = mysqli_real_escape_string($connection,$email);
        $password = mysqli_real_escape_string($connection,$password);

        
        

        $search_query = "SELECT * FROM members WHERE email = '$email'";
        $search_result = mysqli_query($connection,$search_query);
        
        if (strlen($fname)<2){

            $message = "<div class='alert alert-danger'>your first name is too short</div>";

        }else if (strlen($lname)<2){

            $message = "<div class='alert alert-danger'>your last name is too short</div>";

        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $message = "<div class='alert alert-danger'>your email format is invalid</div>";

        }else if (mysqli_num_rows($search_result) > 0) {

            $message = "<div class='alert alert-danger'>your email already exists, please login</div>";

        }else if (!preg_match("#.*^(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password )){

            $message = "<div class='alert alert-danger'>your password should have at least a capital, a lower a number, a special caracter and should be longer than 6 caracters</div>";

        }else{
        
        $password = password_hash($password, PASSWORD_DEFAULT);
           
        $query = "INSERT INTO members(fname,lname,email,password) VALUES ('{$fname}','{$lname}','{$email}','{$password}')";
        $register_query = mysqli_query($connection,$query);
        $message = "<div class='alert alert-success'>registration submitted</div>";
        // header("Location: index.php");
        if (!$register_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        }
   
    }

        
    ?>

    
    <div class="container">
        <div class="row ">
            <div class="box ">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Registration
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <div id="add_err2"><?php echo $message ?></div>
                    <form role="form" action="register.php" method="post">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>First Name</label>
                                <input type="text" id="fname" name="fname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Last Name</label>
                                <input type="text" id="lname" name="lname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="50" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                            <label>Password</label>
                                <input type="password" id="password" name="password" maxlength="25" class="form-control">
                            </div>
                    
                            <div class="form-group col-lg-12">
                                <button type="submit" id="register" name="submit" class="btn btn-default">Submit</button>
                            </div>
                            
                        </div>
                    </form>
                    <div class="form-group col-lg-12">
                                <a href = "login.php" id="register" class="btn btn-default">Already a member ? login here</a>
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