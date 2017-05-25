<?php
//* Single degree page template
/** Remove Genesis loop and sidebar */

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

add_action( 'genesis_entry_content', 'mbu_fac_single_loop' );
function mbu_fac_single_loop() { ?>

    <?php
    if ( has_post_thumbnail() ) : ?>
        <div class="fac-single">
        	<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" title="<?php the_title_attribute(); ?>" style="align:right;"/><br />
            <a href="<?php the_post_thumbnail_url(); ?>" target="_blank" title="Download Image"><i class="fa fa-download" aria-hidden="true"></i> Download Image</a></p>
            <a href="/forms/update-faculty-information/" target="_blank"><i class="fa fa-pencil" aria-hidden="true"></i> Update Information</a>
        </div>
    <?php endif;

    if( get_field('fac_title') ): ?>
        <h4>Title</h4>
            <?php the_field( 'fac_title' ); ?></p>
    <?php endif; ?>

    <?php

    $depts = get_the_terms( get_the_ID() , 'school' );

    if( $depts ): ?>

    	<h4>Department</h4>

    	<?php foreach( $depts as $dept ): ?>

    		<?php echo $dept->name; ?></p>

    	<?php endforeach; ?>

    <?php endif; ?>

    <?php
    // creds
    if( have_rows('fac_credentials') ): ?>
    <h4>Credentials</h4>
    <ul>

        <?php while ( have_rows('fac_credentials') ) : the_row(); ?>

            <li><?php the_sub_field('fac_credential'); ?></li>

        <?php endwhile; ?>

          </ul>
    <?php
    else :

    endif;

    if( get_field('fac_experience') ): ?>
        <h4>Experience</h4>
        <p><?php the_field( 'fac_experience' ); ?></p>
    <?php endif; ?>

    <?php if( get_field('fac_about') ): ?>
        <h4>About</h4>
        <p><?php the_field( 'fac_about' ); ?></p>
    <?php endif; ?>
    <a href="/faculty"><i class="fa fa-hand-o-left" aria-hidden="true"></i> Back to Faculty List</a>
    <?php

}
genesis();
