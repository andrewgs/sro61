<div id="header">
	<div class="top">
		<ul class="globalnav">
			<li><?=anchor('','СРО НП «Энергоаудит»',array('class'=>'globalnav__active'));?></li>
			<li><?=anchor('documents','Документы');?></li>
			<li><?=anchor('register-members','Реестр членов');?></li>
			<li><?=anchor('register-energy-performance','Реестр Энергопаспортов',array('title'=>'Обучение'));?></li>
			<li><?=anchor('expertise-energy-performance','Экспертиза энергопаспорта',array('title'=>'Экспертиза энергопаспорта'));?></li>
		</ul>
		<ul class="assorted">
			<li><?=anchor('contacts','Посмотреть на карте');?></li>
			<li><a href="mailto:sro61@mail.ru"><img src="<?=$baseurl;?>images/mail.png" /></a></li>
		</ul>
	</div>
	<div class="header__flag"></div>
	<div class="logo">
		<?=anchor('','<img src="'.$baseurl.'images/logo.png" title="" alt="" width="220" style="padding-top:25px;" />');?>
	</div>
	<div class="hed_text_center">
		<div class="info_hed">
			<div class="column">
				<span class="h_6">Мы находимся по адресу:</span><br/>
				344002 г. Ростов-на-Дону, ул. Московская, д. 63, офис 237<br/><br/>
				<span class="h_6">Контактные телефоны:</span><br/>
				(863) 296-20-92, (863) 219-15-68, (863) 269-59-83
			</div>
			<div class="column">
				<span class="h_6">Факс:</span><br/>
				(863) 219-15-68 <br/><br/>
				<span class="h_6">Электронная почта:</span><br/>
				<?=safe_mailto('sro61@mail.ru','sro61@mail.ru');?>
			</div>
		</div>
	</div>
</div>