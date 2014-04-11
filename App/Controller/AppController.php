<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends \Cake\Controller\Controller {
	
/**
 * Global components
 * 
 * @var array
 */
	public $components = [
		'Session',
		'Auth' => [
			'authenticate' => [
				'Form' => [
					'fields' => ['username' => 'email']
				]
			],
			'loginAction' => ['controller' => 'users', 'action' => 'login'],
			'logoutRedirect' => ['controller' => 'questions', 'action' => 'index']
		],
		'RequestHandler'
	];
	
/**
 * Global beforeFilter
 * 
 * @param \Cake\Event\Event $event
 * @return void
 */
	public function beforeFilter(Event $event) {
		$this->Auth->allow(['index', 'view']);
	}
	
}
