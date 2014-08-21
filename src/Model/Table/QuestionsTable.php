<?php
/**
 * QuestionsTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use App\Model\UserCommentsTrait;

class QuestionsTable extends Table {

	use UserCommentsTrait;
	
/**
 * Setup the table and relationships
 *
 * @param array $config Configuration options
 * @return void
 */
	public function initialize(array $config) {
		// Table relationships
		$this->belongsTo('Users');
		$this->hasMany('Answers');
		$this->hasMany('Comments');

		// Behaviors
		$this->addBehavior('Votable');
		$this->addBehavior('Timestamp');
	}

/**
 * Add a view to a question
 * 
 * @param int $id The id of the question being viewed
 * @return bool
 */
	public function addView($id) {
		$question = $this->get($id);
		$question->set('views', $question->views + 1);
		return (bool)$this->save($question);
	}
	
/**
 * Find users and their comments ordered by created
 * 
 * @param \Cake\ORM\Query $query
 * @return Query
 */
	public function findUserCommentsByCreated(Query $query) {
		return $query
			->contain(['Users' => [
					'fields' => ['id', 'name']
				]
			])
			->contain(['Comments' => function($q) {
				return $q
					->contain(['Users' => ['fields' => ['id', 'name']]])
					->order(['Comments.created' => 'ASC']);
			}]);
	}
}