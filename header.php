<!DOCTYPE html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="top-header">

    <div class="container">

        <div class="row">

            <div class="col-sm-6">

                <!-- Custom Top Menu -->

                <?php wp_nav_menu(array(
                    'theme_location' => 'top-menu',
                    'container' => 'nav',
                    'container_class' => 'col-sm-9 pull-right',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'false',
                    'depth' => 2
                )); ?>

                <!-- End Custom Top Menu -->


            </div>

            <div class="logo col-sm-2">
                <a href="<?php echo esc_url( home_url('/')); ?>">
                    <?php if( of_get_option( 'logo', true ) != '' ) { ; ?>
                        <?php if( of_get_option('logo',true) == 1 ) { ?>
                            <h1><?php bloginfo('name'); ?></h1>
                            <p><?php bloginfo('description'); ?></p>
                        <?php } else { ?>
                            <img src="<?php echo esc_url( of_get_option( 'logo', true )); ?>" / >
                                        <?php } } else { ?>
                        <h1><?php bloginfo('name'); ?></h1>
                    <?php } ?>
                    <p><?php bloginfo('description'); ?></p>
                </a>
            </div><!-- logo -->


            <div class="col-sm-4">

                <div class="header-info">
                    <h3><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h3>
                </div>
                <!-- end header-info -->

            </div>
            <!-- end col-sm-3 -->





        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

</header>
<!-- end top-header -->


<header class="mobile-header">

    <div class="container">


        <div class="col-sm-3">

            <div class="header-info">
                <h3><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h3>

                <p><?php bloginfo('description'); ?></p>
            </div>
            <!-- end header-info -->

        </div>
        <!-- end col-sm-3 -->


        <div class="fa-bars-header clearfix">
            <i class="fa fa-bars"></i>
        </div>
        <!-- fa-bars-header -->


        <div class="mobile-nav">

            <!-- Custom Mobile menu -->

            <?php wp_nav_menu(array(
                'theme_location' => 'mobile-menu',
                'container' => 'nav',
                'container_class' => 'mobile-menu',
                'menu_class' => 'nav',
                'fallback_cb' => 'false',
                'depth' => 2
            )); ?>

            <!-- End Custom Mobile Menu -->


        </div>
        <!-- end mobile-nav -->

    </div>
    <!-- end container -->

</header>
<!-- end mobile-header -->