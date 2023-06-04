<?php
/**
 * Schemas Template.
 *
 * @package Schema Pro
 * @since 1.0.0
 */

if ( ! class_exists( 'BSF_AIOSRS_Pro_Schema_Video_Object' ) ) {

	/**
	 * AIOSRS Schemas Initialization
	 *
	 * @since 1.0.0
	 */
	class BSF_AIOSRS_Pro_Schema_Video_Object {

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
			$schema['@type']    = 'VideoObject';

			$schema['name'] = ! empty( $data['name'] ) ? wp_strip_all_tags( (string)$data['name'] ) : NULL;

			$schema['description'] = ! empty( $data['description'] ) ? wp_strip_all_tags( (string)$data['description'] ) : NULL;

			if ( isset( $data['orgnization-name'] ) && ! empty( $data['orgnization-name'] ) ) {
				$schema['publisher']['@type'] = 'Organization';
				$schema['publisher']['name']  = wp_strip_all_tags( (string)$data['orgnization-name'] );
			}

			if ( isset( $data['site-logo'] ) && ! empty( $data['site-logo'] ) ) {
				$schema['publisher']['@type'] = 'Organization';
				$schema['publisher']['logo']  = BSF_AIOSRS_Pro_Schema_Template::get_image_schema( $data['site-logo'], 'ImageObject' );
			}

			if ( isset( $data['image'] ) && ! empty( $data['image'] ) ) {
				$schema['thumbnailUrl'] = BSF_AIOSRS_Pro_Schema_Template::get_image_schema( $data['image'], 'URL' );
			}

			$schema['uploadDate'] = ! empty( $data['upload-date'] ) ? wp_strip_all_tags( (string)$data['upload-date'] ) : NULL;

			$schema['duration'] = ! empty( $data['duration'] ) ? wp_strip_all_tags( (string)$data['duration'] ) : NULL;

			if ( isset( $data['content-url'] ) && ! empty( $data['content-url'] ) ) {
				$schema['contentUrl'] = esc_url( $data['content-url'] );
			}

			if ( isset( $data['embed-url'] ) && ! empty( $data['embed-url'] ) ) {
				$schema['embedUrl'] = esc_url( $data['embed-url'] );
			}

			$schema['expires'] = ! empty( $data['expires-date'] ) ? wp_strip_all_tags( (string)$data['expires-date'] ) : NULL;

			$schema['interactionCount'] = ! empty( $data['interaction-count'] ) ? wp_strip_all_tags( (string)$data['interaction-count'] ) : NULL;

			return apply_filters( 'wp_schema_pro_schema_video_object', $schema, $data, $post );
		}

	}
}
