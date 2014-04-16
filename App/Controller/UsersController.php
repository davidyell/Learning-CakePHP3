<?php
/**
 * UsersController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

use Cake\Controller\Component\Auth\BlowfishPasswordHasher;

class UsersController extends AppController {

/**
 * beforeSave
 * 
 * @param array $options
 * @return boolean
 */
	public function beforeSave($options = array()) {
		// Hash a new users password
		if (!$this->id) {
			$pw = new BlowfishPasswordHasher();
			$this->data['User']['password'] = $pw->hash($this->data['User']['password']);
		}

		return true;
	}

/**
 * Log in a user
 * 
 * @return void
 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(['controller' => 'questions', 'action' => 'index']);
			} else {
				$this->Session->setFlash(__('Could not login'), 'flash', ['class' => 'error']);
			}
		}
	}

/**
 * Log a user out
 * 
 * @return redirect
 */
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}