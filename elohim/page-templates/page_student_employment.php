<?php
/**
* Template Name: Student Employment
* Description: Used as Academic Policies page template.
*/

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
// Show Flexible Content field in the content area
add_action( 'genesis_entry_content', 'mbu_display_menu' );
// Function displaying Flexible Content Field
function mbu_display_menu() { ?>

	<?php

				// breakfast loop
				if( have_rows('vacancy' ) ):
					while ( have_rows('vacancy') ) : the_row(); ?>
							<h3><?php the_sub_field( 'position_title' ); ?></h3>
							<p><?php the_sub_field( 'vacancy_announcement' ); ?></p>
							<?php if( get_sub_field( 'contact_email' ) ): ?>
								For more information about the position, <a href="mailto:<?php the_sub_field( 'contact_email' ); ?>">contact <?php the_sub_field( 'posting_office' ); ?></a>
							<?php endif; ?>
							<p><a class="button ghost dark" style="margin-left:0;" href="/forms/student-employment-application/">Apply Now</a>
							<?php if( get_sub_field( 'position_description' ) ): ?>
								<a class="button ghost dark" target="_blank" href="<?php the_sub_field( 'position_description' ); ?>">Position Description</a>
							<?php endif; ?>
					<?php endwhile; ?>

				<?php endif;

}
genesis();
