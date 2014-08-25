<?php
/**
 * CommentsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

use Cake\Error\NotFoundException;

class CommentsController extends AppController {
	
/**
 * Add a comment to a question or an answer
 * 
 * @param string $type The item to add the comment to
 * @param int $id The id of the item
 * @return redirect
 * @throws Cake\Error\NotFoundException If $type is not set
 */
	public function add($type, $id) {
		if ($type === 'question') {
			$this->request->data['question_id'] = $id;
		} elseif ($type === 'answer') {
			$this->request->data['answer_id'] = $id;
		} else {
			throw new NotFoundException('Cannot comment without a type');
		}
		$this->request->data['user_id'] = $this->Auth->user('id');

		if ($this->request->is('post')) {
			$comment = $this->Comments->newEntity($this->request->data);
			if ($this->Comments->save($comment)) {
				if ($this->request->is('ajax')) {
					$this->set('comment', $comment);
					$this->set('_serialize', ['comment']);
				} else {
					$this->Flash->success('Comment has been saved');
					return $this->redirect(['controller' => 'questions', 'action' => 'index']);
				}
			} else {
				$this->Flash->error('Comment could not be saved');
			}
		}
	}
}