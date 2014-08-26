<?php
/**
 * Description of VoteComponent
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\ORM\Error\MissingBehaviorException;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class VoteComponent extends Component {

	public $Controller;

	public $Table;

	public $components = ['Flash'];

/**
 * Startup
 * 
 * @param \Cake\Event\Event $event The passed event
 * @return void
 */
	public function startup(Event $event) {
		$this->Controller = $event->subject();
		$this->Table = TableRegistry::get($this->Controller->name);
	}

/**
 * Vote an item up or down
 *
 * @param string $dir Which way the vote is
 * @param int $id The id of the item being voted upon
 * @return void
 * @throws Cake\ORM\Error\MissingBehaviorException
 */
	public function vote($dir, $id) {
		if (!$this->Table->hasBehavior('Votable')) {
			throw new MissingBehaviorException('Votable behaviour not attached');
		}

		$votes = $this->Table->vote($dir, $id);

		if ($this->Controller->request->is('ajax')) {
			$this->Controller->set('votes', $votes);
			$this->Controller->set('_serialize', ['votes']);
		} else {
			if ($votes !== false) {
				$this->Flash->success('Vote registered');
			} else {
				$this->Flash->error('Could not save vote');
			}

			return $this->Controller->redirect(['controller' => $this->Controller->name, 'action' => 'index']);
		}
	}
}