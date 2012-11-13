<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("admin_interface/includes/head");?>
<body>
	<?php $this->load->view("admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span9">
				<ul class="breadcrumb">
					<li class="active">
						<?=anchor($this->uri->uri_string(),"Реестр паспортов");?>
					</li>
				</ul>
				<?php $this->load->view("alert_messages/alert-error");?>
				<?php $this->load->view("alert_messages/alert-success");?>
				<div style="margin-left:215px;">
				<?=form_open($this->uri->uri_string(),array('class'=>'bs-docs-example form-search')); ?>
					<input type="hidden" id="srid" name="srdjid" value="">
					<input type="text" class="span5 search-query" id="srdjurl" name="srvalue" value="" autocomplete="off" placeholder="Поиск по заказчикам (от 5-х символов)">
					<div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="<?=$baseurl;?>images/arrow.png" style="position: relative; top: -15px; left: 30px;" alt="upArrow" />
						<div class="suggestionList" id="suggestionsList"> &nbsp; </div>
					</div>
					<button type="submit" class="btn btn-primary" id="seacrh" name="scsubmit" value="seacrh"><i class="icon-search icon-white"></i> Найти</button>
					<?= form_close(); ?>
				</div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="w100"><center>Номер</center></th>
							<th class="w100"><center>Дата заключения</center></th>
							<th class="w100"><center>Дата регистрации</center></th>
							<th class="w300"><center>Заказчик</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($register);$i++):?>
						<tr class="align-center">
							<td><nobr><?=$register[$i]['number'];?></nobr></td>
							<td><nobr><?=$register[$i]['conclusion'];?></nobr></td>
							<td><nobr><?=$register[$i]['register'];?></nobr></td>
							<td><?=$register[$i]['customer'];?></td>
							<td>
								<div id="params<?=$i;?>" style="display:none" data-rid="<?=$register[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/register/edit/id/'.$register[$i]['id'],'<i class="icon-white icon-edit"></i>',array('class'=>'btn btn-primary','title'=>'Редактировать'));?>
								<a class="deleteRegister btn btn-danger" data-param="<?=$i;?>" data-toggle="modal" href="#deleteRegister" title="Удалить"><i class="icon-white icon-trash"></i></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
				<?=anchor('admin-panel/actions/register/add','<nobr><i class="icon-plus icon-white"></i> Добавить</nobr>',array('class'=>'btn btn-info'));?>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		<?php $this->load->view("admin_interface/modal/delete-register");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var rID = 0;
			$(".deleteRegister").click(function(){var Param = $(this).attr('data-param'); rID = $("div[id = params"+Param+"]").attr("data-rid");});
			$("#DelRegister").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/register/delete/id/'+rID;});
			function suggest(inputString){
				if(inputString.length < 5){
					$("#suggestions").fadeOut();
				}else{
					$("#srdjurl").addClass('load');
					$.post("<?=$baseurl;?>admin-panel/actions/register/search",{squery: ""+inputString+""},
						function(data){
							if(data.status){
								$("#suggestions").fadeIn();
								$("#suggestionsList").html(data.retvalue);
								$(".djorg").live('click',function(){fill($(this).html(),$(this).attr("data-djid"));});
							}else{
								$('#suggestions').fadeOut();
							};
							$("#srdjurl").removeClass('load');
					},"json");
				}
			};
			
			function fill(url,plid){
				$("#srdjurl").val(url);
				$("#srdjid").val(plid);
				setTimeout("$('#suggestions').fadeOut();", 600);
			};
			
			$("#srdjurl").keyup(function(){$("#srdjid").val('');suggest(this.value)});
			$("#srdjurl").focusout(function(){setTimeout("$('#suggestions').fadeOut();",600);});
			
			$("#seacrh").click(function(event){if($("#srdjurl").val() == ''){event.preventDefault();}});
		});
	</script>
</body>
</html>