<?php
/**
 * AnswersController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

class AnswersController extends AppController {
	
	public function add($id) {
		$this->request->data['Answers']['question_id'] = $id;
		$this->request->data['Answers']['user_id'] = $this->Auth->user('id');
		
		$answer = $this->Answers->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Answers->save($answer)) {
				$this->Session->setFlash(__('Answer has been saved'), 'flash', ['class' => 'success']);
			} else {
				$this->Session->setFlash(__('Answer could not be saved'), 'flash', ['class' => 'error']);
			}
		}
		
		return $this->redirect(['controller' => 'questions', 'action' => 'view', $id]);
	}
	
}