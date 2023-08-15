# yourls-linklist [![Built for Awesome YOURLS](https://img.shields.io/badge/Awesome-YOURLS-C5A3BE)](https://github.com/YOURLS/awesome-yourls/)

## Description

Allows to get a YOURLS "homepage" that shows a table with all your shortened links.

### Context

Fork of [YOURLS](https://github.com/YOURLS/YOURLS)'s (url shortner) [yourls-linklist](https://gitlab.com/ruthtillman/yourls-linklist) plugin repository.

### Improvements

It adds graphics in `idex.php` and `linkslist.inc.php` files using [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/) CDN.

It also fixes original repo behavior accordingly to newer YOURLS functions and structure:

- replace old YOURLS `get_results()` function for new `fetchObjects()` implementation (in `linkslist.inc.php` file)
- store additional pages in default `user/pages` as recommended by newer YOURLS (instead of creating a `pages` folder in root directory)

## Usage

To use this plugin you can just:

- place `index.php` file in yourls root directory
- place `linkslist.inc.php` file in yourls `user/pages` directory

## Licence

This package is licensed under the [MIT License](LICENSE).
