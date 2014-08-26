<?php
/**
 * AnswersTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use App\Model\Traits\UserCommentsTrait;
use Cake\ORM\Table;

class AnswersTable extends Table {

	use UserCommentsTrait;

/**
 * Setup the table and relationships
 *
 * @param array $config Configuration options
 * @return void
 */
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
		$this->addBehavior('Timestamp');
	}
}