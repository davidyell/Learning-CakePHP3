<?php
/**
 * UsersTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table {

/**
 * Setup the table and relationships
 *
 * @param array $config Configuration options
 * @return void
 */
	public function initialize(array $config) {
		// Relationships
		$this->hasMany('Answers');
		$this->hasMany('Comments');
		$this->hasMany('Questions');

		// Attach behaviours
		$this->addBehavior('Timestamp');
	}
}