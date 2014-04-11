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

		// Behaviors
		$this->addBehavior('Votable');
	}
	
/**
 * Add a view to a question
 * 
 * @param int $id
 * @return bool
 */
	public function addView($id) {
		$question = $this->get($id);
		$question->set('views', $question->views + 1);
		return (bool)$this->save($question);
	}
	
}