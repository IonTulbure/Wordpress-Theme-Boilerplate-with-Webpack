<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

// You can alter these values if needed
add_filter( 'generateblocks_defaults', function( $defaults ) {
    $defaults['container']['containerWidth'] = '1200';

    return $defaults;
} );

// Don't touch the following code
add_action( 'admin_footer', function() {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return;
	}

	$screen = get_current_screen();

	if ( ! $screen->is_block_editor ) {
		return;
	}
	?>
	<script>
		wp.hooks.addFilter(
			'generateblocks.editor.showPanel',
			'removeDocumentationPanels',
			function( showPanel, id ) {
				var panels = [ 'buttonContainerDocumentation', 'buttonDocumentation', 'containerDocumentation', 'gridDocumentation', 'headlineDocumentation' ];

				if ( panels.includes( id ) ) {
					showPanel = false;
				}

				return showPanel;
			}
		);
	</script>
	<?php
} );