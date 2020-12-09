<?php
session_start();
if(isset($_SESSION['ID'])){
include '../function/profileGetData.php';
include '../function/gpaAndScore.php';
include '../function/getFeildCourse.php';
$row=getDataFromStudentTable($_SESSION['ID']);
$feilds=getfaildCourse($_SESSION['ID']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:description" content="">
    <meta name="theme-color" content="#313131">
    <meta name="msapplication-navbutton-color" content="#313131">
    <meta name="apple-mobile-web-app-status-bar-style" content="#313131">
    <title>HAKR M - Profile</title>
    <link rel="shortcut icon" href="assets/fivicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/fivicon.png">
    <link rel="stylesheet" href="css/libs/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200;300;400;500;600;700;800&amp;amp;family=Oswald:wght@500;700&amp;amp;family=Roboto:wght@500&amp;amp;display=swap'" rel="stylesheet">
    <link rel="stylesheet" href="css/libs/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- navbar-->
    <nav class="main-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="pic-user">
                        <a class="username-img-text" href="profile.php">
                            <img class="img-fluid rounded-circle mr-2" src="<?php echo $row['img'];?>" alt="avataruser">
                            <small class="username-text"><?php echo $row['name'];?></small>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <img class="text-center ml-auto mr-auto d-block" src="assets/logomain.png" width="30px" height="30px">
                </div>

                <div class="col-4">
                    <div class="list-links-bar text-right"><i class="fas fa-bars"></i></div>
                </div>
            </div>
        </div>
    </nav>
    <main class="links-self"><i class="fas fa-times close-navbar"></i>
        <div class="catch-them">
            <a class="logo-link" href="profile.php"><img class="logo-link" src="assets/logomain.png" alt="hackrm"></a>
            <h2 class="head-links">Hakr <strong>M</strong></h2>
            <ul class="outer-links list-unstyled">
                <li><a class="link-item" href="profile.php">profile</a></li>
                <li><a class="link-item" href="register.php">register</a></li>
                <li><a class="link-item" href="current-term.php">current-term</a></li>
                <li><a class="link-item" href="history.php">history</a></li>
                <li><a class="link-item" href="logout.php">logout</a></li>

            </ul>
        </div><img class="tringle" src="assets/decorations/tri-01.svg">
    </main>
    <!-- Image Upload -->
    <section class="page-content">
        <div class="row no-gutters">
            <div class="col-md-9">
                <div class="container-fluid">
                    <h1 class="mt-4">Your Profile</h1><small class="text-center d-block header-profile">Edit Your Profile From This Page</small>

                    <div class="change-data-self mt-4 mb-4">
                        <form class="form-profile clearfix" action="../function/profileSendData.php" method="post" enctype="multipart/form-data">
                            <div class="change-img">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(<?php echo $row['img']; ?>);"></div>
                                    </div>
                                </div>
                                <h5 class="text-center mt-3"><?php echo $row['name']; ?></h5>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username"><i class="fas fa-user mr-1"></i> Username</label>
                                    <input class="form-control" type="text" name="username" readonly value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id"><i class="fas fa-id-card-alt mr-1"></i>Id</label>
                                    <input class="form-control" type="text" name="id" readonly value="<?php echo $row['code']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="year"><i class="fas fa-clock mr-1"></i>Year</label>
                                    <input class="form-control" type="text" name="year" readonly value="<?php  echo date('Y') ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gpa"><i class="fas fa-calculator mr-1"></i>GPA</label>
                                    <input class="form-control" type="text" name="gpa" readonly value="<?php echo GPA($_SESSION['ID'])?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recH"><i class="fas fa-hourglass mr-1"></i>Recorded Hours</label>
                                    <input class="form-control" type="text" name="recH" readonly value="<?php echo $row['hours']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dep"><i class="fas fa-list-alt mr-1"></i>Department</label>
                                    <input class="form-control" type="text" name="dep" readonly value="<?php echo $row['StdDpart']; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="segSub"><i class="fas fa-frown mr-1"></i>Segment Subject</label>
                                    <input class="form-control" name="segSub" readonly value="<?php foreach ($feilds as $feild) {
                                        if ($feild['score'] <= 45 && $feild['score'] > 0) {
                                            echo $feild['code'] . " , ";

                                        }
                                    }
                                    ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email"><i class="fas fa-envelope mr-1"></i> Email</label>
                                    <input class="form-control" type="text" name="email" readonly value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock mr-1"></i> Change Password</label>
                                <input type="hidden" name="oldPass" value="<?php echo $row['Password']; ?>">
                                <input class="form-control" type="password" name="Password" minlength="8">
                            </div>
                            <button class="btn submit clearfix" type="submit"><i class="fas fa-paper-plane mr-2"></i><span>Save Changes</span></button><a class="btn regist-pg float-right" href="register.php"><i class="fas fa-file-medical mr-2"></i><span>Register</span></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="help-part text-center">
                    <div class="catch-them">
                        <h3 class="mb-4">Helps</h3>
                        <ul class="list-unstyled helps-self">
                            <li class="bx-hp p-1">
                                <h5 class="pt-2">To Change Username!</h5>
                                <p>&#8658; Username must start with letters:
                                    <br>EX: <small class="alert-success pl-1 pr-1">right</small> hakrm45
                                    <br>EX: <small class="alert-danger pl-1 pr-1">wrong</small> 45hakrm
                                </p>
                                <p>&#8658; Username must be more than 2 letters:
                                    <br>EX: <small class="alert-success pl-1 pr-1">right</small> hakrm
                                    <br>EX: <small class="alert-danger pl-1 pr-1">wrong</small> ha
                                </p>
                            </li>
                            <li class="bx-hp p-1">
                                <h5 class="pt-2">To Change Password!</h5>
                                <p>&#8658; Password must be more than 8 letter:
                                    <br>EX: <small class="alert-success pl-1 pr-1">right</small> Hacker786
                                    <br>EX: <small class="alert-danger pl-1 pr-1">wrong</small> Hac
                                </p>
                                <p>&#8658; Password must be Uppercase , LowerCase and Numbers:
                                    <br>EX: <small class="alert-success pl-1 pr-1">right</small> HAckr4563627
                                    <br>EX: <small class="alert-danger pl-1 pr-1">wrong</small> hackrmhackr
                                </p>
                            </li>
                            <li class="bx-hp p-1">
                                <h5 class="pt-2">To Register Subjects!</h5>
                                <p>
                                    &#8658; Click on <strong>Register Button</strong>
                                </p>
                            </li>
                        </ul>
                        <div class="social-icons"><i class="fab fa-facebook mr-2"></i><i class="fab fa-instagram mr-2"></i><i class="fab fa-twitter mr-2"></i></div>
                    </div><img src="assets/decorations/tri-01.svg" id="tringle-1">
                </div>
            </div>
        </div>
    </section>
    <!-- Scripts-->
    <script src="js/libs/jquery-3.5.1.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>
    <script src="js/libs/bootstrap-checkbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
<?php
}else{
    header("location:../index.php");
}
?>