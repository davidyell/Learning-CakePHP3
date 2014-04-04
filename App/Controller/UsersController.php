<?php
/**
 * UsersController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

class UsersController extends AppController {
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(['controller' => 'questions', 'action' => 'index']);
			} else {
				$this->Session->setFlash(__('Could not login'), 'flash', ['class' => 'error']);
			}
		}
	}
	
}