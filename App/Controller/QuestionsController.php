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
 * @param int $id
 * @throws NotFoundException
 * @return void
 */
	public function view($id) {
		if (!$id) {
			throw new NotFoundException(__('Question not found'));
		}
		
		$question = $this->Questions->find()
			->contain([
				'Users',
				'Comments' => [
					'Users' => [
						'fields' => ['id', 'name']
					]
				], 
				'Answers' => [
					'Users' => [
						'fields' => ['id', 'name']
					],
					'Comments'
				]
			])
			->where(['Questions.id' => $id])
			->first();
		$this->set('question', $question);
	}
}
