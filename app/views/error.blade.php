<?php
$domain = str_replace('www.', '', $_SERVER['SERVER_NAME']);
$dirname = str_replace('/', '', $_SERVER['REQUEST_URI']);

$domain_id = DB::table('domains')
				->where('domain', $domain)
				->first()
				->id;

$redirection_url = 'http://' . DB::table('redirections')
									->where('domain_id', $domain_id)
									->where('dirname', $dirname)
									->first()
									->destination;

header("Location: " . $redirection_url);
exit;
?>
