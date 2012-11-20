<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin_interface/includes/head');?>
<body>
	<style type="text/css">
		@media print {body, p { font-family: Tahoma, sans-serif; font-size: 16px; line-height: 24px; margin-bottom: 14px;}}
	</style>
	<div class="container-fluid" style="position: relative; ">
		<div class="row">
			<div class="span12">
				<div class="span6">
					<p class="center title">
						<img src="<?=$baseurl;?>images/print-logo.png" alt="" width="140"/><br/>
						<span>Некоммерческое партнерство</span><br/>
						<span>САМОРЕГУЛИРУЕМАЯ ОРГАНИЗАЦИЯ</span><br/>
						<span>344002, г.Ростов-на-Дону, ул., Московская д.63, оф. 247</span><br/>
						<span>Телефон: (863) 296-20-92, Факс: (863) 219-15-68</span><br/>
						<span>E-mail: <?=safe_mailto('sro61@mail.ru','sro61@mail.ru');?> <?=anchor('http://sro61.ru/','http: sro61.ru');?></span><br/>
						<span>Рег. № СРО-Э-101</span><br/><br/>
						<span>Исх. №_______ от __________________</span>
						
					</p>
				</div>
				<div class="span5">
					<p class="center title">
						<br/><br/><br/>
						<span>Директору департамента</span><br/>
						<span>энергоэффективности</span><br/>
						<span>Модернизации и развития ТЭК</span><br/>
						<span>Телефон: (863) 296-20-92, Факс: (863) 219-15-68</span><br/>
						<span>Свистунову П.В.</span>
						
					</p>
				</div>
				<div class="clear"></div>
				<br/><br/><br/>
				<p class="center title">
					<b>Уважаемый Павел Валентинович!</b>
				</p>
				<p class="intend">
					Саморегулируемая организация Некоммерческое Партнерство «Энергоаудит» 
					(регистрационный номер СРО-Э-101 от 07 июля 2011 года) просит Вас принять для регистрации энергетический паспорт 
					№ <?=$passport['number'];?> составленный на: <?=$passport['customer'];?><br/>
Юридический адрес:<br/> <?=$passport['address'];?><br/>
ИНН <?=$passport['inn'];?><br/>
членом СРО НП «Энергоаудит» - <?=$passport['member'];?>.<br/>
	Основанием для проведения обязательного энергетического обследования является:<br/>
	- Федеральный Закон « 261<br/>
	- Постановление Правительства Российской Федерации от 25 января 2011 года № 19<br/>
	- Приказа Минэнерго России от 19 апреля 2010 года № 182<br/><br/>

Приложения<br/>
-	Энергетический паспорт объекта на бумажном носителе.<br/>
-	CD диск, содержащий электронные копии энергетических паспортов в формате PDF и XML
				</p>
				<p>
					<table class="table no-border">
						<tbody>
							<tr>
								<td width="75%">С уважением,<br/>Директор СРО НП «Энергоаудит»</td>
								<td width="25%">Л.К. Евкина</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</p>
			</div>
		</div>
	</div>
</body>
</html>
