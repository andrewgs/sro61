<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<legend>Форма добавления паспорта</legend>
	<fieldset>
		<div class="control-group">
			<label for="number" class="control-label">Номер энергопаспорта: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="number" value="<?=set_value('number');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="expert" class="control-label">Экспертная орган.: </label>
			<div class="controls">
				<select class="span5" name="expert" id="SetExpert">
				<?php for($i=0;$i<count($expert);$i++):?>
					<option value="<?=$expert[$i]['id'];?>"><?=$expert[$i]['title'];?></option>
				<?php endfor;?>	
				</select>
			</div>
		</div>
		<div class="control-group">
			<label for="conclusion" class="control-label">Дата заключения: </label>
			<div class="controls">
				<input type="text" class="input-medium" name="conclusion" value="">
			</div>
		</div>
		<div class="control-group">
			<label for="register" class="control-label">Дата регистрации: </label>
			<div class="controls">
				<input type="text" class="input-medium" name="register" value="">
			</div>
		</div>
		<div class="control-group">
			<label for="transfer" class="control-label">Дата передачи: </label>
			<div class="controls">
				<input type="text" class="input-medium" name="transfer" value="">
			</div>
		</div>
		<div class="control-group">
			<label for="organization" class="control-label">Член СРО: </label>
			<div class="controls">
				<select class="span5" name="organization" id="SetOrganization">
				<?php for($i=0;$i<count($organization);$i++):?>
					<option value="<?=$organization[$i]['id'];?>"><?=$organization[$i]['title'];?></option>
				<?php endfor;?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label for="customer" class="control-label">Заказчик: </label>
			<div class="controls">
				<textarea rows="2" class="span5 input-valid" name="customer"><?=set_value('customer');?></textarea>
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success" type="submit" id="send" name="submit" value="send">Добавить</button>
		<button class="btn btn-inverse backpath" type="button">Отменить</button>
	</div>
<?= form_close(); ?>