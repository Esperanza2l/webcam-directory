<?php
/**
 * Plugin Name:       Webcam Directory
 * Plugin URI:        https://github.com/Esperanza2l/webcam-directory
 * Description:       A lightweight, responsive webcam directory displayed with the [webcam_directory] shortcode.
 * Version:           2.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            Esperanza2l
 * Author URI:        https://github.com/Esperanza2l
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       webcam-directory
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WEBCAM_DIRECTORY_VERSION', '2.0.0' );

/**
 * Returns the demo webcams shown in the directory.
 *
 * @return array[] List of webcams.
 */
function webcam_directory_get_webcams() {
	return array(
		array(
			'name'        => 'Harbor Lights Live',
			'category'    => 'Lifestyle',
			'status'      => 'online',
			'description' => 'A relaxed view of a fictional harbor at dusk, with boats drifting past.',
			'url'         => 'https://example.com/webcams/harbor-lights',
		),
		array(
			'name'        => 'Studio Session Cam',
			'category'    => 'Music',
			'status'      => 'online',
			'description' => 'Rehearsals and acoustic sets from a small demo recording studio.',
			'url'         => 'https://example.com/webcams/studio-session',
		),
		array(
			'name'        => 'Pixel Arena',
			'category'    => 'Gaming',
			'status'      => 'offline',
			'description' => 'Retro game speedruns and casual play-throughs. Back soon.',
			'url'         => 'https://example.com/webcams/pixel-arena',
		),
		array(
			'name'        => 'Sketchbook Corner',
			'category'    => 'Creative',
			'status'      => 'online',
			'description' => 'Watch illustrations come together, one line at a time.',
			'url'         => 'https://example.com/webcams/sketchbook-corner',
		),
		array(
			'name'        => 'Late Night Lounge',
			'category'    => 'Entertainment',
			'status'      => 'offline',
			'description' => 'Comedy sketches, quizzes and light-hearted talk shows.',
			'url'         => 'https://example.com/webcams/late-night-lounge',
		),
		array(
			'name'        => 'Neighborhood Garden',
			'category'    => 'Community',
			'status'      => 'online',
			'description' => 'A shared community garden, from morning watering to evening harvest.',
			'url'         => 'https://example.com/webcams/neighborhood-garden',
		),
	);
}

/**
 * Registers the plugin stylesheet. It is only enqueued when the shortcode is used.
 */
function webcam_directory_register_assets() {
	wp_register_style(
		'webcam-directory',
		plugins_url( 'assets/css/webcam-directory.css', __FILE__ ),
		array(),
		WEBCAM_DIRECTORY_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'webcam_directory_register_assets' );

/**
 * Renders the [webcam_directory] shortcode.
 *
 * Attributes:
 * - limit    Maximum number of webcams to show (default 6).
 * - category Only show webcams from this category (default: all).
 *
 * @param array $atts Shortcode attributes.
 * @return string HTML output.
 */
function webcam_directory_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'limit'    => 6,
			'category' => '',
		),
		$atts,
		'webcam_directory'
	);

	$limit    = absint( $atts['limit'] );
	$category = sanitize_text_field( $atts['category'] );
	$webcams  = webcam_directory_get_webcams();

	if ( '' !== $category ) {
		$webcams = array_filter(
			$webcams,
			function ( $webcam ) use ( $category ) {
				return 0 === strcasecmp( $webcam['category'], $category );
			}
		);
	}

	if ( $limit > 0 ) {
		$webcams = array_slice( $webcams, 0, $limit );
	}

	wp_enqueue_style( 'webcam-directory' );

	if ( empty( $webcams ) ) {
		return '<p class="webcam-directory-empty">' . esc_html__( 'No webcams found.', 'webcam-directory' ) . '</p>';
	}

	ob_start();
	?>
	<div class="webcam-directory">
		<?php foreach ( $webcams as $webcam ) : ?>
			<?php $is_online = ( 'online' === $webcam['status'] ); ?>
			<article class="webcam-directory__card">
				<div class="webcam-directory__meta">
					<span class="webcam-directory__category"><?php echo esc_html( $webcam['category'] ); ?></span>
					<span class="webcam-directory__status webcam-directory__status--<?php echo esc_attr( $webcam['status'] ); ?>">
						<?php echo $is_online ? esc_html__( 'Online', 'webcam-directory' ) : esc_html__( 'Offline', 'webcam-directory' ); ?>
					</span>
				</div>
				<h3 class="webcam-directory__name"><?php echo esc_html( $webcam['name'] ); ?></h3>
				<p class="webcam-directory__description"><?php echo esc_html( $webcam['description'] ); ?></p>
				<a class="webcam-directory__link" href="<?php echo esc_url( $webcam['url'] ); ?>"><?php esc_html_e( 'View Webcam', 'webcam-directory' ); ?></a>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'webcam_directory', 'webcam_directory_shortcode' );
