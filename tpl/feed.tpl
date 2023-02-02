<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title>derAdvokat - Beiträge</title>
  <subtitle>Beiträge aus dem Rechtsportal der Kanzlei Strauch</subtitle>
  <link href="http://www.deradvokat.de/derAdvokat/" />
  <link rel="self" href="http://www.deradvokat.de/derAdvokat/feed.rss" />
  <updated>{$smarty.now|date_format:"%Y-%m-%dT%H:%M:%S+01:00"}</updated>
  <author>
    <name>Kanzlei Strauch</name>
  </author>
  <id>http://www.deradvokat.de/derAdvokat/</id>
  <logo>http://www.deradvokat.de/derAdvokat/grafik/logo_advokat_png.png</logo>

{foreach from=$artikel item=a name=artikel}
    <entry>
      <title>{$cat[$a.kat_id]} &gt; {$a.titel}</title>
      <link href="http://www.deradvokat.de/derAdvokat/artikelview/{$a.id}" />
      <id>http://www.deradvokat.de/derAdvokat/artikelview/{$a.id}</id>
      <updated>{$a.date_created|date_format:"%Y-%m-%dT%H:%M:%S+01:00"}</updated>
      <summary>{$a.text|escape}</summary>
    </entry>
{/foreach}

</feed>