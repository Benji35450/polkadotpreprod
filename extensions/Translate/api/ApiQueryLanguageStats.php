<?php
/**
 * Api module for language group stats.
 *
 * @file
 * @author Niklas Laxström
 * @license GPL-2.0-or-later
 */

use Wikimedia\ParamValidator\ParamValidator;

/**
 * Api module for querying language stats.
 *
 * @ingroup API TranslateAPI
 * @since 2012-11-30
 */
class ApiQueryLanguageStats extends ApiStatsQuery {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'ls' );
	}

	// ApiStatsQuery methods

	/** @inheritDoc */
	protected function validateTargetParamater( array $params ) {
		$requested = $params[ 'language' ];
		if ( !TranslateUtils::isSupportedLanguageCode( $requested ) ) {
			$this->dieWithError( [ 'apierror-translate-invalidlanguage', $requested ] );
		}

		return $requested;
	}

	/** @inheritDoc */
	protected function loadStatistics( $target, $flags = 0 ) {
		$groupId = $this->getParameter( 'group' );
		$group = $groupId !== null ? MessageGroups::getGroup( $groupId ) : null;
		if ( $groupId ) {
			if ( !$group ) {
				$this->dieWithError( [ 'apierror-badparameter', 'group' ] );
			}

			return [ $groupId => MessageGroupStats::forItem( $group->getId(), $target, $flags ) ];
		} else {
			return MessageGroupStats::forLanguage( $target, $flags );
		}
	}

	/** @inheritDoc */
	protected function makeItem( $item, $stats ) {
		$data = parent::makeItem( $item, $stats );
		$data['group'] = $item;

		return $data;
	}

	/** @inheritDoc */
	protected function getCacheRebuildJob( string $target ): IJobSpecification {
		return MessageGroupStatsRebuildJob::newJob( [ 'languagecode' => $target ] );
	}

	// Api methods

	/** @inheritDoc */
	protected function getAllowedParams() {
		$params = parent::getAllowedParams();
		$params['language'] = [
			ParamValidator::PARAM_TYPE => 'string',
			ParamValidator::PARAM_REQUIRED => true,
		];

		$params['group'] = [
			ParamValidator::PARAM_TYPE => 'string',
		];

		return $params;
	}

	/** @inheritDoc */
	protected function getExamplesMessages() {
		return [
			'action=query&meta=languagestats&lslanguage=fi'
				=> 'apihelp-query+languagestats-example-1',
			'action=query&meta=languagestats&lslanguage=fi&group=A'
				=> 'apihelp-query+languagestats-example-2'
		];
	}
}
