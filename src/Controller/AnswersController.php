<?php
/**
 * AnswersController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

use Cake\Network\Response;

class AnswersController extends AppController {

/**
 * Add an answer to a question
 *
 * @param int $id Question id to which the answer is added
 * @return void
 */
	public function add($id) {
		$this->request->data['Answers']['question_id'] = $id;
		$this->request->data['Answers']['user_id'] = $this->Auth->user('id');

		if ($this->request->is('post')) {
			$answer = $this->Answers->newEntity($this->request->data);
			if ($this->Answers->save($answer)) {
				$this->Session->setFlash(__('Answer has been saved'), 'flash', ['class' => 'success']);
			} else {
				$this->Session->setFlash(__('Answer could not be saved'), 'flash', ['class' => 'error']);
			}
		}

		return $this->redirect(['controller' => 'questions', 'action' => 'view', $id]);
	}

/**
 * Vote an answer up or down
 *
 * @param string $dir The type of vote
 * @param int $id The id of the item being voted on
 * @return void
 */
	public function vote($dir, $id) {
		$votes = $this->Answers->vote($dir, $id);

		if ($this->request->is('ajax')) {
			$this->set('votes', $votes);
			$this->set('_serialize', ['votes']);
		} else {
			if ($votes !== false) {
				$this->Session->setFlash('Vote registered', 'flash', ['class' => 'success']);
			} else {
				$this->Session->setFlash('Could not save vote', 'flash', ['class' => 'error']);
			}

			return $this->redirect(['controller' => 'questions', 'action' => 'index']);
		}
	}

}