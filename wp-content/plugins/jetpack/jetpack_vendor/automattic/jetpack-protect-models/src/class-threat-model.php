<?php
/**
 * Model class for threat data.
 *
 * @package automattic/jetpack-protect-models
 */

namespace Automattic\Jetpack\Protect_Models;

/**
 * Model class for threat data.
 */
class Threat_Model {

	/**
	 * Threat ID.
	 *
	 * @var null|string
	 */
	public $id;

	/**
	 * Threat Signature.
	 *
	 * @var null|string
	 */
	public $signature;

	/**
	 * Threat Title.
	 *
	 * @var null|string
	 */
	public $title;

	/**
	 * Threat Description.
	 *
	 * @var null|string
	 */
	public $description;

	/**
	 * The data the threat was first detected.
	 *
	 * @var null|string
	 */
	public $first_detected;

	/**
	 * The version the threat is fixed in.
	 *
	 * @var null|string
	 */
	public $fixed_in;

	/**
	 * The date the threat is fixed on.
	 *
	 * @var null|string
	 */
	public $fixed_on;

	/**
	 * The severity of the threat between 1-5.
	 *
	 * @var null|int
	 */
	public $severity;

	/**
	 * Information about the auto-fix available for this threat. False when not auto-fixable.
	 *
	 * @var null|bool|object
	 */
	public $fixable;

	/**
	 * The current status of the threat.
	 *
	 * @var null|string
	 */
	public $status;

	/**
	 * The filename of the threat.
	 *
	 * @var null|string
	 */
	public $filename;

	/**
	 * The context of the threat.
	 *
	 * @var null|object
	 */
	public $context;

	/**
	 * The database table of the threat.
	 *
	 * @var null|string
	 */
	public $table;

	/**
	 * The source URL of the threat.
	 *
	 * @var null|string
	 */
	public $source;

	/**
	 * The threat's extension information.
	 *
	 * @since 0.4.0
	 *
	 * @var null|Extension_Model
	 */
	public $extension;

	/**
	 * Threat Constructor
	 *
	 * @param array|object $threat Threat data to load into the class instance.
	 */
	public function __construct( $threat ) {
		if ( is_object( $threat ) ) {
			$threat = (array) $threat;
		}

		foreach ( $threat as $property => $value ) {
			if ( 'extension' === $property && ! empty( $value ) ) {
				$this->extension = new Extension_Model( $value );
				continue;
			}
			if ( property_exists( $this, $property ) ) {
				$this->$property = $value;
			}
		}
	}
}
