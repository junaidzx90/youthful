<?php
$defaults = array(
  'container'            => '',
  'container_class'      => 'collapse navbar-collapse"',
  'container_id'         => 'navbarNavDropdown',
  'menu_class'           => 'navbar-nav w-100',
  'menu_id'              => '',
  'fallback_cb'          => '',
  'before'               => '',
  'after'                => '',
  'link_before'          => '',
  'link_after'           => '',
  'depth'                => 0,
  'walker'=> new Youthful_walker_menu(),
  'theme_location', __('top_menu','youthful')
);
?>
<!-- Navbar start -->
<nav class="navbar navbar-expand-lg smart-nav navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo esc_url( home_url("/") ); ?>" title="<?php echo esc_url( home_url("/") ); ?>">
      <?php
        if ( function_exists( 'get_logo' ) ) {
          echo '<img src="'.get_logo().'" width="80" height="auto"
          class="d-inline-block align-top" alt="">';
        }
      ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" aria-label="topmenus">
      <?php wp_nav_menu($defaults); ?>
    </div>
  </div>
</nav>


<!-- Navbar ends -->