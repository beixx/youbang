<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
    <title>后台管理中心</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/bootstrap-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/supr-theme/jquery.ui.supr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/uniform/uniform.default.css') }}" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!-- Main stylesheets -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
        <link type="text/css" href="css/ie.css" rel="stylesheet" />
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/apple-touch-icon-144-precomposed.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/apple-touch-icon-114-precomposed.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/apple-touch-icon-72-precomposed.png') }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/apple-touch-icon-57-precomposed.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
      
    <body class="loginPage">

    <div class="container-fluid">

        <div id="header">

            <div class="row-fluid">

                <div class="navbar">
                    <div class="navbar-inner">
                      <div class="container">
                            <span > <a class="brand" href="javascript:void(0)"></a></span> 

                      </div>
                    </div><!-- /navbar-inner -->
                  </div><!-- /navbar -->
                

            </div><!-- End .row-fluid -->

        </div><!-- End #header -->

    </div><!-- End .container-fluid -->    

    <div class="container-fluid">

        <div class="loginContainer">
            <form class="form-horizontal" action="{{ url('admin/checkuser')  }}" id="loginForm" method="post"/>
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="username">
                                用户名:
                                <span class="icon16 icomoon-icon-user-2 right gray marginR10"></span>
                            </label>
                            <input class="span12" id="username" type="text" name="username"  />
                        </div>
                    </div>
                </div>

                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="password">
                                密码:
                                <span class="icon16 icomoon-icon-locked right gray marginR10"></span>
                               <!--  <span class="forgot"><a href="#">Forgot your password?</a></span> -->
                            </label>
                            <input class="span12" id="password" type="password" name="password"  />
                        </div>
                    </div>
                </div>
                <div class="form-row row-fluid">                       
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="form-actions">
                            <div class="span12 controls">
                                <!-- <input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Keep me logged in -->
                                <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> 登录</button>
                            </div>
                            </div>
                             <?php 
                            	if(Session::has('error')){
                            		echo '<span class="forgot"><font color="red">'.Session::get('error').'</font></span>';
                            	}
                            ?>
                        </div>
                    </div> 
                </div>
            </form>
        </div>

    </div><!-- End .container-fluid -->

    <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="{{ asset('js/http/jquery-1.7.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('plugins/touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/ios-fix/ios-orientationchange-fix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}"></script>
    </body>
</html>
