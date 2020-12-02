<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>HAKR-M - Login</title>
    
    <meta name="description" content="">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="img/logomain.png">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    
    <link rel="stylesheet" href="font/flaticon.css">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="fxt-template-animation fxt-template-layout28" data-bg-image="img/figure/2.jpg">
        <div id="particles-js"></div>
        <div class="fxt-content">
            <div class="fxt-header">
                <a href="login.php" class="fxt-logo"><img src="img/LOGOUP.png" alt="Logo"></a>
                <ul class="fxt-switcher-wrap">
                    <li><a href="login.php" class="switcher-text active">Login</a></li>
                    <li><a href="forgot-password.php" class="switcher-text">Forgot Password</a></li>
                </ul>
            </div>                            
            <div class="fxt-form"> 
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <p>Login into your account</p>
                </div>
                <form method="POST">
                    <div class="form-group"> 
                        <div class="fxt-transformY-50 fxt-transition-delay-2">                                              
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required="required">
                        </div>
                    </div>
                    <div class="form-group">  
                        <div class="fxt-transformY-50 fxt-transition-delay-3">                                              
                            <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                            <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <div class="fxt-checkbox-area">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Keep me logged in</label>
                                </div>
                                <button type="submit" class="fxt-btn-fill">Log in</button>
                            </div>
                        </div>
                    </div>
                </form>                
            </div> 
            <div class="fxt-style-line"> 
                <div class="fxt-transformY-50 fxt-transition-delay-5">                                
                    <h3>Contact us with</h3> 
                </div>
            </div>
            <ul class="fxt-socials">
                <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-6">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-7">
                    <a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-9">
                    <a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                </li>
            </ul>
        </div>
    </section>    
    <script src="js/jquery-3.5.0.min.js"></script>
    
    <script src="js/popper.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/imagesloaded.pkgd.min.js"></script>
    
    <script src="js/particles.js"></script>
    
    <script src="js/particles-3.js"></script>
    
    <script src="js/validator.min.js"></script>
    
    <script src="js/main.js"></script>
</body>
</html>