# adminer-table-filter
Adminer plugin for quickly filtering tables, works only with custom themes where table list holds floated items

Uses localStorage to hold the filter across url changes

![Screenshot](/../screenshots/table-filter.png "Table filter using custom theme")

## Installation

1. Copy to `/plugins` directory
2. Add `new AdminerQuickFilterTables` to `index.php` `$plugins` array

## Dependencies

* `localStorage` capable browser
* Adminer theme, where the table list items are floated elements
