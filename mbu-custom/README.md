# mbu-custom
Simple plugin for Custom Post Types and Taxonomies. Plugin builds on GPLv3 via WebDev Studios.

## Custom Post Types

~~~~
register_via_cpt_core(
  array(
    '[cpt-single]',
    '[cpt-plural]',
    '[cpt-slug]'
  ),
  array(
    'menu_icon' => 'dashicons-[...]',
    'publicly_queryable' => true,
    'supports' => array( 'title', [etc] ),
    'menu_position' => [000],
    'has_archive'         => [true/false],
    'capability_type'     => '[xxx]',
    'map_meta_cap'        => true,
    )
);
~~~~

## Custom Taxonomy

~~~~
register_via_taxonomy_core(
array(
  '[tax-single]',
  '[tax-plural]',
  '[tax-slug]',
  array(
     'public' => [true/false],
     'rewrite' => [true/false]
  )
),
array(),
array(
  '[post(s) to target]',
)
);
~~~~
