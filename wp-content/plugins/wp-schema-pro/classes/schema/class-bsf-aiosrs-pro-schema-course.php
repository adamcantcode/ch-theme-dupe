<?php
/**
 * Schemas Template.
 *
 * @package Schema Pro
 * @since 1.0.0
 */

if ( ! class_exists( 'BSF_AIOSRS_Pro_Schema_Course' ) ) {

	/**
	 * AIOSRS Schemas Initialization
	 *
	 * @since 1.0.0
	 */
	class BSF_AIOSRS_Pro_Schema_Course {

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
			$schema['@type']    = 'Course';

			$schema['name'] = ! empty( $data['name'] ) ? wp_strip_all_tags( (string)$data['name'] ) : NULL;

			$schema['courseCode'] = ! empty( $data['course-code'] ) ? wp_strip_all_tags( (string)$data['course-code'] ) : NULL;

			$schema['description'] = ! empty( $data['description'] ) ? wp_strip_all_tags( (string)$data['description'] ) : NULL;

			if ( isset( $data['course-instance'] ) && ! empty( $data['course-instance'] ) ) {

				foreach ( $data['course-instance'] as $key => $value ) {

					if ( isset( $value['name'] ) && ! empty( $value['name'] ) ||
						isset( $value['description'] ) && ! empty( $value['description'] ) ||
						isset( $value['start-date'] ) && ! empty( $value['start-date'] ) ||
						isset( $value['location-address'] ) && ! empty( $value['location-address'] ) ) {

						$schema['hasCourseInstance'][ $key ]['@type'] = 'CourseInstance';
						$schema['hasCourseInstance'][ $key ]['name'] = ! empty( $value['name'] ) ? wp_strip_all_tags( (string)$value['name'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['description'] = ! empty( $value['description'] ) ? wp_strip_all_tags( (string)$value['description'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['courseMode'] = ! empty( $value['course-mode'] ) ? wp_strip_all_tags( (string)$value['course-mode'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['eventStatus'] = ! empty( $value['event-status'] ) ? wp_strip_all_tags( (string)$value['event-status'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['eventAttendanceMode'] = ! empty( $value['event-attendance-mode'] ) ? wp_strip_all_tags( (string)$value['event-attendance-mode'] ) : NULL;

						if ( ! empty( $value['start-date'] ) ) {
							if ( 'OfflineEventAttendanceMode' !== isset( $value['event-attendance-mode'] ) ) {
								$start_date                                       = gmdate( DATE_ISO8601, strtotime( $value['start-date'] ) );
								$schema['hasCourseInstance'][ $key ]['startDate'] = wp_strip_all_tags( (string)$start_date );
							} else {
								$schema['hasCourseInstance'][ $key ]['startDate'] = wp_strip_all_tags( (string)$value['start-date'] );
							}
						}

						$schema['hasCourseInstance'][ $key ]['endDate'] = ! empty( $value['end-date'] ) ? wp_strip_all_tags( (string)$value['end-date'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['previousStartDate'] = ! empty( $value['previous-date'] ) ? wp_strip_all_tags( (string)$value['previous-date'] ) : NULL;

						if ( isset( $value['online-location'] ) && ! empty( $value['online-location'] ) && 'OfflineEventAttendanceMode' !== $value['event-attendance-mode'] || 'MixedEventAttendanceMode' === $value['event-attendance-mode'] ) {
							$schema['hasCourseInstance'][ $key ]['location']['@type'] = 'VirtualLocation';
							$schema['hasCourseInstance'][ $key ]['location']['url']   = esc_url( $value['online-location'] );
						}

						if ( isset( $value['image'] ) && ! empty( $value['image'] ) ) {
							$schema['hasCourseInstance'][ $key ]['image'] = BSF_AIOSRS_Pro_Schema_Template::get_image_schema( $value['image'] );
						}

						if ( ! empty( $value['location-name'] ) && 'OnlineEventAttendanceMode' !== $value['event-attendance-mode'] ) {
							$schema['hasCourseInstance'][ $key ]['location']['@type'] = 'Place';
							$schema['hasCourseInstance'][ $key ]['location']['name']  = wp_strip_all_tags( (string)$value['location-name'] );
						}

						if ( ! empty( $value['location-address'] ) && 'OnlineEventAttendanceMode' !== $value['event-attendance-mode'] && is_string( $value['location-address'] ) ) {
							$schema['hasCourseInstance'][ $key ]['location']['@type']   = 'Place';
							$schema['hasCourseInstance'][ $key ]['location']['address'] = wp_strip_all_tags( (string)$value['location-address'] );
						}

						$schema['hasCourseInstance'][ $key ]['organizer']['@type'] = 'Organization';
						$schema['hasCourseInstance'][ $key ]['organizer']['name'] = ! empty( $value['course-organizer-name'] ) ? wp_strip_all_tags( (string)$value['course-organizer-name'] ) : NULL;
						$schema['hasCourseInstance'][ $key ]['organizer']['url'] = ! empty( $value['course-organizer-url'] ) ? wp_strip_all_tags( (string)$value['course-organizer-url'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['offers']['@type'] = 'Offer';
						$schema['hasCourseInstance'][ $key ]['offers']['price'] = '0';

						$schema['hasCourseInstance'][ $key ]['offers']['price'] = ! empty( $value['price'] ) ? wp_strip_all_tags( (string)$value['price'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['offers']['priceCurrency'] = ! empty( $value['currency'] ) ? wp_strip_all_tags( (string)$value['currency'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['offers']['url'] = ! empty( $value['url'] ) ? wp_strip_all_tags( (string)$value['url'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['offers']['validFrom'] = ! empty( $value['valid-from'] ) ? wp_strip_all_tags( (string)$value['valid-from'] ) : NULL;

						$schema['hasCourseInstance'][ $key ]['offers']['availability'] = ! empty( $value['avail'] ) ? wp_strip_all_tags( (string)$value['avail'] ) : NULL;

						if ( ! empty( $value['performer'] ) ) {
							$schema['hasCourseInstance'][ $key ]['performer']['@type'] = 'Person';
							$schema['hasCourseInstance'][ $key ]['performer']['name']  = wp_strip_all_tags( (string)$value['performer'] );
						}
					}
				}
			}

			if ( ( isset( $data['orgnization-name'] ) && ! empty( $data['orgnization-name'] ) ) ||
				( isset( $data['same-as'] ) && ! empty( $data['same-as'] ) ) ) {

				$schema['provider']['@type'] = 'Organization';

				$schema['provider']['name'] = ! empty( $data['orgnization-name'] ) ? wp_strip_all_tags( (string)$data['orgnization-name'] ) : NULL;
				if ( isset( $data['same-as'] ) && ! empty( $data['same-as'] ) ) {
					$schema['provider']['sameAs'] = esc_url( $data['same-as'] );
				}
			}

			if ( ( isset( $data['rating'] ) && ! empty( $data['rating'] ) ) ||
				( isset( $data['review-count'] ) && ! empty( $data['review-count'] ) ) ) {

				$schema['aggregateRating']['@type'] = 'AggregateRating';

				$schema['aggregateRating']['ratingValue'] = ! empty( $data['rating'] ) ? wp_strip_all_tags( (string)$data['rating'] ) : NULL;
				$schema['aggregateRating']['reviewCount'] = ! empty( $data['review-count'] ) ? wp_strip_all_tags( $data['review-count'] ) : NULL;
			}

			return apply_filters( 'wp_schema_pro_schema_course', $schema, $data, $post );
		}

	}
}
