<?php
namespace App\Model\Traits;

/**
 * Description of VoteTrait
 *
 * @author David Yell <neon1024@gmail.com>
 */

trait VoteTrait {

/**
 * Get the total number of votes
 * 
 * @return int
 */
	public function getVotes() {
		return $this->upvotes - $this->downvotes;
	}
}