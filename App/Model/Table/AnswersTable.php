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
		// Relationships
		$this->belongsTo('Users');
		$this->belongsTo('Questions');
		$this->hasMany('Comments');
		
		// Attach behaviours
		$this->addBehavior('CounterCache', [
			'Questions' => ['answer_count']
		]);
		$this->addBehavior('Votable');
	}

	
}