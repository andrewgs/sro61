<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $this->load->view("users_interface/includes/head");?>
<body>
	<div class="bg_hed_line"></div>
	<div id="wrapper">
	<?php $this->load->view("users_interface/includes/header");?>
		<div id="middle">
			<div id="container">
				<div id="content">
					<h1>Форум</h1>
				<?php for($i=0;$i<count($questions);$i++):?>
			
				<?php endfor;?>
					<div class="">
						<a href="" class="none" id="FormAddQuestion">Добавить вопрос</a>
						<div class="" id="DivAddQuestion" style="display:none;">
							<?=$this->load->view("forms/frmaddquestion");?>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view("users_interface/includes/sidebar");?>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("users_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#FormAddQuestion").click(function(){$("#DivAddQuestion").toggle();})
			$("#abort").click(function(){$("#DivAddQuestion").toggle();});
		});
	</script>
</body>
</html>