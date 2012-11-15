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
					<h1>Реестр энергопаспортов</h1>
					<table border="1">
						<caption>РЕЕСТР ЭНЕРГОПАСПОРТОВ ЧЛЕНОВ СРО НП «ЭНЕРГОАУДИТ»</caption>
						<thead>
							<tr>
								<th>№ п/п</th>
								<th>Номер энергопаспорта в реестре СРО</th>
								<th>Экспертная организация</th>
								<th>Дата положительного заключения экспертной организации</th>
								<th>Дата регистрации энерго-паспорта в СРО</th>
								<th>Дата передачи в Минэнерго РФ</th>
								<th>Организация — член СРО</th>
								<th>Заказчик</th>
							</tr>
						</thead>
						<tbody>
						<?php for($i=0,$num=$this->uri->segment(3)+1;$i<count($passports);$i++,$num++):?>
							<tr>
								<td><?=$num;?></td>
								<td><?=$passports[$i]['number'];?></td>
								<td><?=$passports[$i]['title'];?></td>
								<td><?=$passports[$i]['conclusion'];?></td>
								<td><?=$passports[$i]['register'];?></td>
								<td><?=$passports[$i]['transfer'];?></td>
								<td><?=$passports[$i]['organization'];?></td>
								<td><?=$passports[$i]['customer'];?></td>
							</tr>
						<?php endfor;?>
						</tbody>
					</table>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
				<div class="cf"> </div>
				</div>
			</div>
			<?php $this->load->view("users_interface/includes/sidebar");?>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("users_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".ShowFullText").click(function(){
				$(".FullText").hide();var news = $(this).attr("data-news");
				$(".ShowFullText").show();
				$(".FullText[data-news='news"+news+"']").show();$(this).hide();
			});
			
			$(".HideFullText").click(function(){$(".FullText").hide();$(".ShowFullText").show();});
		});
	</script>
</body>
</html>