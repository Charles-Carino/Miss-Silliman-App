<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Miss Silliman Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="public/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="public/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="public/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="public/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="public/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="public/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="public/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="public/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="public/pages/css/themes/light.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="public/pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <body class="fixed-header menu-pin">
      <div class="login-wrapper">
        <!-- START Login Background Pic Wrapper-->
          <div class="bg-pic" style="background-size: contain;">
            <!-- START Background Pic-->
            <img src="public/img/demo/LoginBackground.jpg" data-src="public/img/demo/LoginBackground.jpg" data-src-retina="public/img/demo/LoginBackground.jpg" style="width: 100%" alt="" class="lazy">
            <!-- END Background Pic-->
            <!-- START Background Caption-->
            <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
              <h2 class="semi-bold text-white">
                Miss Silliman
              </h2>
            </div>
            <!-- END Background Caption-->
          </div>
        <!-- END Login Background Pic Wrapper-->
        <!-- START Login Right Container-->
        <div class="login-container bg-white" style="opacity: 0.8;">
          <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <p> LOGO HERE </p>
            <!-- START Login Form -->
            <form id="form-login" class="p-t-15" method="post" action="{{url('/signin')}}">
              {{ csrf_field() }}
              <!-- START Form Control-->
              <div class="form-group form-group-default" style="opacity: 1">
                <label>Username</label>
                <div class="controls">
                  <input type="text" name="username" class="form-control" required>
                </div>
              </div>
              <!-- END Form Control-->
              <!-- START Form Control-->
              <div class="form-group form-group-default">
                <label>Password</label>
                <div class="controls">
                  <input type="password" class="form-control" name="password" required>
                </div>
              </div>
              <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
            </form>
            <!--END Login Form-->
          </div>
        </div>
        <!-- END Login Right Container-->
      </div>


    <!-- BEGIN VENDOR JS -->
    <script src="public/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="public/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="public/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="public/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="public/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="public/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="public/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="public/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="public/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="public/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="public/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="public/plugins/classie/classie.js"></script>
    <script src="public/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="public/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <script src="public/pages/js/pages.min.js"></script>
  </body>
</html>
