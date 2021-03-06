<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<style>
.table>thead>tr>th{border-bottom:0;}
.table>thead>tr>th .checkbox label{font-weight:bold;}
.table>tbody>tr>td{border-top:0;}
.table .checkbox{padding-top:4px;}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{overflow:inherit;}
.dropdown>span{display:inline-block; padding:3px 10px; border:1px solid transparent; border-bottom:0; cursor:pointer; position:relative;}
.open>span{color:#d9534f; border-color:rgba(0,0,0,0.15); border-bottom:0; background:#fff; border-top-left-radius:4px; border-top-right-radius:4px; z-index:1001;}
.dropdown-menu{margin:0; border-top-left-radius:0; top:98%;}
.dropdown-menu ul li{float:left;width:230px}
</style>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li><a href="<?php  echo url('system/welcome');?>">系统</a></li>
	<li><a href="<?php  echo url('account/display');?>">公众号列表</a></li>
	<li><a href="<?php  echo url('account/permission', array('uniacid' => $uniacid));?>">账号操作员列表</a></li>
	<li class="active">操作人员权限</li>
</ol>
<form class="form-horizontal form" action="" method="post">
<div class="alert alert-info">
	<i class="fa fa-exclamation-circle"></i> 默认未勾选任何菜单时，用户拥有全部权限。
</div>
<div class="panel panel-default">
	<div class="panel-body table-responsive" style="overflow:visible">
		<table class="table">
			<?php  if(is_array($menus)) { foreach($menus as $name => $sections) { ?>
				<thead>
				<tr class="info">
					<th colspan="6">
						<div class="checkbox">
							<label><input type="checkbox" name="system_<?php  echo $sections['name'];?>" onChange="selectall(this, 'system_<?php  echo $sections["name"];?>')"><?php  echo $sections['title'];?></label>
						</div>
					</th>
				</tr>
				</thead>
				<?php  if($sections['childs']) { ?>
					<tbody class="system_<?php  echo $sections['name'];?>">
					<?php  $i=1;?>
					<?php  if(is_array($sections['childs'])) { foreach($sections['childs'] as $item) { ?>
						<?php  if($i%6 == 1 || $i == 1) { ?><tr><?php  } ?>
							<td>
								<div class="checkbox">
									<label><input type="checkbox" value="<?php  echo $item['permission_name'];?>" <?php  if(in_array($item['permission_name'], $system_permission['permission'])) { ?>checked<?php  } ?> name="system[]"><?php  echo $item['title'];?></label>
								</div>
							</td>
						<?php  if($i%6 == 0) { ?></tr><?php  } ?>
						<?php  $i++;?>
					<?php  } } ?>
					</tbody>
				<?php  } ?>
			<?php  } } ?>
			<thead>
				<tr class="info">
					<th colspan="6">
						<div class="checkbox">
							<label><input type="checkbox" name="" onChange="selectall(this, 'module_select')">模块权限</label>
						</div>
					</th>
				</tr>
			</thead>
			<?php  if(!empty($module)) { ?>
				<tbody class="module_select">
					<?php  $i=1;?>
					<?php  if(is_array($module)) { foreach($module as $k => $m) { ?>
						<?php  if(empty($m['issystem'])) { ?>
						<?php  if($i%6 == 1 || $i == 1) { ?><tr><?php  } ?>
							<td style="overflow:inherit;">
								<div class="dropdown">
									<span class="" data-id="<?php  echo $k;?>">
										<label class="checkbox-inline"><input type="checkbox" value="<?php  echo $k;?>" name="module[]" <?php  if(in_array($k, $mod_keys)) { ?>checked<?php  } ?>><?php  echo $m['title'];?></label>
									</span>
									<ul class="dropdown-menu" role="menu"></ul>
									<label class="checkbox-inline info"></label>
									<input type="hidden" name="<?php  echo $k;?>_select" value="0"/>
								</div>
							</td>
						<?php  if($i%6 == 0) { ?></tr><?php  } ?>
						<?php  $i++;?>
						<?php  } ?>
					<?php  } } ?>
				</tbody>
			<?php  } ?>
		</table>
	</div>
</div>
<button type="submit" class="btn btn-primary span3" name="submit" value="提交" onclick="if ($('input:checkbox:checked').size() == 0) {return confirm('您未勾选任何菜单权限，意味着允许用户使用所有功能。确定吗？')}">提交</button>
<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</form>
<script>
$(function(){
	var aid = "<?php  echo $_GPC['uniacid'];?>";
	//模块下拉框
	$('.dropdown span').hover(function(){
		var _this = $(this);
		var m = $(this).attr('data-id');
		var uid = "<?php  echo $uid;?>";
		var length = $(this).next().find('li').size();
		if(!length) {
			$.post("<?php  echo url('user/permission/module')?>", {'m' : m, 'uid' : uid, 'uniacid' : aid}, function(data) {
				var data = $.parseJSON(data);
				var html = '';
				if(!data.errno) {
					$.each(data.errmsg, function(k, v){
						var check = v.checked ? 'checked' : '';
						html += '<li><a href="javascript:;"><label class="checkbox-inline"><input type="checkbox" name="module_'+m+'[]" value="'+ v.permission +'" '+check+'/>'+ v.title +'</label></a></li>';
					});
				}
				_this.next().html(html);
			});
		}

		$(this).parent().addClass('open').find('.dropdown-menu').show();
		$(this).parent().find('.dropdown-menu').hover(
			function(){$(this).show();$(this).parent().addClass('open')},
			function(){$(this).hide();$(this).parent().removeClass('open');}
		);
	},function(){
		$(this).parent().removeClass('open').find('.dropdown-menu').hide();
	});

	$('.dropdown span :checkbox').click(function(e){
		var _parent = $(this).parents('.dropdown');
		_parent.find('.dropdown-menu :checkbox').prop('checked', $(this).prop('checked'));
		if($(this).prop('checked')) {
			$(this).parents('.dropdown').find('label.info').html('已全选');
			$(this).parents('.dropdown').find('input[type="hidden"]').val(1);
		} else {
			$(this).parents('.dropdown').find('input[type="hidden"]').val(0);
			$(this).parents('.dropdown').find('label.info').html('已选0项');
		}
	});

	$('.dropdown-menu').on('click', ':checkbox', function(){
		if(!$(this).prop('checked')) {
			var i = 0;
			$.each($(this).parents('li').siblings(), function(){
				if($(this).find(':checkbox').prop('checked')) {
					i ++;
				}
			});
			$(this).parents('.dropdown').find('input[type="hidden"]').val(0);
			$(this).parents('.dropdown').find('label.info').html('已选' + i + '项');
			if(!i) {
				$(this).parents('.dropdown').find('span :checkbox').prop('checked', false);
			}
		} else {
			var flag = 0;
			var i = 1;
			$.each($(this).parents('li').siblings(), function(){
				if(!$(this).find(':checkbox').prop('checked')) {
					flag = 1;
				} else {
					i ++;
				}
			});
			if(!flag) {
				$(this).parents('.dropdown').find('label.info').html('已全选');
				$(this).parents('.dropdown').find('input[type="hidden"]').val(1);
			} else {
				$(this).parents('.dropdown').find('label.info').html('已选' + i + '项');
				$(this).parents('.dropdown').find('input[type="hidden"]').val(0);
			}
			$(this).parents('.dropdown').find('span :checkbox').prop('checked', true);
		}
	});
});


//处理全选函数
function selectall(obj, a){
	$('.'+a+' input:checkbox').each(function() {
		$(this)[0].checked = obj.checked ? true : false;
	});
}
//当已经全选时，默认全选按钮选中
$(function() {
	$('.table>tbody').each(function() {
		var a = true;
		$(this).find('input:checkbox').each(function() {
			if($(this)[0].checked != true) {
				a = false;
				return false;
			}
		});
		if(a) $('input[name='+$(this).attr('class')+']:checkbox')[0].checked = true;
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>