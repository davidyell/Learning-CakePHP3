<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * BestQuestionCell
 *
 * @author David Yell <neon1024@gmail.com>
 */

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