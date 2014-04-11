<?php
/**
 * QuestionFixture
 *
 * @author David Yell <neon1024@gmail.com>
 */
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class QuestionFixture extends TestFixture {
	
	public $fields = array(
		'id' => ['type' => 'integer'],
		'upvotes' => ['type' => 'integer', 'null' => false, 'default' => 0],
		'downvotes' => ['type' => 'integer', 'null' => false, 'default' => 0],
		'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
	);

	public $records = array(
		array('id' => 66, 'upvotes' => 1, 'downvotes' => 2),
		array('id' => 70, 'upvotes' => 0, 'downvotes' => 3),
		array('id' => 74, 'upvotes' => 5, 'downvotes' => 1),
		array('id' => 78, 'upvotes' => 7, 'downvotes' => 0)
	);
	
}