<?php
/**
 * QuestionsTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class QuestionsTable extends Table {
	
	public function initialize(array $config) {
		// Table relationships
		$this->belongsTo('Users');
		$this->hasMany('Answers');
		$this->hasMany('Comments');
	}
	
}