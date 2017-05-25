<?php

global $blog_id;

// main site
if ($blog_id == 1) {

   // Offered format taxonomoy
   register_via_taxonomy_core(
   array(
     'Page Category',
     'Page Categories',
     'page_category',
     array(
        'public' => false,
        'rewrite' => false
     )
   ),
   array(),
   array(
     'page',
   )
   );

   // School taxonomoy
   register_via_taxonomy_core(
     array(
       'School',
       'Schools',
       'school'
     ),
     array(),
     array(
       'major',
       'faculty',
       'school'
       )
   );

}

else {
}
