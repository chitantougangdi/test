<?php

// by 请勿倒卖,已申请软著,否则追究法律责任
namespace app\index;

header('Cache-Control:no-cache,must-revalidate');
header('Pragma:no-cache');
class webview_transfer extends Base
{
	function index()
	{
		$id = is_numeric($this->action) ? $this->action : ($this->action && $this->action != 'index' ? bees_decrypt($this->action) : 0);
		if ($id) {
			$data = db('app_pack')->where('id', $id)->find();
		}
		if (!$id || !$data) {
			$this->error_message('应用不存在，或已停用');
		}
		if ($data['period'] > 0 && $data['period'] < time()) {
			$this->error_message('应用已过期');
		}
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		$ios13 = strstr($ua, 'iphone os 13') || strstr($ua, 'iphone os 14');
		if ($ios13 && $data['type'] == 2) {
			if (is_ssl()) {
				$url = str_replace('http://', 'https://', $data['url']);
			} else {
				$url = str_replace('https://', 'http://', $data['url']);
			}
			$this->iframe_open($url);
		} else {
			redirect($data['url']);
		}
	}
	function error_message($msg = '哎呦，遇到错误了')
	{
		?>        <!DOCTYPE html>
        <!--[if IE 8]>
        <html lang="" class="ie8"><![endif]-->
        <!--[if IE 9]>
        <html lang="" class="ie9"><![endif]-->
        <!--[if !IE]><!-->
        <html lang="">
        <!--<![endif]-->
        <head>
            <title>哎呦，遇到错误了</title>
            <meta charset="utf-8"/>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta name="keywords" content="apk,android,ipa,ios,iphone,ipad,app封装,应用分发,企业签名">
            <meta name="description" content="<?php echo IN_NAME;?>为各行业提供ios企业签名、app封装、应用分发托管服务！">
            <meta name="author" content="<?php echo $_SERVER['HTTP_HOST'];?>">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-title" content="">
            <meta name="baidu-site-verification" content="ukBKOPYfE2"/>
            <meta name="baidu-site-verification" content="xSBa81fLpH"/>
            <meta name="author" content="<?php echo $_SERVER['HTTP_HOST'];?>">
            <meta property="og:type" content="webpage">
            <meta property="og:title" content="<?php echo $_SERVER['HTTP_HOST'];?>">
            <meta property="og:image" content="<?php echo $_SERVER['HTTP_HOST'];?>/img/logo.png">
            <meta property="og:description" content="<?php echo IN_NAME;?>为开发者提供简洁迅速的内测程序服务">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-title" content="flper">
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
            <meta name="viewport"
                  content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no minimal-ui">
            <link rel="stylesheet" href="/static/pack/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="/static/index/css/style.css"/>
            <style>
                body {
                    background-color: #efeff1;
                }

                .violations {
                    margin: 100px auto 70px;
                    width: 524px;
                }

                .violations .bg {
                    background: url("/static/index/image/warning.png?20180927?20190530");
                    width: 524px;
                    height: 505px;
                    color: #999;
                    font-size: 18px;
                    text-align: center;
                    padding: 205px 100px 0 80px;
                    font-weight: 600;
                }

                .violations a {
                    width: 170px;
                    height: 40px;
                    line-height: 40px;
                    background-color: #ffae5e;
                    border-radius: 20px;
                    display: block;
                    margin: 70px auto 0;
                    text-align: center;
                    color: #fff;
                    text-decoration: none;
                }

                @media (max-width: 767px) {
                    .violations {
                        margin: 150px auto 0;
                        width: 6.5rem;
                    }

                    .violations .bg {
                        background: url("/static/index/image/warning1.png?201809271?20190530");
                        background-size: cover;
                        width: 6.5rem;
                        height: 6.26rem;
                        color: #999;
                        font-size: .32rem;
                        text-align: center;
                        padding: 115px 60px 0 50px;
                        font-weight: 600;
                    }
                }
            </style>
        </head>
        <body>
        <div class="violations">
            <div class="bg"><span class="error-msg"><?php echo $msg;?></span></div>
            <!--            <a href="/" class="hidden-xs">{{BACK_HOME}}</a>-->
        </div>
        <script src="/static/index/js/jquery.min.js"></script>
        <script>
            var windowWidth = $(window).width();

            function setRem() {
                var windowWidth = $(window).width();
                if (windowWidth <= 750) {
                    var fs = windowWidth / 750 * 6.25 * 100;
                    $('html').css('font-size', fs + '%');   // 1rem = 100px;
                }
            };
            setRem();
            $(window).resize(setRem);
            console.log('APP_DOWNLOAD_TIMES_OVER[-100071]');
        </script>
        </body>
        <!--<script src="/static/index/js/markup.js"></script>-->
        <!--<script src="/static/index/js/publish/ua-parser.min.js"></script>-->
        <!--<script src="/static/index/js/template/wave.js"></script>-->
        </html>

        <?php 
		exit;
	}
	function iframe_open($url)
	{
		?>        <!DOCTYPE html>
        <html lang="">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title></title>
            <meta name="viewport"
                  content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
            <style type="text/css">
                body {
                    border: 0;
                    margin: 0;
                    padding: 0;
                    height: 100vh;
                    width: 100%;
                    background: #fff;
                    overflow: hidden;
                }
            </style>
        </head>
        <body>
        <script>
            if (("standalone" in window.navigator) && window.navigator.standalone) {
                var iframe = document.createElement("iframe");
                document.body.appendChild(iframe);
                iframe.src = "<?php echo $url;?>";
                iframe.height = document.body.scrollHeight;
                iframe.width = document.body.scrollWidth;
                iframe.style.overflow = "hidden";
                iframe.style.border = "none";
                iframe.style.position = "absolute";
                iframe.style.right = "0";
                iframe.style.top = "0";
                iframe.style.bottom = "0";
                document.body.style.height = document.body.scrollHeight;
                document.body.style.width = document.body.scrollWidth;
                document.body.style.border = "0";
                document.body.style.margin = "0";
                document.body.style.padding = "0";
                document.body.style.background = "#fff";
                document.body.style.overflow = "hidden";
            } else {
                location.href = "<?php echo $url;?>";
            }
        </script>
        </body>
        </html>
        <?php 
	}
}