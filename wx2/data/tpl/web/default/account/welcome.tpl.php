<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php  if(isset($title)) $_W['page']['title'] = $title?><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信三级分销管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信三级分销管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信三级分销管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
<link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
<link href="./resource/weicheng/css/style.css" rel="stylesheet"/>
<script src="./resource/weicheng/js/require.js"></script>
<script src="./resource/weicheng/js/app/config.js"></script>
<script src="./resource/weicheng/js/jqbase.js"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="resource/weicheng/js/dd_belatedpng_0.0.7a.js"></script>
<script type="text/javascript">
	DD_belatedPNG.fix('*');
</script>
<![endif]-->
<!--[if IE]>
<script src="resource/weicheng/js/label.js" type="text/javascript" language="javascript"></script>
<![endif]-->
</head>
<body>
<header id="h_reg">
	<section class="layout"><img src="resource/weicheng/images/login_logo.png" /></section>
</header>
<section class="login_main"  style="background:#ffcc00">
	<section class="layout clearfix">
    	<img src="resource/weicheng/images/login_pic.png" class="l" />
    	<section class="login_tab"  style="border-radius:15px; -moz-border-radius: 15px;-webkit-border-radius: 15px; ">
        	<h2 style="font-family:'微软雅黑'; background:#41CAC0"  >管理中心</h2>
            <form action="" method="post" role="form" onsubmit="return formcheck();">
            	<table width="100%">
                	<tr>
                    	<td><input type="text" class="admin_icon"  id="firstname" name="username" placeholder="输入您的账号"></td>
                    </tr>
                    <tr>
                    	<td><input type="password" class="pwd_icon" id="password" name="password" placeholder="输入您的密码"></td>
                    </tr>
                    <tr>
                    	<td ><input  type="submit" name="submit"  class="btn"  style="background:#41CAC0;" value="登&nbsp;录" /><input name="token" value="<?php  echo $_W['token'];?>" type="hidden" /></td>
                    </tr>
                    <tr>
                    	<td>
                        	<a href="./index.php?c=user&a=register&" class="reg_a"  style="font-family:'微软雅黑';color:#41CAC0;">立即注册</a>
                            <a href="javascript:;" class="getpwd"  style="font-family:'微软雅黑'"   >忘记密码？</a>
                        </td>
                    </tr>
                </table>
            </form>
<script>
function formcheck() {
	if($('#remember:checked').length == 1) {
		cookie.set('remember-username', $(':text[name="username"]').val());
	} else {
		cookie.del('remember-username');
	}
	return true;
}
var h = document.documentElement.clientHeight;
$(".login").css('min-height',h);
</script>
        </section>
    </section>
</section>
<section class="f_reg">
	<section class="f_nav">
<div class="pulldown push-30-t text-center animated fadeInUp">
	<small class="text-muted"><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by v<?php echo IMS_VERSION;?> &copy; 2014-2015 <?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></small>
</div>
    </section>
</section>
</body>
</html>
