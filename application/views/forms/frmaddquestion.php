<?=form_open_multipart($this->uri->uri_string()); ?>
	<fieldset>
		<label for="name " class="control-label">Ваше имя: </label>
		<input type="text" class="valid-required" name="name" placeholder="Введите имя" value="<?=($this->loginstatus)?$this->user['name']:'';?>">
		<span class="help-inline" style="display:none;">&nbsp;</span><br/>
		<label for="email " class="control-label">Email: </label>
		<input type="text" class="valid-required" name="email" placeholder="Введите Email" value="<?=($this->loginstatus)?$this->user['email']:'';?>">
		<span class="help-inline" style="display:none;">&nbsp;</span><br/>
		<label for="question " class="control-label">Вопрос: </label>
		<textarea class="valid-required" name="question" placeholder="Введите текст вопроса"></textarea>
		<span class="help-inline" style="display:none;">&nbsp;</span><br/>
	</fieldset>
	<div class="form-actions">
		<button class="success" type="submit" id="send" name="submit" value="send">Добавить</button>
		<button class="" id="abort" type="button">Отменить</button>
	</div>
<?= form_close(); ?>