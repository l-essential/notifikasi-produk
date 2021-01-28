<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>PT. L'ESSENTIAL</title>
        <meta name="description" content="top menu &amp; navigation" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
        <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <script src="assets/js/ace-extra.min.js"></script>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/icon.png">
    </head>
    <style type="text/css">
    body{
    background: url(http://mymaplist.com/img/parallax/back.png);
    background-color: #444;
    background: url(http://mymaplist.com/img/parallax/pinlayer2.png),url(http://mymaplist.com/img/parallax/pinlayer1.png),url(http://mymaplist.com/img/parallax/back.png);    
}

.vertical-offset-100{
    padding-top:100px;
}
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
            }
        });
  });
});
    </script>
    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>
            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="top-menu.html" class="navbar-brand">
                        <small>
                            <img src="<?php echo base_url();?>assets/ico/icon3.png"> PT. L'ESSENTIAL HOLDING
                        </small>
                    </a>                                    
                </div>
            </div><!-- /.navbar-container -->
        </div>
        
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Log In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo base_url('login'); ?>" method="post" class="login-form" onsubmit="return cekform();">
                            <?php 
                            $data=$this->session->flashdata('sukses');
                            if($data!=""){ ?>
                            <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i> <?=$data;?></div>
                            <?php } ?>
                            <?php 
                            $data2=$this->session->flashdata('error');
                            if($data2!=""){ ?>
                            <div class="alert alert-danger alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <i class="icon fa fa-close"></i> <?=$data2;?></div>
                            <?php } ?>
                        <div class="center">
                        <img width="50%" src="<?php echo base_url();?>assets/ico/composition.PNG">
                        <h4><b>Master Composition System</b></h4>
                    </div>
                    <hr>
                        <div class="form-group">
                            <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="username" placeholder="Username..." class="form-control" id="username" required="required" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" name="password" placeholder="Password..." class="form-control" id="password" required="required">
                                </div>
                            </div>
                        <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <button type="submit" name="submit" class="btn btn-labeled btn-success">
                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span> Sign In</button>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <a href="http://192.168.0.91/home" button class="btn btn-purple" type="submit"><i class="glyphicon glyphicon-share"></i> Back To Menu</button></a>
                        </div>
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder"> Created By IT Department PT. L'ESSENTIAL</span>
                        &nbsp;Application &copy; 2018            
        </div>
    </div>
</div>
            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="assets/js/jquery.2.1.1.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
             var $sidebar = $('.sidebar').eq(0);
             if( !$sidebar.hasClass('h-sidebar') ) return;
            
             $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
                if( event_name !== 'sidebar_fixed' ) return;
            
                var sidebar = $sidebar.get(0);
                var $window = $(window);
            
                //return if sidebar is not fixed or in mobile view mode
                var sidebar_vars = $sidebar.ace_sidebar('vars');
                if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
                    $sidebar.removeClass('lower-highlight');
                    //restore original, default marginTop
                    sidebar.style.marginTop = '';
            
                    $window.off('scroll.ace.top_menu')
                    return;
                }
            
            
                 var done = false;
                 $window.on('scroll.ace.top_menu', function(e) {
            
                    var scroll = $window.scrollTop();
                    scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
                    if (scroll > 17) scroll = 17;
            
            
                    if (scroll > 16) {          
                        if(!done) {
                            $sidebar.addClass('lower-highlight');
                            done = true;
                        }
                    }
                    else {
                        if(done) {
                            $sidebar.removeClass('lower-highlight');
                            done = false;
                        }
                    }
            
                    sidebar.style['marginTop'] = (17-scroll)+'px';
                 }).triggerHandler('scroll.ace.top_menu');
            
             }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
            
             $(window).on('resize.ace.top_menu', function() {
                $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
             });
            
            
            });
        </script>
    </body>
</html>