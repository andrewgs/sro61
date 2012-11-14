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
						<?=anchor($this->uri->uri_string(),"Форум");?>
					</li>
				</ul>
				<?php $this->load->view("alert_messages/alert-error");?>
				<?php $this->load->view("alert_messages/alert-success");?>
				
				<div class="accordion" id="accordion2">
				<?php for($i=0;$i<count($questions);$i++):?>
					<?php for($j=0,$kol=0;$j<count($answers);$j++):?>
						<?php if($questions[$i]['id'] == $answers[$j]['question']):?>
							<?php $kol++;?>
						<?php endif;?>
					<?php endfor;?>
					<div class="accordion-group">
						<div class="accordion-heading">
							<?=$questions[$i]['date'];?><br/>
							<?=$questions[$i]['name'];?> [<?=$questions[$i]['email'];?>]<br/>
							<?=$questions[$i]['text'];?><br/>
							<?php if($kol):?>
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?=$i?>">
									<span class="">Ответов: <?=$kol;?> шт.</span>
								</a>
							<?php else:?>
								<span class="">Нет ответов</span>
							<?php endif;?>
						</div>
						<div id="collapse<?=$i?>" class="accordion-body collapse">
							<div class="accordion-inner">
						<?php for($j=0;$j<count($answers);$j++):?>
							<?php if($questions[$i]['id'] == $answers[$j]['question']):?>
								<span class=""><?=$answers[$j]['text'];?></span><br/>
								<span class=""><?=$answers[$j]['date'];?></span><br/>
								<span class=""><?=$answers[$j]['name'];?></span><br/>
								<span class=""><?=$answers[$j]['email'];?></span><br/>
							<?php endif;?>
						<?php endfor;?>
							</div>
						</div>
					</div>
				<?php endfor;?>
				</div>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		<?php $this->load->view("admin_interface/modal/delete-question");?>
		<?php $this->load->view("admin_interface/modal/delete-answer");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var qID = aID = 0;
			$(".deleteQuestion").click(function(){var Param = $(this).attr('data-param'); qID = $("div[id = params"+Param+"]").attr("data-qid");});
			$("#DelQuestion").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/forum/delete-question/id/'+rID;});
		});
	</script>
</body>
</html>