# Cake Exchange!
A project built using the Cake 3 dev2 preview.  
This is a quick site which emulates Stack Exchange in order to learn the new version of the framework.

## Setup
If you want to check it out you can clone the repo.  
`git clone https://github.com/davidyell/Learning-CakePHP3.git CakeExchange`  

Then you'll want to install the dependancies using [Composer](https://getcomposer.org/)  
`composer install`

## Database
I have added a dump of the database for ease of use. You can find it in `db_dump`.

## Gotchas
Currently there is a bug in the ORM, which you'll need to either wait for a fix, or just put a hack in.  
In `vendor/cakephp/cakephp/ORM/ResultSet.php`, you'll want to edit `line 402` to include an array check.  

` && is_array($results[$alias]) `

## Concepts covered
* Layouts
* Views
* Tables
* Behaviors (counterCache)