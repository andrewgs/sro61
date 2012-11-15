<h1>Заявка на проведение энергоаудита</h1>
<form action="get-order-audit" method="post" id="formOrderAudit">
	<table>
		<tr>
			<th style="width: 300px;">Название организации / контактное лицо: </th> 
			<td><input type="text" maxlength="50" value="" style="width:260px;" name="name" /></td> 
		</tr>
		
		<tr>
			<th>E-mail:</th> 
			<td><input type="text" maxlength="50" style="width:260px;" name="email" /></td> 
		</tr>
		
		<tr>
			<th>Телефон для связи: </th> 
			<td><input type="text" maxlength="50" style="width:260px;" name="phone" /></td> 
		</tr>
		
		<tr>
			<th>Федеральный округ:</th> 
			<td>
				<select style="width:270px;" name="okryg" >
					<option value="Центральный" selected="selected">Центральный</option>
					<option value="Южный" >Южный</option>
					<option value="Северо-Западный" >Северо-Западный</option>
					<option value="Дальневосточный" >Дальневосточный</option>
					<option value="Сибирский" >Сибирский</option>
					<option value="Уральский" >Уральский</option>
					<option value="Приволжский" >Приволжский</option>
					<option value="Северо-Кавказский" >Северо-Кавказский</option>
				</select></td> 
		</tr>
		
		<tr>
			<th>Область, населенный пункт: </th> 
			<td><input type="text" value="" style="width:260px;height:24px;" name="obl" /></td> 
		</tr>
		
		<tr>
			<th>Описание объекта <br/> (название, площадь объекта, ТЭР):</th> 
			<td><textarea rows="0" cols="0" style="width:260px;height:120px;" name="opis"></textarea></td> 
		</tr>
		<tr>
			<th>Заказать полный сметный расчет <br/> (услуга платная):</th> 
			<td><select  style="width:270px;" name="smet">
					<option value="нет" selected="selected">нет</option>
					<option value="да" >да</option>
				</select></td> 
		</tr>
		
	</table>
		<input type="submit" value="Отправить заявку" class="abutton"/>
</form>