<?php

/**
 * BestQuestionCell
 *
 * @author David Yell <neon1024@gmail.com>
 */
namespace App\View\Cell;

use Cake\View\Cell;

class BestQuestionCell extends Cell {
	
	public function display() {
		$this->loadModel('Question');
		$best = $this->Question->find()
			->order('upvotes DESC')
			->first();
		$this->set('bestQuestion', $best);
	}
	
}