<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("admin_interface/includes/head");?>
<body>
	<style type="text/css">
		ul { margin: 0 0 1.25em 2em; list-style: none; }
	</style>
	<?php $this->load->view("admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span9">
				<ul class="breadcrumb" style="height:30px;">
					<li class="active">
						<?=anchor($this->uri->uri_string(),"Возврат паспортов");?>
					</li>
				</ul>
				<p>
					Нами получены письма, в которых Министерство энергетики РФ отказало в регистрации 60 наших паспортов, по 
					причине несоотвествия законодательству. В связи с этим всем членам СРО, чьи паспорта возвращены необходимо 
					их доработать с учетом замечаний и представить в СРО в установленые законом сроки, с указанием того, что 
					энергопаспорт является повторным, для дальнейшего направления в Минэнерго.
				</p>
				<p><strong>25 июля 2012</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/25_07_12_02_1124.PDF" target="_blank">PDF-файл</a> со списком паспортов</li>
				</ul>
				<p><strong>26 сентября 2012</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/26_09_12_02_1457.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>29 декабря 2012</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/02_2229_29_12_12.zip" target="_blank">ZIP-архив часть 1</a></li>
					<li><a href="http://sro61.ru/docs/passports/02_2196_29_12_12.zip" target="_blank">ZIP-архив часть 2</a></li>
					<li><a href="http://sro61.ru/docs/passports/return_02-2146_from_29.12.12.zip" target="_blank">ZIP-архив - возврат 02-2146</a></li>
				</ul>
				<p><strong>18 июня 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/18_06_13_02_1199.PDF" target="_blank">PDF-файл</a> со списком паспортов</li>
				</ul>
				<p><strong>8 июля 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/08_07_2013_02_1500.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>18 июля 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/18_07_13.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>30 июля 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/30_07_13_02_1796.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>3 сентября 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/return_101-02-2781_from_3092013.zip" target="_blank">ZIP-архив</a> - возврат 101-02-2781</li>
				</ul>
				<p><strong>5 сентября 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/05_09_2013.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>25 сентября 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/return_25092013.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>11 октября 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/return_101-15-15_from_11102013.zip" target="_blank">ZIP-архив</a> - возврат 101-15-15</li>
				</ul>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>