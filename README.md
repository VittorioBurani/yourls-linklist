YOURLS LIST LINKS
=================

Some experimental work to make YOURLS do what what I want. It's compatible with my 1.7 install but I can't guarantee backwards compatibility.

* [linkslist.php](https://github.com/ruthtillman/YOURLS/blob/master/linkslist.php) can be inserted into the /pages/ directory of your YOURLS installation to create a public page at http://[yourdomain]/linklist. It creates a very basic linked table of your 1000 most recent shortlinks on the YOURLS page background. I created it for a quick way to scan my links when I didn't feel like going into the admin interface. It's easy to increase or decrease the number of links in the table, just see the file.

* [list-links plugin](https://github.com/ruthtillman/YOURLS/tree/master/list-links) is a plugin which to do the same function as [linkslist.php](https://github.com/ruthtillman/YOURLS/blob/master/linkslist.php), but restricted to your administrative interface. For those wary of making the data public.

* You can use linkslist.inc.php and index.php to create an unstyled front page table for YOURLS, with titles as the anchor text, rather than the URL. Place linkslist.inc.php in your /pages/ directory and the index.php in your document root.
