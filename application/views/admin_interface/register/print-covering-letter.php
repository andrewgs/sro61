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
				<div class="grif">
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
				<div class="span5" style="margin-left: 80px;">
					<p class="title smaller">
						<br/><br/><br/><br/>
						<strong>Директору департамента</strong><br/>
						<strong>энергоэффективности</strong><br/>
						<strong>модернизации и развития ТЭК</strong><br/>
						<strong>Свистунову П.В.</strong>
						
					</p>
				</div>
				<div class="clear"></div>
			</div>
	</div>
	<div class="row">
		<div class="span11">
				<p>&nbsp;</p>
				<p class="center title">
					<strong>Уважаемый Павел Валентинович!</strong>
				</p>
				<p class="intend main">
					Саморегулируемая организация Некоммерческое Партнерство «Энергоаудит» (регистрационный номер <nobr>СРО-Э-101</nobr> 
					от <nobr>07 июля 2011 года</nobr>) просит Вас принять для регистрации энергетический паспорт 
					<nobr>№<?=$passport['number'];?></nobr> составленный на <?=$passport['customer'];?><br/>
					Юридический адрес:<br/> <?=$passport['address'];?><br/>
					ИНН <?=$passport['inn'];?><br/>
					членом СРО НП «Энергоаудит» - организацией <?=$passport['member'];?>.
				</p>
				<p class="intend main">
	Основанием для проведения обязательного энергетического обследования является:<br/>
	<ul class="nolist">
	<li>- Федеральный Закон №261;</li>
	<li>- Постановление Правительства Российской Федерации от 25 января 2011 года №19;</li>
	<li>- Приказ Минэнерго России от 19 апреля 2010 года № 182.</li>
	</ul></p>

<p class="intend main">Приложения:</p>
<p class="intend main">
<ul class="nolist">
<li>- Энергетический паспорт объекта на бумажном носителе;</li>
<li>- CD диск, содержащий электронные копии энергетических паспортов в формате PDF и XML.</li>
				</p>
				<p>&nbsp;</p><p>&nbsp;</p>
				<p>
					<table class="table no-border times">
						<tbody>
							<tr>
								<td width="80%" style="font-size: 1.1em; line-height: 1.35em;">С уважением,<br/>Директор СРО НП «Энергоаудит»</td>
								<td width="20%" style="font-size: 1.25em;"><em>Л.К. Евкина</em></td>
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
