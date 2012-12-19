<!DOCTYPE html>	
<html lang="en">
<?php $this->load->view("admin_interface/includes/head");?>
<body>
	<?php $this->load->view("admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span9">
				<ul class="breadcrumb" style="height:30px;">
					<li class="active">
						<?=anchor($this->uri->uri_string(),"Пользователи");?>
					</li>
					<li style="float:right;">
						<?=anchor('admin-panel/actions/users/add','<nobr><i class="icon-plus icon-white"></i> Добавить</nobr>',array('class'=>'btn btn-info'));?>
					</li>
				</ul>
				<?php $this->load->view("alert_messages/alert-error");?>
				<?php $this->load->view("alert_messages/alert-success");?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="w650">Данные</th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($users);$i++):?>
						<tr class="align-center">
							<td>
								Организация: <?=$users[$i]['organization'];?><br/>
								Адрес: <?=$users[$i]['address'];?><br/>
								Email: <?=$users[$i]['email'];?><br/>
								Телефон: <?=$users[$i]['phones'];?><br/>
								<?php if($users[$i]['id'] != $userinfo['uid']):?>
								Логин: <strong><?=$users[$i]['login'];?></strong> Пароль: <strong><?=$users[$i]['password'];?></strong>
								<?php endif;?>
							</td>
							<td>
								<?=anchor('admin-panel/actions/users/edit/id/'.$users[$i]['id'],'<i class="icon-edit icon-white"></i>',array('class'=>'btn btn-success'));?>
							<?php if($users[$i]['id'] != $userinfo['uid']):?>
								<div id="params<?=$i;?>" style="display:none" data-uid="<?=$users[$i]['id'];?>"></div>
								<a class="deleteUser btn btn-danger" data-param="<?=$i;?>" data-toggle="modal" href="#deleteUser" title="Удалить"><i class="icon-white icon-trash"></i></a>
							<?php endif;?>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		<?php $this->load->view("admin_interface/modal/delete-user");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var uID = 0;
			$(".deleteUser").click(function(){var Param = $(this).attr('data-param'); uID = $("div[id = params"+Param+"]").attr("data-uid");});
			$("#DelUser").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/users/delete/id/'+uID;});
		});
	</script>
</body>
</html>