<?php
/**
 * UsersTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table {

	public function initialize(array $config) {
		$this->hasMany('Answers');
		$this->hasMany('Comments');
		$this->hasMany('Questions');
	}
}