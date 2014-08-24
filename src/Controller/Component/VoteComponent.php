<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\ORM\Error\MissingBehaviorException;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Description of VoteComponent
 *
 * @author David Yell <neon1024@gmail.com>
 */

class VoteComponent extends Component {

	public $Controller;
	public $Table;
	
	public $components = ['Flash'];
	
/**
 * Startup
 * 
 * @param \Cake\Event\Event $event
 */
	public function startup(Event $event) {
		$this->Controller = $event->subject();
		$this->Table = TableRegistry::get($this->Controller->name);
	}

/**
 * Vote an item up or down
 * 
 * @param Table $table The table to vote on
 * @param string $dir Direction of vote, up or down.
 * @param int $id
 * @return redirect
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
