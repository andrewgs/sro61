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
						<span>Телефон: (863) 296-20-92, Факс: (863) 219-15-68</span><br/>
						<span>E-mail: <?=safe_mailto('sro61@mail.ru','sro61@mail.ru');?> <?=anchor('http://sro61.ru/','http: sro61.ru');?></span><br/>
						<span>Рег. № СРО-Э-101</span><br/><br/>
						<span>Исх. №_______ от __________________</span>
						
					</p>
				</div>
				<div class="span5 offset1">
					<p class="center title">
						<br/><br/><br/>
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
				<p>&nbsp;</p><p>&nbsp;</p>
				<p class="center title">
					<strong>Уважаемый Павел Валентинович!</strong>
				</p>
				<p class="intend">
					Саморегулируемая организация Некоммерческое Партнерство «Энергоаудит» 
					(регистрационный номер <nobr>СРО-Э-101</nobr> от <nobr>07 июля 2011 года</nobr>) просит Вас принять для регистрации энергетический паспорт 
					<nobr>№<?=$passport['number'];?></nobr> составленный на <?=$passport['customer'];?><br/>
Юридический адрес:<br/> <?=$passport['address'];?><br/>
ИНН <?=$passport['inn'];?><br/>
членом СРО НП «Энергоаудит» - организацией <?=$passport['member'];?>.</p>
				<p class="intend">
	Основанием для проведения обязательного энергетического обследования является:<br/>
	<ul class="nolist">
	<li>- Федеральный Закон №261;</li>
	<li>- Постановление Правительства Российской Федерации от 25 января 2011 года №19;</li>
	<li>- Приказ Минэнерго России от 19 апреля 2010 года № 182.</li>
	</ul></p>

<p>Приложения:</p>
<p class="intend">
<ul class="nolist">
<li>- Энергетический паспорт объекта на бумажном носителе;</li>
<li>- CD диск, содержащий электронные копии энергетических паспортов в формате PDF и XML.</li>
				</p>
				<p>&nbsp;</p>
				<p>
					<table class="table no-border">
						<tbody>
							<tr>
								<td width="85%">С уважением,<br/>Директор СРО НП «Энергоаудит»</td>
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
