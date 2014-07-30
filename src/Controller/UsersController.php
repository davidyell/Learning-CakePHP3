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
 * @param array $options Array of callback options
 * @return bool
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
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Flash->error(__('Username or password is incorrect'), 'default', [], 'auth');
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