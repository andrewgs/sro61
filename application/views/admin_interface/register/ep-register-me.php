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
						<?=anchor($this->uri->uri_string(),"ЭП зарегистрированные МЭ");?>
					</li>
				</ul>
				<!--<p>
					Нами получены письма, в которых Министерство энергетики РФ отказало в регистрации 60 наших паспортов, по 
					причине несоотвествия законодательству. В связи с этим всем членам СРО, чьи паспорта возвращены необходимо 
					их доработать с учетом замечаний и представить в СРО в установленые законом сроки, с указанием того, что 
					энергопаспорт является повторным, для дальнейшего направления в Минэнерго.
				</p>-->
				<p><strong>5 сентября 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/register_05.09 101-02-2221-592013.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>13 июня 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/register_13.06.13_02-1134.pdf" target="_blank">PDF-файл</a> со списком паспортов</li>
				</ul>
				<p><strong>28 августа 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/register_20.08.13 101-02-2018-2082013.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>21 июня 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/register_21.06.13_02-1299.pdf" target="_blank">PDF-файл</a> со списком паспортов</li>
				</ul>
				<p><strong>23 сентября 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/register_23.09.13.zip" target="_blank">ZIP-архив</a> со списком паспортов</li>
				</ul>
				<p><strong>26 июля 2013</strong></p>
				<ul>
					<li><a href="http://sro61.ru/docs/passports/register_26.07.13_02-1719.pdf" target="_blank">PDF-файл</a> со списком паспортов</li>
				</ul>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>