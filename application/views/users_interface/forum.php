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
					<div class="QBlock" data-question="question<?=$questions[$i]['id'];?>">
						<div class="">
							<span class=""><?=$questions[$i]['date'];?></span><br/>
							<span class=""><?=$questions[$i]['text'];?></span><br/>
							<span class=""><?=$questions[$i]['name'];?></span> <span class=""><?=$questions[$i]['email'];?></span><br/>
							<span class=""><?=$questions[$i]['comment'];?></span>
						</div>
						<div class="" id="DivAnswers" data-question="question<?=$questions[$i]['id'];?>" style="display:none;">
					<?php for($j=0,$kol=0;$j<count($answers);$j++):?>
						<?php if($answers[$j]['question'] == $questions[$i]['id']):?>
							<div class="">
								<span class=""><?=$answers[$i]['date'];?></span><br/>
								<span class=""><?=$answers[$i]['text'];?></span><br/>
								<span class=""><?=$answers[$i]['name'];?></span> <span class=""><?=$answers[$i]['email'];?></span><br/>
								<span class=""><?=$answers[$i]['comment'];?></span>
							</div>
							<?php $kol++;?>
						<?php endif;?>
					<?php endfor; ?>
							<a href="" class="HideAnswers none" data-number="<?=$questions[$i]['id'];?>">Скрыть ответы</a>
						</div>
					<?php if($kol > 0):?>
						<a href="" class="ShowAnswers none" data-number="<?=$questions[$i]['id'];?>">Показать ответы (Количество: <?=$kol;?> шт.)</a><br/>
					<?endif;?>
					<?php if($this->loginstatus):?>
						<a href="" class="AddAnswer none" data-question="<?=$questions[$i]['id'];?>">Ответить</a>
					<?php endif;?>
					</div>
					<hr/>
				<?php endfor;?>
					<hr/>
					<div class="">
						<a href="" class="none" id="AddQuestion">Добавить вопрос</a>
						<div class="" id="DivAddQuestion" style="display:none;">
							<?=$this->load->view("forms/frmaddquestion");?>
						</div>
					</div>
					<div class="" id="DivAddAnswer" style="display:none;">
						<?=$this->load->view("forms/frmaddanswer");?>
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
			$("#AddQuestion").click(function(){$("#DivAddAnswer").hide();$("#DivAddQuestion").show();});
			$("#AbortQuestion").click(function(){$("#DivAddQuestion").hide();$(".help-inline").hide();});
			$("#AbortAnswer").click(function(){$("#DivAddQuestion").hide();$("#TextAnswer").val('');$("#DivAddAnswer").hide();$(".help-inline").hide();});
			
			$(".AddAnswer").click(function(){
				$("#DivAddQuestion").hide();
				var question = $(this).attr("data-question");
				$("#qid").val(question);
				$(".help-inline").hide();/*$("#TextAnswer").val('');*/
				$("#DivAddAnswer").insertAfter($(this)).show();
				
			});
			$("#AbortQuestion").click(function(){$("#DivAddQuestion").hide();$(".help-inline").hide()});
			
			$("#addquestion").click(function(event){
				var err = false;$(".help-inline").hide();
				$("#formAddQuestion .valid-required").each(function(i,element){if($(this).val()==''){$(this).next(".help-inline").html("Поле не может быть пустым").show();err = true;}});
				var mail = $("#formAddQuestion .valid-email");
				if(!err && !isValidEmailAddress($(mail).val())){$(mail).next(".help-inline").html("Не верный Email").show();err = true;}
				if(err){event.preventDefault();}
			});
			$("#addanswer").click(function(event){
				var err = false;$(".help-inline").hide();
				$("#formAddAnswer .valid-required").each(function(i,element){
					if($(this).val()==''){
						$(this).next(".help-inline").html("Поле не может быть пустым").show();
						err = true;
					}
				});
				if(err){event.preventDefault();}
			});
		});
	</script>
</body>
</html>