<?php

/**
 * BestQuestionCell
 *
 * @author David Yell <neon1024@gmail.com>
 */
namespace App\View\Cell;

use Cake\View\Cell;

class BestQuestionCell extends Cell {

/**
 * Find and display the most upvoted question
 *
 * @return void
 */
	public function display() {
		$this->loadModel('Questions');
		$best = $this->Questions->find()
			->order('upvotes DESC')
			->first();
		$this->set('bestQuestion', $best);
	}
}