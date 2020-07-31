<header class="site-header" role="banner">

    <div class="site-title">
        <a	
            class="site-title-link" 
            href="<?php echo esc_url( home_url( '/' ) ); ?>" 
            rel="home"
        >
            <?php bloginfo( 'name' ); ?>
        </a>
    </div>

    <nav class="site-navigation" role="navigation">
        <button 
            class="menu-toggle"
            data-comment="Button to trigger the menu collapse/expand."
            aria-expanded="false"
        ></button>
        
        <?php // Wordpress generates the nav menu from site config.
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
        ?>
    </nav>

    <div class="site-search">
        <?php
            get_search_form(true);
        ?>
    </div>
    
</header>