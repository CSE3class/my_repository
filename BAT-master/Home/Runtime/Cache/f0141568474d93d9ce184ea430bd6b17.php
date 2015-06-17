<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Baidu API Test</title>
        <link rel="shortcut icon" href="__PUBLIC__/img/favicon.png">
        <link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet">
        <link href="__PUBLIC__/css/login.css" rel="stylesheet">
        <link href="__PUBLIC__/css/common.css" rel="stylesheet">
        <style type="text/css">
            body{
                font-family: "ff-tisa-web-pro-1","ff-tisa-web-pro-2","Lucida Grande","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;
            }
            div#top{
                position:fixed;
                top:0;
                left:0;
                bottom:0;
                right:0;
                z-index:-1;
            }
            div#top > img{
                height:100%;
                width:100%;
                border:0;
            }
            .form-signin{
                max-width: 400px;
                margin: 150px auto;
                border: 1px solid #66B3FF;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
        </style>
    </head>
    <body>
        <div id="top"><img src="__PUBLIC__/img/login_back_img.jpg"></div>
        <div class="container">
            <div class="row-fluid" style="text-align:center;color:#E0E0E0;">
                <form class="form-signin form-horizontal" id="formLogin">
                    <h2>BAT</h2>
                    <div class="control-group">
                        <label class="control-label">用户名：</label>
                        <div class="controls">
                            <input class="input-block-level" name="username" type="text" placeholder="Username">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">密&nbsp&nbsp&nbsp&nbsp码：</label>
                        <div class="controls">
                            <input class="input-block-level" name="password" type="password" placeholder="Password">
                        </div>
                    </div>
                    <!--  
                    <div class="control-group">
                            <label class="control-label" for="inputEmail">验证码：</label>
                            <div class="controls" style="text-align:left;">
                                    <input class="span4" name="imgCode" type="text">
                                    <img src="__APP__/Public/imgCode/" onclick="this.src=this.src + '?' + Math.random()"/>
                            </div>
                    </div>
                    -->
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"></label>
                        <div class="controls" style="text-align:left;">
                            <button class="btn btn-info span12" id="doLogin">登录</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="margin:0px auto;">
            <div class="alert alert-block alert-error" id="errmsg">
                <i class="icon-warning-sign"></i><strong>Warning：</strong>
                <span></span>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    var URL = "__URL__";
    var APP = "__APP__";
    var ROOT = "__ROOT__";
</script>
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/login.js"></script>