# Codeigniter CRUD Generator 1.4 by [harviacode.com](http://harviacode.com)#

## About : ##

Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form*, form validation, export to excel and export to word. This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.

*generate textarea and text input only

Please visit and like [harviacode.com](http://harviacode.com) for more info and PHP tutorials.

## Preparation before using this CRUD Generator (Important) : ##

* On application/config/autoload.php, load database library, session library and url helper.
* On application/config/config.php, set $config['base_url'] = 'http://localhost/yourprojectname', $config['index_page'] = '', $config['url_suffix'] = '.html' and $config['encryption_key'] = 'randomstring'
* On application/config/database.php, set hostname, username, password and database

## How to use this CRUD Generator : ##

1. Simply put 'harviacode' folder, 'asset' folder and .htaccess file into your project root folder.
2. Open http://localhost/yourprojectname/harviacode.
3. Select table and push generate button.

OR 

watch video on https://youtu.be/OHZ7hhRLUZM

## FAQ : ##

* Select table show no data. Make sure you have correct database configuration on application/config/database.php and load database library on autoload.
* Error chmod on mac and linux. Please change your application folder and harviacode folder chmod to 777
* Error 404 when click Create, Read, Update, Delete or Next Page. Make sure your mod_rewrite is active and you can access http://localhost/yourproject/welcome. The problem is on htaccess. Still have problem? please go to google and search how to remove index.php codeigniter.
* Error cannot Read, Update, Delete. Make sure your table have primary key.

## Thanks for Support Me ##
Buy me a cup of coffee.. paypal : hariprasetyo0212@gmail.com

## Update ##
V.1.4 - 26 November 2016

* Change to serverside datatables using ignited datatables

V.1.3.1 - 05 April 2016

* Put view files into folder


V.1.3 - 09 December 2015

* Zero Config for database connection
* Fix bug searching
* Fix field name label
* Add select table from database
* Add generate all table
* Select target folder from setting menu
* Remove support for Codeigniter 2

V.1.2 - 25 June 2015

* Add custom target folder
* Add export to excel
* Add export to word

V.1.1 - 21 May 2015

* Add custom controller name and custom model name
* Add client side datatables

**Copyright 2015 [harviacode.com](http://harviacode.com)**