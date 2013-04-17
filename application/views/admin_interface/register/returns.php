<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("admin_interface/includes/head");?>
<body>
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
					Нами получено письмо, в котором Министерство энергетики РФ отказало в регистрации 60 наших паспортов, по 
					причине несоотвествия законодательству. В связи с этим всем членам СРО, чьи паспорта возвращены необходимо 
					их доработать с учетом замечаний и представить в СРО в установленые законом сроки, с указанием того, что 
					энергопаспорт является повторным, для дальнейшего направления в Минэнерго.
				</p>
				<p>
					Просмотреть скан-копию письма вы можете постранично:
				</p>
				<ol>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan1.JPG" target="_blank">Страница 1</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10001.JPG" target="_blank">Страница 2</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10002.JPG" target="_blank">Страница 3</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10003.JPG" target="_blank">Страница 4</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10004.JPG" target="_blank">Страница 5</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10005.JPG" target="_blank">Страница 6</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10006.JPG" target="_blank">Страница 7</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10007.JPG" target="_blank">Страница 8</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10008.JPG" target="_blank">Страница 9</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10009.JPG" target="_blank">Страница 10</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10010.JPG" target="_blank">Страница 11</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10011.JPG" target="_blank">Страница 12</a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10012.JPG" target="_blank">Страница 13</span></a>
					</li>
					<li>
						<a href="http://gallery.mailchimp.com/e6749571e2f712cc06df7d32b/images/Scan10013.JPG" target="_blank">Страница 14</a>
					</li>
				</ol>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>