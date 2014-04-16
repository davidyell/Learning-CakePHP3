<?php
/**
 * QuestionsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

use Cake\Error\NotFoundException;
use Cake\Network\Response;

class QuestionsController extends AppController {

/**
 * List all the questions
 * 
 * @return void
 */
	public function index() {
		$questions = $this->Questions->find()
			->contain(['Users'])
			->order(['Questions.created' => 'DESC']);

		$this->set('questions', $questions);
	}

/**
 * View a question
 * 
 * @param int $id
 * @throws Cake\Error\NotFoundException
 * @return void
 */
	public function view($id) {
		if (!$id) {
			throw new NotFoundException(__('Question not found'));
		}

		$question = $this->Questions->find()
			->contain([
				'Users',
				'Comments' => function($q) {
					return $q
							->contain(['Users' => ['fields' => ['id', 'name']]])
							->order(['Comments.created' => 'ASC']);
				},
				'Answers' => function($q) {
					return $q
							->contain([
								'Users' => ['fields' => ['id', 'name']],
								'Comments' => function($q) {
									return $q
											->contain(['Users' => ['fields' => ['id', 'name']]])
											->order(['Comments.created' => 'ASC']);
								}
							])
							->order(['Answers.upvotes - Answers.downvotes' => 'DESC', 'Answers.created' => 'DESC']);
				}
			])
			->where(['Questions.id' => $id])
			->first();
		$this->set('question', $question);

		$this->Questions->addView($id);
	}

/**
 * Save a new Question
 * 
 * @return void
 */
	public function add() {
		$this->request->data['user_id'] = $this->Auth->user('id');
		if ($this->request->is('post')) {
			$question = $this->Questions->newEntity($this->request->data);
			if ($savedQuestion = $this->Questions->save($question)) {
				$this->Session->setFlash(__('Question has been saved'), 'flash', ['class' => 'success']);
				return $this->redirect(['controller' => 'question', 'action' => 'view', $savedQuestion->id]);
			} else {
				$this->Session->setFlash(__('Question could not be saved'), 'flash', ['class' => 'error']);
			}
		}
	}

/**
 * Vote a question up or down
 *
 * @param string $dir The type of vote
 * @param int $id The id of the item being voted on
 */
	public function vote($dir, $id) {
		$votes = $this->Questions->vote($dir, $id);

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
