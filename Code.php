This code is to be added to APPEARANCE > FUNCTIONS.PHP

The beauty of this code is that it is developed for compatibility of including multiple categories since the original code only allows you to add a specific category. The array lets you add more than one category.


function wpse188669_pre_get_posts( $query ) {

if (

! is_admin()

&& $query->is_main_query()

&& $query->is_search()

) {

$query->set( 'post_type', array( 'product' ) );

$tax_query = array(

array(


'taxonomy' => 'product_cat',

'field'   => 'slug',

'terms'   => array('category-slug-1', 'category-slug-2', 'category-slug-3'),

'operator' => 'NOT IN',

),

);

$query->set( 'tax_query', $tax_query );

}

}