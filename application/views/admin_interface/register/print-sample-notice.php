<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin_interface/includes/head');?>
<body>
	<style type="text/css">
		@media print { 
			body, p { font-family: Cambria, 'Times New Roman', Times, serif; font-size: 16px; line-height: 24px; margin-bottom: 14px;}
			body { padding: 60px; } 
		}
	</style>
	<div class="container-fluid" style="position: relative; ">
		<div class="row">
			<div class="span12">
				<div class="span5">
					<p class="center title colored">
						<img src="<?=$baseurl;?>images/print-logo.png" alt="" width="140"/><br/>
						<span>Саморегулируемая организация</span><br/>
						<span>Некоммерческое партнерство</span><br/>
						<span>344002, г.Ростов-на-Дону, ул., Московская д.63, оф. 247</span><br/>
						<span>Телефон: (863) 296-20-92, Факс: (863) 236-53-53</span><br/>
						<span>E-mail: <?=safe_mailto('sro61@mail.ru','sro61@mail.ru');?>, http: <?=anchor('http://sro61.ru/','http: sro61.ru');?></span><br/>
						<span>Рег. № СРО-Э-101</span><br/><br/>
						<span>Исх. №_______ от __________________</span>
						
					</p>
				</div>
				<div class="span5 offset1">
					<p class="center title">
						<br/><br/><br/>
						<strong>Кому</strong><br/>
						<strong><?=$passport['member'];?></strong>
						
					</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="row">
			<div class="span11">
				<p>&nbsp;</p><p>&nbsp;</p>
				<p class="center title">
					<strong>УВЕДОМЛЕНИЕ</strong>
				</p>
				<p class="intend">
					Настоящим подтверждаем принятие и регистрацию энергетического паспорта,  
					составленного по результатам энергетического обследования объекта: <?=$passport['customer'];?> 
					(ИНН <?=$passport['inn'];?>), расположенного по адресу: <?=$passport['address'];?>, 
					в соответствии с требованиями законодательства РФ, регистрационный № <?=$passport['number'];?>
				</p>
				<p>&nbsp;</p>
				<p>
					<table class="table no-border">
						<tbody>
							<tr>
								<td width="85%">Директор<br/>СРО НП «Энергоаудит»</td>
								<td width="15%"><em>Л.К. Евкина</em></td>
							</tr>
						</tbody>
					</table>
				</p>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		window.onload = function(){
			//setTimeout(function() { window.print(); }, 1000);
		};
	</script>
</body>
</html>
