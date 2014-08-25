<?php
/**
 * Description of UserCommentsTrait
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Model;

use Cake\ORM\Query;
use App\Model\Table;

trait UserCommentsTrait {
	
/**
 * Find users and their comments ordered by created
 * 
 * @param \Cake\ORM\Query $query
 * @return Query
 */
	public function findUserCommentsByCreated(Query $query) {
		return $query
			->contain(['Users' => [
					'fields' => ['id', 'name']
				]
			])
			->contain(['Comments' => function($q) {
				return $q
					->contain(['Users' => ['fields' => ['id', 'name']]])
					->order(['Comments.created' => 'ASC']);
			}]);
	}
	
}
