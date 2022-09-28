<?php
declare( strict_types = 1 );

use MediaWiki\Extension\Translate\PageTranslation\TranslatableBundleMover;
use MediaWiki\Extension\Translate\Services;

/**
 * Contains class with job for moving translation pages.
 *
 * @author Niklas Laxström
 * @license GPL-2.0-or-later
 * @ingroup PageTranslation JobQueue
 */
class TranslatableBundleMoveJob extends Job {
	/** @var TranslatableBundleMover */
	private $bundleMover;

	public static function newJob(
		Title $source,
		Title $target,
		array $moves,
		string $summary,
		User $performer
	): self {
		$params = [
			'source' => $source->getPrefixedText(),
			'target' => $target->getPrefixedText(),
			'moves' => $moves,
			'summary' => $summary,
			'performer' => $performer->getName(),
		];

		$self = new self( $target, $params );

		return $self;
	}

	public function __construct( Title $title, array $params = [] ) {
		parent::__construct( __CLASS__, $title, $params );
		$this->bundleMover = Services::getInstance()->getTranslatableBundleMover();
	}

	public function run() {
		$sourceTitle = Title::newFromText( $this->params['source'] );
		$targetTitle = Title::newFromText( $this->params['target'] );
		$performer = User::newFromName( $this->params['performer'] );

		$this->bundleMover->moveSynchronously(
			$sourceTitle,
			$targetTitle,
			$this->params['moves'],
			$performer,
			$this->params['summary']
		);

		return true;
	}
}
