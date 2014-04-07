<?php
/**
 * CommentsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

use Cake\ORM\Entity;
use Cake\Error\NotFoundException;

class CommentsController extends AppController {
	
/**
 * Add a comment to a question or an answer
 * 
 * @param string $type The item to add the comment to
 * @param int $id The id of the item
 * @return redirect
 */
	public function add($type, $id) {
		if ($type === 'question') {
			$this->request->data['question_id'] = $id;
		} else if ($type === 'answer') {
			$this->request->data['answer_id'] = $id;
		} else {
			throw new NotFoundException('Cannot comment without a type');
		}
		$this->request->data['user_id'] = $this->Auth->user('id');
		
		$comment = $this->Comments->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Comments->save($comment)) {
				$this->Session->setFlash(__('Comment has been saved'), 'flash', ['class' => 'success']);
				return $this->redirect(['controller' => 'questions', 'action' => 'index']);
			} else {
				$this->Session->setFlash(__('Comment could not be saved'), 'flash', ['class' => 'error']);
			}
		}
	}
	
}