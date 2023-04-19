{$num =count($interface)}
{for $i=0; $i<$num; $i++}

	<option value="{$url}/index.php?_route=noc/show_live/{$router}/{$interface[$i]}">{preg_replace("/[^a-zA-Z0-9]/", "", $interface[$i])}</option>

{/for}