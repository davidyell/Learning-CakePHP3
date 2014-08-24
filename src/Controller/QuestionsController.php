<?php
/**
 * QuestionsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

use Cake\Error\NotFoundException;

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
 * @param int $id The id of the question to view
 * @throws Cake\Error\NotFoundException
 * @return void
 */
	public function view($id) {
		if (!$id) {
			throw new NotFoundException(__('Question not found'));
		}
			
		$question = $this->Questions->find()
			->contain('Users')
			->find('userCommentsByCreated')
			->contain(['Answers' => function($q) {
				return $q->find('userCommentsByCreated');
			}])
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
				$this->Flash->success('Question has been saved');
				return $this->redirect(['controller' => 'questions', 'action' => 'view', $savedQuestion->id]);
			} else {
				$this->Flash->error('Question could not be saved');
			}
		}
	}
	
	public function edit($id) {
		$question = $this->Questions->find()
			->where(['id' => $id])
			->first();
		
		if ($this->request->is(['put', 'post'])) {
			$question = $this->Questions->patchEntity($question, $this->request->data);
			if ($this->Questions->save($question)) {
				$this->Flash->success('Question has been updated');
				return $this->redirect(['action' => 'view', $question->id]);
			} else {
				$this->Flash->error('Question cannot be updated');
			}
		}
		
		$this->request->data = $question->toArray();
	}

/**
 * Vote a question up or down
 *
 * @param string $dir The type of vote
 * @param int $id The id of the item being voted on
 * @return redirect
 */
	public function vote($dir, $id) {
		$votes = $this->Questions->vote($dir, $id);

		if ($this->request->is('ajax')) {
			$this->set('votes', $votes);
			$this->set('_serialize', ['votes']);
		} else {
			if ($votes !== false) {
				$this->Flash->success('Vote registered');
			} else {
				$this->Flash->error('Could not save vote');
			}

			return $this->redirect(['controller' => 'questions', 'action' => 'index']);
		}
	}
}
