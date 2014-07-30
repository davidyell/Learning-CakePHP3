<?php
/**
 * CommentsTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class CommentsTable extends Table {

/**
 * Setup the table and relationships
 * 
 * @param array $config Configuration options
 * @return void
 */
	public function initialize(array $config) {
		// Relationships
		$this->belongsTo('Answers');
		$this->belongsTo('Questions');
		$this->belongsTo('Users');

		// Behaviours
		$this->addBehavior('Timestamp');
	}
}