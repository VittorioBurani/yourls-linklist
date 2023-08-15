<?php

/*

About:
This page can be inserted into the /pages/ directory of your YOURLS installation to create a public page at http://[domain], if the required index.php page is also in your document root.
The page creates a very basic linked table of your 1000 most recent shortlinks.
This is intended to give a basic framework for having a public listing of your links, with the title as clickable text.
This may be useful when you don't want to load something as bulky as the admin interface but want to quickly browse or ctrl+f through your shortened links, or you can't login.
Each link is linked to the page so you can double-check that you really have the correct link.
This code limits to 1000 links. To increase or decrease that number, change the $numlinks variable at the bottom of the code from 1000.
Please fork and improve as desired! I made this intentionally basic for my own use.

Creator: Ruth Kitchin Tillman
Site: http://ruthtillman.com
Github: https://github.com/ruthtillman/YOURLS
Version: 1.0

Edited by: Vittorio Burani
Site: https://github.com/VittorioBurani

*/

/* Insert Page title with some basic CSS */
echo '<h2 class="my-4" style="text-align: center; color: #f59542;">URL List</h2>';

/*
Create the function that will query and render URL table.
It's possible to specify how many links have to be shown by the "numlinks" parameter.
*/
function list_links_table($numlinks) {

	/* Set globals */
	global $ydb;
	$table_url = YOURLS_DB_TABLE_URL;

	/* Query YOURLS databse to get most recent links (number set by <numlinks>) */
	$query = $ydb->fetchObjects("SELECT url, keyword, title, timestamp FROM `$table_url` ORDER BY timestamp DESC LIMIT $numlinks");

	/* Check query emptyness */
	if ($query) {
		/* Open table and customize appearence */
		echo '<table class="table table-bordered table-dark table-striped text-white">';

		/* Insert Table Headers -> "Keyword: URL" */
		echo '<thead>
			<tr>
				<th scope="col">Keyword</th>
				<th scope="col">URL</th>
			</tr>
		</thead>';

		/* Loop through single shortened links and put them in table rows */
		foreach( $query as $query_result ) {
			echo '<tr><td>';
			echo $query_result->keyword;
			echo '</td><td>';
			echo '<a class="link-warning" href="' . $query_result->url . '">'. $query_result->title . '</a>';
			echo '</td></tr>';
		}

		/* Close table */
		echo '</table>';
	}
}

/* Create a column container to handle table dimensions through BS5 grid system */
echo '<div class="container col-xl-6 col-lg-8 col-md-10 col-12">';

/* Render URL table */
list_links_table(1000); // change from 1000 to whatever number of links you desire

/* Close BS5 container */
echo '</div>';

?>
