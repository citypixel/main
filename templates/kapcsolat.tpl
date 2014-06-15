<form id="kapcsolat" name="kapcsolat" class="urlap" enctype="multipart/form-data" method="post" action="">
	<label>{$lang['Írja be a nevét']}:</label>
	<input name="kuldonev" id="kuldonev" type="text" value="{$kuldonevx}" />
	<label>{$lang['E-mail címe']}:</label>
	<input name="kuldo" id="kuldo" type="text" value="{$kuldox}" />
    <label>{$lang['Telefonszáma']}:</label>
	<input name="telefon" id="telefon" type="text" value="{$telefonx}" />
	<label>{$lang['Üzenet']}:</label>
    <textarea name="uzenet_iroda" rows="8" cols="24">{$uzenetx}</textarea>
    <label>{$lang['Kérek másolatot']}:</label>
	<input name="masolat" id="masolat" type="checkbox" checked="checked" />
    <label>{$lang['Biztonsági kód']}:</label>
	<input type="text" style="width: 60px;" name="captcha_code" value="" maxlength="4" size="4" title="{$lang['Ide írja be a kódot!']}" />
	<img src="captcha.php" alt="{$lang['Biztonsági kód']}" title="{$lang['Biztonsági kód']}" />
	<input type="submit" name="submit" class="gomb" value="{$lang['elküld']}" />
</form>