<?php
/**
 * VotableBehaviorTest
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace Test\TestCase\Model\Behavior;

use App\Model\Behavior\VotableBehavior;
use Cake\TestSuite\TestCase;
use \Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class VotableBehaviorTest extends TestCase {
	
/**
 * Fixtures to use
 * 
 * @var array
 */
	public $fixtures = [
		'app.question'
	];
	
/**
 * Setup the test
 */
	public function setUp() {
		parent::setUp();
		$this->connection = ConnectionManager::get('test');
		
		$this->question = TableRegistry::get('Questions', [
			'table' => 'questions',
			'connection' => $this->connection
		]);
	}

/**
 * Post test cleanup
 */
	public function tearDown() {
		unset($this->question);
		TableRegistry::clear();
	}
	
/**
 * Data provider
 * 
 * @return array
 */
	public function votesProvider() {
		return [
			[66, 'up', 2],
			[70, 'up', 1],
			[74, 'down', 2],
			[78, 'down', 1]
		];
	}
	
/**
 * Test the Votable behaviour public interface
 * 
 * @param string $dir up|down
 * @param int $id
 * @return void
 * 
 * @dataProvider votesProvider
 */	
	public function testVote($id, $dir, $expected) {
		$this->question->addBehavior('Votable');
		
		$this->question->vote($dir, $id);
		$questionAfter = $this->question->get($id);
		
		if ($dir === 'up') {
			$result = $questionAfter->upvotes;
		} else {
			$result = $questionAfter->downvotes;
		}
		
		$this->assertEquals($expected, $result);
	}

}