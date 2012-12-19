<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin_interface/includes/head');?>
<body>
	<style type="text/css">
		@media print {
			body, p { font-family: 'Times New Roman', Times, serif; font-size: 19px; line-height: 24px; margin-bottom: 16px; text-align: left; }
			body { padding: 60px; } 
		}
	</style>
	<div class="container-fluid" style="position: relative; ">
		<div class="row">
			<div class="span12">
				<div class="span6">
					<p class="center title colored">
						<img src="<?=$baseurl;?>images/print-logo.png" alt="" width="140"/><br/>
						<span>Саморегулируемая организация</span><br/>
						<span>некоммерческое партнерство</span><br/>
						<span>344002, г.Ростов-на-Дону, ул. Московская д.63, оф. 247</span><br/>
						<span>Телефон: (863) 296-20-92, Факс: (863) 236-53-53</span><br/>
						<span>e-mail: <?=safe_mailto('sro61@mail.ru','sro61@mail.ru');?>, www: <?=anchor('http://sro61.ru/','http://sro61.ru');?></span><br/>
						<span>Рег. № СРО-Э-101</span><br/><br/>
						<span>Исх. №_______ от __________________</span>
						
					</p>
				</div>
				<div class="span5" style="margin-left: 50px;">
					<p class="center title">
						<br/><br/><br/><br/><br/><br/>
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
					в соответствии с требованиями законодательства РФ, регистрационный № <?=$passport['number'];?>.
				</p>
				<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
				<p>
					<table class="table no-border">
						<tbody>
							<tr>
								<td width="80%" style="font-size: 1.2em;">Директор</td>
								<td width="20%" style="font-size: 1.2em;"><em>Л.К. Евкина</em></td>
							</tr>
						</tbody>
					</table>
				</p>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		window.onload = function(){
			setTimeout(function() { window.print(); }, 1000);
		};
	</script>
</body>
</html>
