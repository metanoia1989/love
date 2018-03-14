<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( 'love_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function love_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_love' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_love', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'top-menu' => esc_html__( '顶部菜单', '_love' ),
			'left-menu' => esc_html__( '左侧菜单', '_love' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'love_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'love_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function love_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'love_content_width', 640 );
}
add_action( 'after_setup_theme', 'love_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function love_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_love' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( '添加侧边栏小工具', '_love' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'love_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function love_scripts() {
	//wp_enqueue_style( 'love-style', get_stylesheet_uri() );
	//wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'theme', get_template_directory_uri().'/css/theme.css' );
	wp_enqueue_style( 'prism-css', get_template_directory_uri().'/css/prism-okaidia.css' );

	wp_enqueue_script( 'popper', get_template_directory_uri().'/js/popper.js', [], '4.0', true );
	wp_enqueue_script( 'bootstarp', get_template_directory_uri().'/js/bootstrap.js', ['jquery'], '4.0', true );
	wp_enqueue_script( 'love-navigation', get_template_directory_uri().'/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'love-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'love-script', get_template_directory_uri().'/js/script.js', ['jquery'], '1.0', true );
	wp_enqueue_script( 'prism-js', get_template_directory_uri().'/js/prism.js', ['jquery'], '1.0', true );
	wp_enqueue_script( 'prism-php-js', get_template_directory_uri().'/js/prism-php.min.js', ['jquery'], '1.0', true );
	wp_enqueue_script( 'prism-css-js', get_template_directory_uri().'/js/prism-css.min.js', ['jquery'], '1.0', true );
	wp_enqueue_script( 'prism-bash-js', get_template_directory_uri().'/js/prism-bash.min.js', ['jquery'], '1.0', true );
	wp_enqueue_script( 'prism-markup-js', get_template_directory_uri().'/js/prism-markup.min.js', ['jquery'], '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'love_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

if ( file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

//缓存Gravatar头像
function cache_avatar($avatar, $id_or_email, $size, $default, $alt)
{
    $avatar = str_replace(array("www.gravatar.com", "0.gravatar.com", "1.gravatar.com", "2.gravatar.com"), "cn.gravatar.com", $avatar);
    $tmp = strpos($avatar, 'http');
    $url = get_avatar_url( $id_or_email, $size ) ;
    $url = str_replace(array("www.gravatar.com", "0.gravatar.com", "1.gravatar.com", "2.gravatar.com"), "cn.gravatar.com", $url);
    $avatar2x = get_avatar_url( $id_or_email, ( $size * 2 ) ) ;
    $avatar2x = str_replace(array("www.gravatar.com", "0.gravatar.com", "1.gravatar.com", "2.gravatar.com"), "cn.gravatar.com", $avatar2x);
    $g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
    $tmp = strpos($g, 'avatar/') + 7;
    $f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
    $w = home_url();
    $e = ABSPATH .'avatar/'. $size . '*'. $f .'.jpg';
    $e2x = ABSPATH .'avatar/'. ( $size * 2 ) . '*'. $f .'.jpg';
    $t = 1209600; 
    if ( (!is_file($e) || (time() - filemtime($e)) > $t) && (!is_file($e2x) || (time() - filemtime($e2x)) > $t ) ) { 
        copy(htmlspecialchars_decode($g), $e);
        copy(htmlspecialchars_decode($avatar2x), $e2x);
    } else { $avatar = $w.'/avatar/'. $size . '*'.$f.'.jpg';
        $avatar2x = $w.'/avatar/'. ( $size * 2) . '*'.$f.'.jpg';
        if (filesize($e) < 1000) copy($w.'/avatar/default.jpg', $e);
        if (filesize($e2x) < 1000) copy($w.'/avatar/default.jpg', $e2x);
        $avatar = "<img alt='{$alt}' src='{$avatar}' srcset='{$avatar2x}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
    }
    return $avatar;
}
add_filter('get_avatar', 'cache_avatar',1,5);


/**
 * 自定义markdown类型文章
 */
function my_custom_init() {
    add_post_type_support( 'custom-post-type', 'wpcom-markdown' );
}
add_action('init', 'my_custom_init');

/**
 * 添加prism的按钮
 */
function appthemes_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    QTags.addButton( 'eg_hlAll', '*ALL', '<pre class="language-"><code class="language-">', '</code></pre>', 'h', 'defual highlight');
    QTags.addButton( 'eg_hlHTML', '*HTML', '<pre class="language-markup"><code class="language-markup">', '</code></pre>', 'z', 'HTML highlight');
    QTags.addButton( 'eg_hlPHP', '*PHP', '<pre class="language-php"><code class="language-php">', '</code></pre>', 'p', 'PHP highlight');
    QTags.addButton( 'eg_hlCSS', '*CSS', '<pre class="language-css"><code class="language-css">', '</code></pre>', 'c', 'csshighlight');
    QTags.addButton( 'eg_hlBASH', '*BASH', '<pre class="language-bash"><code class="language-bash">', '</code></pre>', 'b', 'bashhighlight');
    QTags.addButton( 'eg_hlJava', '*Java', '<pre class="language-Java"><code class="language-Java">', '</code></pre>', 'h', 'Java highlight');
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );

/**
 * 减少rest api 不必要的输出
 */
function dw_rest_prepare_post( $data, $post, $request ) {
	$_data = $data->data;
	$params = $request->get_params();
    $postID = $post->ID;

    //阅读数
    $views = get_post_meta($postID, 'views', true);
    if($views) $_data['views'] = $views;

    //评论数
    $comment_count = get_post_field('comment_count', $postID); 
    if($comment_count) $_data['comment_count'] = $comment_count;

    //过滤的输出字段
    unset( $_data['author'] );
    unset( $_data['guid'] );
    unset( $_data['status'] );
    unset( $_data['featured_media'] );
    unset( $_data['format'] );
    unset( $_data['ping_status'] );
    unset( $_data['comment_status'] );
    unset( $_data['sticky'] );
    unset( $_data['template'] );

	$data->data = $_data;
	return $data;

}
add_filter( 'rest_prepare_post', 'dw_rest_prepare_post', 10, 3 );

/**
 * 输出文章数据 post meta
 */
// register_rest_field( 'post', 'metadata', array(
//
//      'get_callback' => function ( $data ) {
//
//          return get_post_meta( $data['id'], '', '' );
//
//  }, ));

/**
 * 添加文章访问次数
 */
/* 访问计数 */
function record_visitors()
{
    if (is_singular())
    {
      global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
      {
          $post_views = (int)get_post_meta($post_ID, 'views', true);
          if(!update_post_meta($post_ID, 'views', ($post_views+1)))
          {
            add_post_meta($post_ID, 'views', 1, true);
          }
      }
    }
}
add_action('wp_head', 'record_visitors');
/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}


/**
 * 为分类添加特色图片
 */
if ( file_exists( get_template_directory() . '/inc/categories-images.php' ) ) {
    require_once get_template_directory() . '/inc/categories-images.php';
}

/**
 * 定义rest api 的分类数据输出，其实我直接用人家定义好的api最好，免得写这么多的代码，浪费时间。
 */
function dw_rest_prepare_category( $data, $category, $request ) {
	$_data = $data->data;
    $term_id= $category->term_id;

    $cateImg = z_taxonomy_image_url($term_id);

    $_data['cate_img'] = $cateImg;

    //阅读数
    // $views = get_post_meta($category, 'views', true);
    // if($views) $_data['views'] = $views;

    //评论数
    // $comment_count = get_post_field('comment_count', $category); 
    // if($comment_count) $_data['comment_count'] = $comment_count;

    //过滤的输出字段
    unset( $_data['meta'] );
    unset( $_data['taxonomy'] );

	$data->data = $_data;
	return $data;

}
add_filter( 'rest_prepare_category', 'dw_rest_prepare_category', 10, 3 );


/**
 * 添加自定义的rest api route
 */
//获取微信用户的openid
if ( file_exists( get_template_directory() . '/inc/wx-openid.php' ) ) {
    require_once get_template_directory() . '/inc/wx-openid.php';
}

//微信用户评论提交获取
if ( file_exists( get_template_directory() . '/inc/wx-comments.php' ) ) {
    require_once get_template_directory() . '/inc/wx-comments.php';
}