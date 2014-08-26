<?php
/**
 * Answer
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Entity;

use App\Model\Traits\VoteTrait;
use Cake\ORM\Entity;

class Answer extends Entity {

	use VoteTrait;

}