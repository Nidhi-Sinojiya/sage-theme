<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>

  <?php if( !is_front_page() && is_home() ){ 
    $header_style = get_field('header_style', get_option('page_for_posts')); 
  } else { 
    $header_style = get_field('header_style', get_the_ID()); 
  } 
  if(is_single() && 'post' == get_post_type() ){
    $header_style = 'wilder';
  }

  if(is_404() || is_page_template( 'template-thanks.blade.php' ) || is_search()){
    $header_style = 'wilder';
  }
  if($header_style == 'wilder'){ 
    $bodyClass = "bg_black";
  }else{
    $bodyClass = $header_style ." micro-site";
  }
  ?>
  <body class="front <?php echo $bodyClass; ?>">
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
