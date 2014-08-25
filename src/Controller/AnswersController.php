<?php
/**
 * AnswersController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

class AnswersController extends AppController {
	
	public $components = [
		'Vote'
	];

/**
 * Add an answer to a question
 *
 * @param int $id Question id to which the answer is added
 * @return void
 */
	public function add() {
		$this->request->data['Answers']['user_id'] = $this->Auth->user('id');

		if ($this->request->is('post')) {
			$answer = $this->Answers->newEntity($this->request->data);
			if ($this->Answers->save($answer)) {
				$this->Flash->success('Answer has been saved');
			} else {
				$this->Flash->error('Answer could not be saved');
			}
		}

		return $this->redirect(['controller' => 'questions', 'action' => 'view', $this->request->data['Answers']['question_id']]);
	}

/**
 * Wrapper method for the Vote component
 * 
 * @param string $dir
 * @param int $id
 * @return void
 */
	public function vote($dir, $id) {
		$this->Vote->vote($dir, $id);
	}
}