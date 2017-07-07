<?php defined('IN_IA') or exit('Access Denied');?><style type='text/css'>
	.clearing-list a {
		position: relative;
	}
	.clearing-list span  {
		float:right;margin-right:20px;
	}
</style>

<div class="menu-header">砍价商品</div>
<ul>
	<?php if(cv('bargain.main')) { ?><li <?php  if($_GPC['r'] == 'bargain' or $_GPC['r'] == 'bargain.index') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain')?>">砍价中</a></li><?php  } ?>
    <?php if(cv('bargain.soldout')) { ?><li <?php  if($_GPC['r'] == 'bargain.soldout') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/soldout')?>">已售罄</a></li><?php  } ?>
    <?php if(cv('bargain.notstart')) { ?><li <?php  if($_GPC['r'] == 'bargain.notstart') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/notstart')?>">未开始</a></li><?php  } ?>
    <?php if(cv('bargain.complete')) { ?><li <?php  if($_GPC['r'] == 'bargain.complete') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/complete')?>">已结束</a></li><?php  } ?>
    <?php if(cv('bargain.out')) { ?><li <?php  if($_GPC['r'] == 'bargain.out') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/out')?>">已下架</a></li><?php  } ?>
    <?php if(cv('bargain.recycle')) { ?><li <?php  if($_GPC['r'] == 'bargain.recycle') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/recycle')?>">回收站</a></li><?php  } ?>
    <?php if(cv('bargain.warehouse')) { ?><li <?php  if($_GPC['r'] == 'bargain.warehouse') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/warehouse')?>"><i class="fa fa-plus"></i> 添加</a></li><?php  } ?>

</ul>

<div class="menu-header">全局设置</div>
    <ul>
        <?php if(cv('bargain.set')) { ?><li <?php  if($_GPC['r'] == 'bargain.set') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/set')?>">分享设置</a></li><?php  } ?>
        <?php if(cv('bargain.messageset')) { ?><li <?php  if($_GPC['r'] == 'bargain.messageset') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/messageset')?>">消息通知</a></li><?php  } ?>
        <?php if(cv('bargain.otherset')) { ?><li <?php  if($_GPC['r'] == 'bargain.otherset') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/otherset')?>">其他设置</a></li><?php  } ?>
    </ul>

<!--<div class="menu-header">砍价订单</div>-->
<!--<ul>-->
    <!--<li <?php  if($_GPC['r'] == 'bargain' or $_GPC['r'] == 'bargain.index') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain')?>">待发货</a></li>-->
    <!--<li <?php  if($_GPC['r'] == 'bargain.soldout') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/soldout')?>">待收货</a></li>-->
    <!--<li <?php  if($_GPC['r'] == 'bargain.notstart') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/notstart')?>">待付款</a></li>-->
    <!--<li <?php  if($_GPC['r'] == 'bargain.notstart') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/notstart')?>">已完成</a></li>-->
    <!--<li <?php  if($_GPC['r'] == 'bargain.notstart') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/notstart')?>">已关闭</a></li>-->
    <!--<li <?php  if($_GPC['r'] == 'bargain.notstart') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/notstart')?>">全部订单</a></li>-->
<!--</ul>-->

<!--<div class="menu-header">砍价活动</div>-->
<!--<ul>-->
	<!--<li <?php  if($_GPC['r'] == 'bargain.success') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/success')?>">砍价成功</a></li>-->
	<!--<li <?php  if($_GPC['r'] == 'bargain.ing') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/ing')?>">砍价中</a></li>-->
	<!--<li <?php  if($_GPC['r'] == 'bargain.error') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/error')?>">砍价失败</a></li>-->
	<!--<li <?php  if($_GPC['r'] == 'bargain.all') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('bargain/all')?>">全部砍价</a></li>-->
<!--</ul>-->
<br>

<script>
	$(function () {
		$.ajax({type: "GET",url: "<?php  echo webUrl('pstore/ajaxcleartotle')?>",dataType:"json",success: function(data){
			var res = data.result;
			$("span.status0").text(res.status0);
			$("span.status1").text(res.status1);
			$("span.status2").text(res.status2);
		}
		});
	});
</script>