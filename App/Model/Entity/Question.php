<?php
/**
 * Question
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Question extends Entity {
	
/**
 * Get the total number of votes
 * 
 * @return int
 */
	public function getVotes() {
		return $this->upvotes - $this->downvotes;
	}
	
}