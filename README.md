# Cake Exchange!
A project built using the Cake 3 alpha-2.  
This is a quick site which emulates Stack Exchange in order to learn the new version of the framework.

## Setup
If you want to check it out you can clone the repo.  
`git clone https://github.com/davidyell/Learning-CakePHP3.git CakeExchange`  

Then you'll want to install the dependancies using [Composer](https://getcomposer.org/)  
`composer install`

The front-end components are also installed using Bower, so you will need the Bower npm package installed. Then install the assets with,
`bower install`

There is also a gulp taks for compiling the Sass into Css. 
`gulp sass`

For more information on installing the npm tools check out their pages.
* [npm](https://www.npmjs.org/)
* [bower](http://bower.io/)
* [gulp](http://gulpjs.com/)

## Login
Login password is just the first part of the users email.

## Database
I have added a dump of the database for ease of use. You can find it in `db_dump`.

## Concepts covered
* Layouts
* Views
* Tables
* Behaviors (counterCache)
* Table objects
* Entities
* Query builder w/ Containable
* AuthComponent
* Behaviors w/ Tests
* AJAX

## Code sniffer
In order to run the code sniffer you will need to set the path to the CakePHP standard.

```bash
$ vendor/bin/phpcs --config-set default_standard CakePHP
$ vendor/bin/phpcs --config-set installed_paths vendor/cakephp/cakephp-codesniffer
```

## Todo
* ~~Upgrade to alpha-2~~  
 * ~~Refactor App to Src~~
 * ~~Update `routes.php`~~
* ~~Include code sniffer~~
 * ~~Fix phpcs errors~~