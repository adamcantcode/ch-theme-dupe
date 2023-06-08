<?php
/**
 * Schemas Template.
 *
 * @package Schema Pro
 * @since 1.0.0
 */

if ( ! class_exists( 'BSF_AIOSRS_Pro_Schema_Event' ) ) {

	/**
	 * AIOSRS Schemas Initialization
	 *
	 * @since 1.0.0
	 */
	class BSF_AIOSRS_Pro_Schema_Event {

		/**
		 * Render Schema.
		 *
		 * @param  array $data Meta Data.
		 * @param  array $post Current Post Array.
		 * @return array
		 */
		public static function render( $data, $post ) {
			$schema = array();

			$schema['@context'] = 'https://schema.org';

			if ( isset( $data['schema-type'] ) && ! empty( $data['schema-type'] ) ) {
				$schema['@type'] = $data['schema-type'];
			}

			$schema = self::prepare_basics( $schema, $data );
			$schema = self::prepare_attendence_mode( $schema, $data );
			$schema = self::prepare_location_by_attendence_mode( $schema, $data );
			$schema = self::prepare_dates( $schema, $data );
			$schema = self::prepare_offer( $schema, $data );
			$schema = self::prepare_performer( $schema, $data );

			return apply_filters( 'wp_schema_pro_schema_event', $schema, $data, $post );
		}

		/**
		 * Prepare location by attendence mode schema field.
		 *
		 * @param  array $schema schema.
		 * @param  array $data data.
		 * @return array
		 */
		public static function prepare_location_by_attendence_mode( $schema, $data ) {

			if ( 'OnlineEventAttendanceMode' === $data['event-attendance-mode'] ) {
				$schema = self::prepare_location( $schema, $data, false );
			} elseif ( 'OfflineEventAttendanceMode' === $data['event-attendance-mode'] ) {
				$schema = self::prepare_location( $schema, $data, true );
			} else {
				$online_location    = self::prepare_location( $schema, $data, false );
				$offline_location   = self::prepare_location( $schema, $data, true );
				$schema['location'] = array( $online_location['location'], $offline_location['location'] );
			}

			return $schema;
		}

		/**
		 * Prepare location schema field.
		 *
		 * @param  array   $schema schema.
		 * @param  array   $data data.
		 * @param  boolean $offline offline.
		 * @return array
		 */
		public static function prepare_location( $schema, $data, $offline = true ) {

			if ( $offline ) {
				if ( ! empty( $data['location'] ) ) {
					$schema['location']['@type'] = 'Place';
					$schema['location']['name']  = wp_strip_all_tags( (string)$data['location'] );
				}

				$schema['location']['@type']            = 'Place';
				$schema['location']['address']['@type'] = 'PostalAddress';
				$schema['location']['address']['streetAddress'] = ! empty( $data['location-street'] ) ? wp_strip_all_tags( (string)$data['location-street'] ) : NULL;
				$schema['location']['address']['addressLocality'] = ! empty( $data['location-locality'] ) ? wp_strip_all_tags( (string)$data['location-locality'] ) : NULL;
				$schema['location']['address']['postalCode'] = ! empty( $data['location-postal'] ) ? wp_strip_all_tags( (string)$data['location-postal'] ) : NULL;
				$schema['location']['address']['addressRegion'] = ! empty( $data['location-region'] ) ? wp_strip_all_tags( (string)$data['location-region'] ) : NULL;
				if ( ! empty( $data['location-country'] ) ) {

					$schema['location']['address']['addressCountry']['@type'] = 'Country';
					$schema['location']['address']['addressCountry']['name']  = wp_strip_all_tags( (string)$data['location-country'] );
				}
			} else {
				$schema['location']['@type'] = 'VirtualLocation';
				$schema['location']['url']   = esc_url( $data['online-location'] );
			}
			return $schema;
		}

		/**
		 * Prepare Offer schema field.
		 *
		 * @param  array $schema schema.
		 * @param  array $data data.
		 * @return array
		 */
		public static function prepare_offer( $schema, $data ) {

			$schema['offers']['@type'] = 'Offer';
			$schema['offers']['price'] = '0';
			$schema['offers']['price'] = ! empty( $data['price'] ) ? wp_strip_all_tags( (string)$data['price'] ) : NULL;
			$schema['offers']['availability'] = ! empty( $data['avail'] ) ? wp_strip_all_tags( (string)$data['avail'] ) : NULL;
			$schema['offers']['priceCurrency'] = ! empty( $data['currency'] ) ? wp_strip_all_tags( (string)$data['currency'] ) : NULL;
			$schema['offers']['validFrom'] = ! empty( $data['valid-from'] ) ? wp_strip_all_tags( (string)$data['valid-from'] ) : NULL;
			if ( isset( $data['ticket-buy-url'] ) && ! empty( $data['ticket-buy-url'] ) ) {
				$schema['offers']['url'] = esc_url( $data['ticket-buy-url'] );
			}

			return $schema;

		}

		/**
		 * Prepare Performer schema field.
		 *
		 * @param  array $schema schema.
		 * @param  array $data data.
		 * @return array
		 */
		public static function prepare_performer( $schema, $data ) {

			if ( ! empty( $data['performer'] ) ) {
				$schema['performer']['@type'] = 'Person';
				$schema['performer']['name']  = wp_strip_all_tags( (string)$data['performer'] );
			}
			$schema['organizer']['@type'] = 'Organization';
			$schema['organizer']['name'] = ! empty( $data['event-organizer-name'] ) ? wp_strip_all_tags( (string)$data['event-organizer-name'] ) : NULL;
			$schema['organizer']['url'] = ! empty( $data['event-organizer-url'] ) ? wp_strip_all_tags( (string)$data['event-organizer-url'] ) : NULL;

			return $schema;
		}

		/**
		 * Prepare dates schema field.
		 *
		 * @param  array $schema schema.
		 * @param  array $data data.
		 * @return array
		 */
		public static function prepare_dates( $schema, $data ) {

			$start_date = gmdate( DATE_ISO8601, strtotime( $data['start-date'] ) );
			$schema['startDate'] = ! empty( $start_date ) ? wp_strip_all_tags( (string)$start_date ) : NULL;

			$schema['endDate'] = ! empty( $data['end-date'] ) ? wp_strip_all_tags( (string)$data['end-date'] ) : NULL;

			$schema['previousStartDate'] = 'EventRescheduled' === $data['event-status'] ? wp_strip_all_tags( (string)$data['previous-date'] ) : NULL;

			return $schema;
		}

		/**
		 * Prepare attendence schema field.
		 *
		 * @param  array $schema schema.
		 * @param  array $data data.
		 * @return array
		 */
		public static function prepare_attendence_mode( $schema, $data ) {

			$schema['eventAttendanceMode'] = isset( $data['schema-type'] ) && ! empty( $data['event-attendance-mode'] ) ? 'https://schema.org/' . wp_strip_all_tags( (string)$data['event-attendance-mode'] ) : NULL;

			return $schema;
		}

		/**
		 * Prepare basic schema field.
		 *
		 * @param  array $schema schema.
		 * @param  array $data data.
		 * @return array
		 */
		public static function prepare_basics( $schema, $data ) {

			$schema['name'] = ! empty( $data['name'] ) ? wp_strip_all_tags( (string)$data['name'] ) : NULL;

			$schema['eventStatus'] = ! empty( $data['event-status'] ) ? 'https://schema.org/' . wp_strip_all_tags( (string)$data['event-status'] ) : NULL;

			if ( isset( $data['image'] ) && ! empty( $data['image'] ) ) {
				$schema['image'] = BSF_AIOSRS_Pro_Schema_Template::get_image_schema( $data['image'] );
			}

			$schema['description'] = ! empty( $data['description'] ) ? wp_strip_all_tags( (string)$data['description'] ) : NULL;

			return $schema;
		}
	}
}
