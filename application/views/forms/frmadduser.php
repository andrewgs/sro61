<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<legend>Форма регистрации пользователя</legend>
	<fieldset>
		<div class="control-group">
			<label for="organization " class="control-label">Организация: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="organization" value="<?=set_value('organization ');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="address " class="control-label">Адрес: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="address" value="<?=set_value('address ');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="email" class="control-label">Email: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="email" value="<?=set_value('email');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="phones " class="control-label">Телефон: </label>
			<div class="controls">
				<input type="text" class="span5" name="phones" value="<?=set_value('phones ');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="login " class="control-label">Логин: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid " name="login" value="<?=set_value('login ');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="content" class="control-label">Пароль: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="password" value="<?=set_value('login ');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success" type="submit" id="send" name="submit" value="send">Добавить</button>
		<button class="btn btn-inverse backpath" type="button">Отменить</button>
	</div>
<?= form_close(); ?>