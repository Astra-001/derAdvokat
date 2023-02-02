Nachricht von {$smarty.request.kontakt_name} am  {$smarty.now|date_format:"%d.%m.%Y %H:%M:%S"}

{$smarty.request.kontakt_nachricht}

{if mb_strlen($smarty.request.kontakt_nachricht)}Email: {$smarty.request.kontakt_nachricht}{/if}

{if mb_strlen($smarty.request.kontakt_telefon)}Telefon: {$smarty.request.kontakt_telefon}{/if}