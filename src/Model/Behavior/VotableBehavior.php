<?php
/**
 * VoteBehavior
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

class VotableBehavior extends Behavior {

/**
 * A copy of the table class
 *
 * @var \Cake\ORM\Table
 */
	public $Table = null;

/**
 * Construct the behavior to get a copy of the table
 *
 * @param \Cake\ORM\Table $table The table object
 * @param array $config Array of config options for the behaviour
 */
	public function __construct(Table $table, array $config = array()) {
		parent::__construct($table, $config);
		$this->Table = $table;
	}

/**
 * Add a vote to an item
 *
 * @param string $dir The type of vote up or down
 * @param id $id The id of the item being voted upon
 * @return mixed Success, new value of votes || false on failure 
 */
	public function vote($dir, $id) {
		$item = $this->Table->get($id);

		if ($dir === 'up') {
			$item->set('upvotes', $item->upvotes + 1);
		} elseif ($dir === 'down') {
			$item->set('downvotes', $item->downvotes + 1);
		}

		if ($this->Table->save($item)) {
			return $item->upvotes - $item->downvotes;
		}

		return false;
	}

}
