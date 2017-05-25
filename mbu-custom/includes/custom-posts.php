<?php

global $blog_id;

// main site
if ($blog_id == 1) {

  // Form Pages
  register_via_cpt_core(
    array(
      'Form Page',
      'Form Pages',
      'forms'
    ),
    array(
      'menu_icon' => 'dashicons-feedback',
      'publicly_queryable' => true,
      'supports' => array( 'title' ),
      'menu_position' => 100,
      'has_archive'         => false,
      'capability_type'     => 'forms',
      'map_meta_cap'        => true,
      )
  );

  // Scholarship CPT
  register_via_cpt_core(
    array(
      'Scholarship',
      'Scholarships',
      'scholarship'
    ),
    array(
      'menu_icon' => 'dashicons-awards',
      'publicly_queryable' => true,
      'supports' => array( 'title', 'thumbnail', 'editor' ),
      'menu_position' => 100,
      'has_archive'         => false,
      'capability_type'     => 'finance',
      'map_meta_cap'        => true,
    )
  );

  // Course Pages
  register_via_cpt_core(
    array(
      'Course List',
      'Course Lists',
      'courselist'
    ),
    array(
      'menu_icon' => 'dashicons-awards',
      'publicly_queryable' => true,
      'supports' => array( 'title', 'thumbnail' ),
      'menu_position' => 100,
      'capability_type'     => 'academic',
      'has_archive'         => false,
      'map_meta_cap'        => true,
      )
  );

  // Graduate Program CPT
  register_via_cpt_core(
    array(
      'Graduate Program',
      'Graduate',
      'graduate'
    ),
    array(
      'menu_icon' => 'dashicons-welcome-learn-more',
      'publicly_queryable' => true,
      'supports' => array( 'title', 'thumbnail' ),
      'menu_position' => 100,
      'capability_type'     => 'graduates',
      'has_archive'         => false,
      'map_meta_cap'        => true,
    )
  );

  // Associate Program CPT
  register_via_cpt_core(
    array(
      'Associate Program',
      'Associate',
      'associate'
    ),
    array(
      'menu_icon' => 'dashicons-awards',
      'publicly_queryable' => true,
      'supports' => array( 'title', 'thumbnail' ),
      'menu_position' => 100,
      'capability_type'     => 'degree',
      'has_archive'         => false,
      'map_meta_cap'        => true,
    )
  );

  // Major CPT
  register_via_cpt_core(
    array(
      'Major',
      'Majors',
      'major'
    ),
    array(
      'menu_icon' => 'dashicons-media-spreadsheet',
      'publicly_queryable' => true,
      'supports' => array( 'title', 'thumbnail', ),
      'menu_position' => 100,
      'capability_type'     => 'degree',
      'map_meta_cap'        => true,
      'has_archive'         => false,
    )
  );

  // Faculty CPT
  register_via_cpt_core(
    array(
      'Faculty',
      'Faculty',
      'faculty'
    ),
    array(
      'menu_icon' => 'dashicons-businessman',
      'publicly_queryable' => true,
      'supports' => array( 'title', 'thumbnail', 'editor', 'excerpt', 'genesis-cpt-archives-settings' ),
      'menu_position' => 100,
      'capability_type'     => 'faculty',
      'map_meta_cap'        => true,
      'has_archive' => false
    )
  );

  // School/College
  register_via_cpt_core(
    array(
      'School/College',
      'Schools/Colleges',
      'school'
    ),
    array(
      'menu_icon' 			=> 'dashicons-admin-multisite',
      'publicly_queryable' 	=> true,
      'supports' 				=> array( 'title', 'thumbnail', 'excerpt' ),
      'menu_position' 		=> 100,
      'has_archive'       => false,
      'capability_type'     => 'school',
      'map_meta_cap'        => true,
    )
  );

}

// online
elseif ($blog_id == 15) {

  // Degree CPT
  register_via_cpt_core(
   array(
     'Degree',
     'Degrees',
     'degree'
   ),
   array(
     'menu_icon' => 'dashicons-welcome-learn-more',
     'publicly_queryable' => true,
     'supports' => array( 'title', 'thumbnail' ),
     'menu_position' => 100,
     'map_meta_cap'        => true,
     'taxonomies'  => array( 'category' ),
     'has_archive'         => false,
   )
  );

  // Course CPT
  register_via_cpt_core(
   array(
     'Course',
     'Courses',
     'course'
   ),
   array(
     'menu_icon' => 'dashicons-edit',
     'publicly_queryable' => true,
     'supports' => array( 'title', 'thumbnail', 'editor' ),
     'menu_position' => 100,
     'hierarchical'       => true,
     'has_archive'         => true,
     'taxonomies'  => array( 'category' ),

   )
   );
}


else {

}
