<?php

// Make sure we're in YOURLS context
if( !defined( 'YOURLS_ABSPATH' ) ) {
	// Attempt to guess URL via YOURLS
	$url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace( array( '/pages/', '.php' ) , array ( '/', '' ), $_SERVER['REQUEST_URI'] );
	echo "Try this instead: <a href='$url'>$url</a>";
	die();
}

// Display page content. Any PHP, HTML and YOURLS function can go here.
$url = YOURLS_SITE . '/linkslist';

yourls_html_head( 'linkslist', 'Basic List of Links' );

// Start YOURLS engine
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/load-yourls.php' ;

 echo '<h2>A basic list of my links</h2>';

function show_links($numlinks) {

global $ydb;
 $base  = YOURLS_SITE;
 $table_url = YOURLS_DB_TABLE_URL;

$query = $ydb->get_results("SELECT url, keyword, timestamp FROM `$table_url` order by timestamp desc limit $numlinks");
if ($query) {
	echo '<table><thead><tr><th>Keyword</th><th>URL</th></tr></thead>';

	foreach( $query as $query_result ) {
		echo '<tr><td>';
		echo $query_result->keyword;
		echo '</td><td>';
		echo '<a href="' . $query_result->url . '">'. $query_result->url . '</a>';
		echo '</td></tr>';
	}
	echo '</table>';
}
}

show_links(1000);
yourls_html_footer();

?>