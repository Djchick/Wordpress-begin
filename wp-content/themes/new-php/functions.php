<?php 
  /**
    @ thiết lập các hằng dữ liệu quan trọng
    @ THEME_URL = get_stylesheet_directory() -  đường dẫn tới thư mục themes
    @ CORE = thư mục /core của theme, chứa các file nguồn quan trọng .
  **/
    define( 'THEME_URL', get_stylesheet_directory() );
    define( 'CORE', THEME_URL . '/core' );

  /**
    @ Load file /core/init.php
    @ Đây là file cấu hình ban đầu của theme mà sẽ không nên thay đổi
  **/
    require_once( CORE . '/init.php' );

  /**
    @ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
  **/
    if ( ! isset( $content_width ) ) {
      /**
        * Nếu biến $content_width chưa có dữ liệu thì gán giá trị
      **/
      $content_width = 620;
    }

  /**
    @ Thiết lập các chức năng đã đưọc theme hỗ trợ
  **/
    if ( ! function_exists('newphp_theme_setup') ) {
        /**
          * Nếu chưa có hàm newphp_theme_setup thì sẽ tạo mới 
        **/
        function newphp_theme_setup() {

          /**
            * Thiết lập theme có thể dịch đưọc nhiều ngôn ngữ
          **/
          $language_folder = THEME_URL . '/languages';
          load_theme_textdomain( 'newphp', $language_folder );

          /**
            * Tự chèn RSS Feed Link trong <header>
          **/
          add_theme_support( 'automatic-feed-links' );

          /**
            * Thêm chức năng post thumbnail
          **/
          add_theme_support( 'post-thumbnails' );

          /**
            * Thêm chức năng title-tag để tự thêm <title>
          **/
          add_theme_support( 'title-tag' );

          /**
            * Thêm chức năng post format 
          **/
          add_theme_support( 'post-formats',
            array(
              'image',
              'video',
              'gallery',
              'quote',
              'link'
              )
          );

          /**
            * Thêm chức năng custom background
          **/
          $default_background = array(
            'default-color' => '#e8e8e8',
          );
          add_theme_support( 'custom-background', $default_background );

          /*
            * Tạo menu cho theme
          */
          register_nav_menu ( 'primary-menu', __( 'Primary Menu', 'newphp' ) );
          /**
            * Tạo sidebar cho theme
          **/
          $sidebar = array(
            'name' => __( 'Main Sidebar', 'newphp' ),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar for newphp theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
          );
          register_sidebar( $sidebar );
        }
        add_action ( 'init', 'newphp_theme_setup' );

        /**
          add file css
        **/
        function add_file_css()
        {
             echo "<link rel='stylesheet' href='".get_template_directory_uri()."/style.css' />";
             echo "<link rel='stylesheet' href='".get_template_directory_uri()."/owl.carousel.css' />";
             echo "<link rel='stylesheet' href='".get_template_directory_uri()."/owl.theme.css' />";
        }
        add_action( 'wp_head', 'add_file_css' );

        /**
          add file js
        **/
        function add_file_js()
        {
             echo "<script src='".get_template_directory_uri()."/templates/js/jquery-1.9.1.min.js' />'></script>";
             echo "<script src='".get_template_directory_uri()."/templates/js/owl.carousel.js' />'></script>";
        }
        add_action( 'wp_head', 'add_file_js' );

    }

    /**
      * Tạo logo cho theme
    **/
    if ( ! function_exists( 'newphp_logo' ) ) {
      function newphp_logo() {?>
        <div class="logo col-lg-4 col-md-4 col-xs-12">
          <div class="site-name">
            <?php 
              if ( is_home() ) {
                printf(
                  '<h1><a href="%1$s" title="%2$s"> <img src="%3$s/wp-content/themes/new-php/templates/images/wp-header-logo.png"/></a></h1>',
                  get_bloginfo( 'url' ),
                  get_bloginfo( 'description' ),
                  get_bloginfo( 'url' )
                );
              } else {
                printf(
                  '<p><a href="%1$s" title="%2$s"><img src="%3$s/wp-content/themes/new-php/templates/images/wp-header-logo.png"/></a></p>',
                  get_bloginfo( 'url' ),
                  get_bloginfo( 'description' ),
                  get_bloginfo( 'url' )
                );
              } // endif
            ?>
          </div>
        </div>
      <?php }
    }
    /**
    @ Thiết lập hàm hiển thị menu
    @ newphp_menu( $slug )
    **/
    if ( ! function_exists( 'newphp_menu' ) ) {
      function newphp_menu( $slug ) {
        $menu = array(
          'theme_location' => $slug,
          'container' => 'nav',
          'container_class' => $slug,
        );
        wp_nav_menu( $menu );
      }
    }

    /**
    @ tạo query mới lấy bài viết theo category
    **/
    $hot_news = new WP_Query( array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'cat' => 63,
      'orderby' => 'ID',
      'order' => 'DESC',
      'post_per_page' => 4
    ));
    
    $learn_wp = new WP_Query( array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'cat' => 67,
      'orderby' => 'ID',
      'order' => 'DESC',
      'post_per_page' => 2
    ));

    $learn_laravel = new WP_Query( array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'cat' => 68,
      'orderby' => 'ID',
      'order' => 'DESC',
      'post_per_page' => 2
    ));

    $learn_html = new WP_Query( array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'cat' => 70,
      'orderby' => 'ID',
      'order' => 'DESC',
      'post_per_page' => 2
    ));



    add_filter( 'post_class', 'wps_first_post_class', 67 );

    function wps_first_post_class( $classes ) {

        global $wp_query;

        if( 0 == $wp_query->current_post )

            $classes[] = 'first';

            return $classes;

    }

    /**
    @ rút gọn nội dung bài viết
    **/
    function trim_post_excerpt( $length ) {
      return 40;
    }
    add_filter( 'excerpt_length', 'trim_post_excerpt', 999 );

    /**
    @ Hàm hiển thị thông tin của post (Post Meta)
    @ newphp_entry_meta()
    **/
    if ( ! function_exists( 'newphp_entry_meta' ) ) {
      function newphp_entry_meta() {
        if ( ! is_page() ) :
          echo '<div class="entry-meta">';
          // Hiển thị tên tác giả , tên category và ngày tháng đăng bài 
          printf( __( '<span class="author">Đăng bởi : %1$s </span>', 'newphp' ), get_the_author() );
          printf( __( '<span class="date-published"> | %1$s | </span>', 'newphp' ), get_the_date() );         

          // Hiển thị số đếm lượt bình luận
          if ( comments_open() ) :
            echo ' <span class="meta-reply> ';
              comments_popup_link(
                __( '0 comment ', 'newphp' ),
                __( '1 comment', 'newphp' ),
                __( '% comment', 'newphp' ),
                __( 'Read all comments', 'newphp' )
              );
            echo '</span>';
          endif;
          printf( __( '<div class="category"> Loại : %1$s </div>', 'newphp' ), get_the_category_list( ', ') );
        echo '</div>';
      endif;

      }
    }

    /**
    @ Hàm hiển thị ảnh thumbnail của post.
    @ Ảnh thumbnail sẽ không được hiển thị trong trang single
    @ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
    @ newphp_thumbnail( $size )
    **/
    if ( ! function_exists( 'newphp_thumbnail' ) ) {
      function newphp_thumbnail( $size ) {
        // Chỉ hiển thumbnail với post không có mật khẩu
        if ( ! is_single() && has_post_thumbnail() && ! post_password_required() || has_post_format( 'image' ) ) : ?> <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure> <?php 
        endif;
      }
    }

    /**
    @ Hàm hiển thị tiêu đề của post trong .entry-header
    @ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
    @ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
    @ newphp_entry_header()
    **/
    if ( ! function_exists( 'newphp_entry_header' ) ) {
      function newphp_entry_header() {
        if ( is_single() ) : ?>
     
          <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </h1>
        <?php else : ?>
          <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </h2><?php
     
        endif;
      }
    }

    /*
     * Thêm chữ Read More vào excerpt
     */
    function newphp_readmore() {
      return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'newphp') . '</a>';
    }
    add_filter( 'excerpt_more', 'newphp_readmore' );
     
    /**
    @ Hàm hiển thị nội dung của post type
    @ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
    @ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
    @ newphp_entry_content()
    **/
    if ( ! function_exists( 'newphp_entry_content' ) ) {
      function newphp_entry_content() {
     
        if ( ! is_single() ) :
          the_excerpt();
        else :
          the_content();
     
          /*
           * Code hiển thị phân trang trong post type
           */
          $link_pages = array(
            'before' => __('<p>Page:', 'newphp'),
            'after' => '</p>',
            'nextpagelink'     => __( 'Next page', 'newphp' ),
            'previouspagelink' => __( 'Previous page', 'newphp' )
          );
          wp_link_pages( $link_pages );
        endif;
     
      }
    }

    /**
    @ Hàm hiển thị tag của post
    @ newphp_entry_tag()
    **/
    if ( ! function_exists( 'newphp_entry_tag' ) ) {
      function newphp_entry_tag() {
        if ( has_tag() ) :
          echo '<div class="entry-tag">';
          printf( __('Tagged in %1$s', 'newphp'), get_the_tag_list( '', ', ' ) );
          echo '</div>';
        endif;
      }
    }

    /*
     * Tạo sidebar cho theme
    */
    $sidebar = array(
      'name' => __('Main Sidebar', 'newphp'),
      'id' => 'main-sidebar',
      'description' => 'Main sidebar for Newphp theme',
      'class' => 'main-sidebar',
      'before_title' => '<h3 class="widgettitle">',
      'after_sidebar' => '</h3>'
    );
    register_sidebar( $sidebar );

?>