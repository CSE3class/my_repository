<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Baidu API Test</title>
		<link rel="shortcut icon" href="__PUBLIC__/img/favicon.png">
		<link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet">
		<link href="__PUBLIC__/css/docs.css" rel="stylesheet">
		<link href="__PUBLIC__/css/prettify.css" rel="stylesheet">
		<link href="__PUBLIC__/css/common.css" rel="stylesheet">
		<link href="__PUBLIC__/css/page.css" rel="stylesheet">
		<link href="__PUBLIC__/ZTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">  
		<script src="__PUBLIC__/js/jquery.js"></script>
		<script src="__PUBLIC__/js/bootstrap.min.js"></script>
		<script src="__PUBLIC__/js/common.js"></script>
		<style type="text/css">
		html{
			height: 101%;
		}
			body {
			padding-top: 60px;
			padding-bottom: 40px;
			}
		</style>
		<script type="text/javascript">
			var URL = "__URL__";
			var APP = "__APP__";
			var ROOT = "__ROOT__";
			var ACTION = "__ACTION__";
		</script>
	</head>
	<body data-spy="scroll" data-target=".bs-docs-sidebar">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="span10 offset1">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="brand" href="<?php echo U('Index/index');?>">BAT</a>
			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"  id="current_space">欢迎您：<?php echo session('username'); ?><b class="caret"></b></a>
					<ul class="dropdown-menu" >						
						<li><a href="<?php echo U('User/updateInfo');?>">个人资料</a></li>
						<li><a href="<?php echo U('User/updatePwd');?>">密码修改</a></li>
						<li><a href="<?php echo U('Login/loginOut');?>">安全退出</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav" id="appList">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="current_space" style="width:80px;">
						<?php echo session('appName'); ?><b class="caret"></b>
					</a>
					<ul class="dropdown-menu" id="space_menu"></ul>
				</li>
			</ul>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li id="index_page"><a href="<?php echo U('Index/index');?>">首页</a></li>
					<li id="api_page" class="login_req"><a href="<?php echo U('Api/alist');?>">API</a></li>
					<li id="data_page" class="login_req"><a href="<?php echo U('Data/dlist');?>">数据</a></li>
					<li id="case_page" class="login_req"><a href="<?php echo U('Case/clist');?>">用例</a></li>
					<li id="plan_page" class="login_req"><a href="<?php echo U('Plan/plist');?>">计划</a></li>
					<li id="project_page" class="login_req dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">项目管理<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo U('User/ulist');?>">用户管理</a></li>
							<li><a href="<?php echo U('App/applist');?>">APP管理</a></li>
							<li><a href="<?php echo U('Module/mlist');?>">模块管理</a></li>
						</ul>
					</li>
					<li id="help_page"><a href="<?php echo U('Help/index');?>">函数帮助</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
			</div>
			<div class="row-fluid">
				<div class="span10 offset1">
	<div class="span12">
		<ul class="breadcrumb">
			<li><a href="<?php echo U('Index/index');?>">首页</a> <span class="divider">/</span></li>
			<li><a href="<?php echo U('Plan/plist');?>">测试计划</a><span class="divider">/</span></li>
			<li>计划维护</a>
		</ul>
	</div>
	<div class="span12 bc form-inline">
		<form class="form-inline" action="<?php echo U('Plan/plist');?>" method="get">
			<label>Plan-ID：</label>
			<input type="text" class="span2" name="plan_id" placeholder="CASE-ID" value="<?php echo ($_GET['plan_id']); ?>">
			<label>描述：</label>
			<input type="text" class="span2" name="plan_desc" placeholder="计划的描述" value="<?php echo ($_GET['plan_desc']); ?>">
			<label>负责人：</label>
			<input type="text" class="span2" name="owner" placeholder="编写计划的同学" value="<?php echo ($_GET['owner']); ?>">
			<button class="btn btn-info">查找</button>
			<a class="btn btn-info" id="reset-btn">重置</a>
		</form>
	</div>
	<div class="btn-group tool-btn">
		<a id="plan_add" class="btn btn-info" href="<?php echo U('Plan/add');?>">新增</a>
		<a id="plan_update" class="btn btn-info">修改</a>
		<a id="plan_delete" type="button" class="btn btn-info" >删除</a>
	</div>
	<div class="btn-group tool-btn">
		<a id="plan_run" class="btn btn-info">执行计划</a>
	</div>
	<div class="span12">
		<table id="plan_list" class="table table-hover table-condensed table-bordered table-striped" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="2%" style="text-align:center;"><input id="selectAll" type="checkbox" /></th>
					<th width="8%" >ID</th>
					<th width="55%">计划描述</th>
					<th width="10%">用例个数</th>
					<th width="10%">创建人</th>
					<th width="15%">更新时间</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($plans)): if(is_array($plans)): $i = 0; $__LIST__ = $plans;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$plan): $mod = ($i % 2 );++$i;?><tr>
						<td style="text-align:center;">
							<input class="selectCell" type="checkbox" value="<?php echo ($plan["id"]); ?>"/>
						</td>
						<td><?php echo ($plan["id"]); ?></td>
						<td><a href="<?php echo U('Report/prlist');?>?planId=<?php echo ($plan["id"]); ?>"><?php echo ($plan["desc"]); ?></a></td>
						<td><?php echo ($plan["caseCount"]); ?></td>
						<td><?php echo ($plan["username"]); ?></td>
						<td><?php echo ($plan["updateTime"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php else: ?>
				<tr>
					<td colspan="8" style="text-align: center;">对不起，暂时没有任何数据</td>
				</tr><?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="green-black"><?php echo ($paging); ?></div>
</div>
<script src="__PUBLIC__/js/plan.js"></script>
			</div>
			<div class="row-fluid">
				<div class="row-fluid footer">
	<footer>
		<div class="container">
			<p >&copy;from  2014 <i class="icon-check"></i>使用中有任何问题请加QQ群咨询:188734537</p>
		</div>
	</footer>
</div>
			</div>
		</div>
		<div class="non">
			<div id="error" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;margin-left:-200px;">
				<div class="modal-header alert alert-error">
					<h4 id="myModalLabel">友情提示：</h4>
				</div>
				<div class="modal-body">
					<i class="icon-warning-sign"></i> <span id="error_body"></span>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
					<button class="btn btn-primary" id="error_conform" data-dismiss="modal" aria-hidden="true">确认</button>
				</div>
			</div>
		</div>
		<div style="">
			<div class="alert alert-block alert-error" id="errmsg">
			  	<i class="icon-warning-sign"></i><strong>Warning：</strong>
			  	<span></span>
			</div>
		</div>
	</body>
</html>