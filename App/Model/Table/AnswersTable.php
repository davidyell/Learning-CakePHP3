<?php
/**
 * AnswersTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class AnswersTable extends Table {

	public function initialize(array $config) {
		$this->belongsTo('Users');
		$this->belongsTo('Question');
		$this->hasMany('Comments');
	}

	
}