{if $smarty.post.geschlecht!=3}
Sehr geehrte{if $smarty.post.geschlecht==1}r Herr {else} Frau {/if}
{$smarty.post.titel} {$smarty.post.vorname} {$smarty.post.name},
{/if}
{if $smarty.post.geschlecht==3}
Sehr geehrte Damen und Herren,
{/if}

Sie können sich ab jetzt im Premiumbereich von http://www.deradvokat.de/derAdvokat/login
mit dem unten genannten Passwort anmelden. 

Ich hoffe Sie haben von den dort zur Verfügung gestellten Informationen einen großen Nutzen. 
Für Kritik und Anregungen bin ich stets dankbar.

Ihre Zugangsdaten:
----------------------------------------
Benutzername: {$smarty.post.email}
Ihr Passwort: {$passwort}
----------------------------------------

Das Rechtsportal können Sie auch über unsere Homepage unter http://www.deradvokat.de aufrufen.

Mit freundlichen Grüßen.
Kanzlei Strauch