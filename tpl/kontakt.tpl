<h1>Kontaktformular</h1>
{if $smarty.request.act=="send" && !strlen($msg)}
<div class="contenttable">Vielen Dank,<br />
wir haben Ihre Anfrage erhalten. Sie erhalten von uns schnellstm&ouml;glich eine Antwort.
</div>
{else}
{if $smarty.request.act=="send" && strlen($msg)}
<div class="contenttable">{$msg}</div><br />
{/if}
<div class="contentbox">
<form method="post" action="{$smarty.server.REQUEST_URI}">
    <input type="hidden" name="act" value="send" />
  <label>Vor- und Nachname:<br />
  <input type="text" name="kontakt_name" value="{if strlen($smarty.request.kontakt_name)}{$smarty.request.kontakt_name|escape}{else}{$smarty.session.user.vorname|escape} {$smarty.session.user.name|escape}{/if}" /><br />
  </label><br />
  <label>E-Mail:<br />
  <input type="text" name="kontakt_email" value="{$smarty.session.user.email}"  />
  </label><br /><br />
  <label>Telefon:<br />
  <input type="text" name="kontakt_telefon" value="{if strlen($smarty.request.kontakt_telefon)}{$smarty.request.kontakt_telefon|escape}{else}{$smarty.session.user.tel|escape}{/if}" />
  </label>

  <br /><br />
  <label>Ihre Nachricht:<br />
  <textarea name="kontakt_nachricht" cols="50" rows="8" id="nachricht">{$smarty.request.nachricht}</textarea>
  </label><br /><br />
  <input name="save" type="submit" value="Senden" />
</form>
</div>
{/if}