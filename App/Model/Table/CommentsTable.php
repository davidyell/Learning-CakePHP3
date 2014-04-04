<?php
/**
 * CommentsTable
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class CommentsTable extends Table {

	public function initialize(array $config) {
		$this->belongsTo('Answers');
		$this->belongsTo('Questions');
		$this->belongsTo('Users');
	}

	
}