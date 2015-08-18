<?php
/*
Plugin Name: Staff page
Description: Declares a plugin that will create a custom post type
Version: 1.0.1
*/

/**
 * Class PageTemplater
 */
class PageTemplater {

    /**
     * A reference to an instance of this class.
     */
    private static $instance;

    /**
     * The array of templates that this plugin tracks.
     */
    protected $templates;


    /**
     * Returns an instance of this class.
     */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new PageTemplater();
        }

        return self::$instance;

    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    private function __construct() {

        $this->templates = array();


        // Add a filter to the attributes metabox to inject template into the cache.
        add_filter(
            'page_attributes_dropdown_pages_args',
            array( $this, 'register_project_templates' )
        );


        // Add a filter to the save post to inject out template into the page cache
        add_filter(
            'wp_insert_post_data',
            array( $this, 'register_project_templates' )
        );


        // Add a filter to the template include to determine if the page has our
        // template assigned and return it's path
        add_filter(
            'template_include',
            array( $this, 'view_project_template')
        );


        // Add your templates to this array.
        $this->templates = array(
            'staff-post-template.php'     => 'Template for staff post',
        );

        // Add new custom post
        add_action(
            'init',
            array($this, 'create_staff_post')
        );

        // Add new meta box
        add_action('admin_init',
            array($this, 'init_new_meta')
        );

        //Save post
        add_action('save_post',
            array($this, 'add_staff_post_fields'),
            10, 2
        );

        //add style
        add_action('wp_print_styles',
            array($this,'add_my_stylesheet')
        );
        //add script
        add_action('wp_enqueue_scripts',
            array($this, 'CurrentPluginName_enqueue_js')
        );
        //add languages files
        add_action('plugins_loaded',
            array($this, 'languages_init')
        );


    }


    /**
     * Adds our template to the pages cache in order to trick WordPress
     * into thinking the template file exists where it doens't really exist.
     *
     */

    public function register_project_templates( $atts ) {

        // Create the key used for the themes cache
        $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

        // Retrieve the cache list.
        // If it doesn't exist, or it's empty prepare an array
        $templates = wp_get_theme()->get_page_templates();
        if ( empty( $templates ) ) {
            $templates = array();
        }

        // New cache, therefore remove the old one
        wp_cache_delete( $cache_key , 'themes');

        // Now add our template to the list of templates by merging our templates
        // with the existing templates array from the cache.
        $templates = array_merge( $templates, $this->templates );

        // Add the modified cache to allow WordPress to pick it up for listing
        // available templates
        wp_cache_add( $cache_key, $templates, 'themes', 1800 );

        return $atts;

    }

    /**
     * Checks if the template is assigned to the page
     */
    public function view_project_template( $template ) {

        global $post;

        if (!isset($this->templates[get_post_meta(
                $post->ID, '_wp_page_template', true
            )] ) ) {

            return $template;

        }

        $file = plugin_dir_path(__FILE__). get_post_meta(
                $post->ID, '_wp_page_template', true
            );

        // Just to be safe, we check if the file exist first
        if( file_exists( $file ) ) {
            return $file;
        }
        else { echo $file; }

        return $template;

    }

    /**
     * Add custom post type
     */
    public function create_staff_post()
    {
        register_post_type('staff_post',
            array(
                'labels' => array(
                    'name' =>  __('Staff Post','staffPagePlugin'),
                    'singular_name' => __('Staff Post','staffPagePlugin'),
                    'add_new' => __('Add new','staffPagePlugin'),
                    'add_new_item' => __('Add new staff post','staffPagePlugin'),
                    'edit' => __('Edit','staffPagePlugin'),
                    'edit_item' => __('Edit staff post','staffPagePlugin'),
                    'new_item' => __('New staff post','staffPagePlugin'),
                    'view' => __('View','staffPagePlugin'),
                    'view_item' => __('View staff post','staffPagePlugin'),
                    'search_items' => __('Search staff post','staffPagePlugin'),
                    'not_found' => __('No staff post found','staffPagePlugin'),
                    'not_found_in_trash' =>
                        __('No staff post found in trash','staffPagePlugin'),
                    'parent' => __('Parent staff post','staffPagePlugin')
                ),
                'public' => true,
                'menu_position' => 15,
                'supports' =>
                    array('title', 'editor',
                        'thumbnail', 'tags'),
                'taxonomies' => array('category'),
                'menu_icon' => "dashicons-images-alt",
                'has_archive' => true
            )
        );
    }

    /**
     * Initialize new meta box for our custom post type
     */
    public function init_new_meta()
    {
        add_meta_box('staff_post_meta_box',
            __('Additional staff information','staffPagePlugin'),
            array($this,'display_staff_post_meta_box'),
            'staff_post', 'normal', 'high');
    }

    /**
     * @param $staff_post
     * View meta box in custom post type
     */
    public function display_staff_post_meta_box($staff_post)
    {
        $staff_position = esc_html(get_post_meta($staff_post->ID, 'staff_position', true));
        $staff_google = esc_html(get_post_meta($staff_post->ID, 'staff_google', true));
        $staff_linkedin = esc_html(get_post_meta($staff_post->ID, 'staff_linkedin', true));
        $staff_facebook = esc_html(get_post_meta($staff_post->ID, 'staff_facebook', true));

        ?>
        <table>
            <tr>
                <td style="width: 100%"><?php _e('Staff position','staffPagePlugin')?></td>
                <td><input type="text" size="80"
                           name="staff_post_position"
                           value="<?php echo $staff_position; ?>"/></td>
            </tr>
            <tr>
                <td style="width: 100%"><?php _e('Linkedin','staffPagePlugin')?></td>
                <td><input type="text" size="80"
                           name="staff_post_linkedin"
                           value="<?php echo $staff_linkedin; ?>"/></td>
            </tr>
            <tr>
                <td style="width: 100%"><?php _e('Facebook','staffPagePlugin')?></td>
                <td><input type="text" size="80"
                           name="staff_post_facebook"
                           value="<?php echo $staff_facebook; ?>"/></td>
            </tr>
            <tr>
                <td style="width: 100%"><?php _e('Google+','staffPagePlugin')?>+</td>
                <td><input type="text" size="80"
                           name="staff_post_google"
                           value="<?php echo $staff_google; ?>"/></td>
            </tr>
        </table>
    <?php
    }

    /**
     * @param $staff_post_id
     * @param $staff_post
     * add value fields to custom post type
     */
    public function add_staff_post_fields($staff_post_id, $staff_post)
    {
        if ($staff_post->post_type == 'staff_post') {
            if (isset($_POST['staff_post_position']) &&
                $_POST['staff_post_position'] != ''
            ) {
                update_post_meta($staff_post_id, 'staff_position',
                    $_POST['staff_post_position']);
            }
            if (isset($_POST['staff_post_google']) &&
                $_POST['staff_post_google'] != ''
            ) {
                update_post_meta($staff_post_id, 'staff_google',
                    $_POST['staff_post_google']);
            }
            if (isset($_POST['staff_post_linkedin']) &&
                $_POST['staff_post_linkedin'] != ''
            ) {
                update_post_meta($staff_post_id, 'staff_linkedin',
                    $_POST['staff_post_linkedin']);
            }
            if (isset($_POST['staff_post_facebook']) &&
                $_POST['staff_post_facebook'] != ''
            ) {
                update_post_meta($staff_post_id, 'staff_facebook',
                    $_POST['staff_post_facebook']);
            }

        }

    }
    /**
     * load languages files
     */
    private function languages_init(){
        load_plugin_textdomain( 'my-plugin', false, dirname( plugin_basename( __FILE__ ) ) );
    }

    /**
     * add styles to plugin
     */
    public function add_my_stylesheet() {
        wp_register_style('myStyleSheets', WP_PLUGIN_URL . '/wp-staff-page/css/style.css');
        wp_register_style('SlickStyle', WP_PLUGIN_URL . '/wp-staff-page/css/slick.css');
        wp_register_style('SlickThemeStyle', WP_PLUGIN_URL . '/wp-staff-page/css/slick-theme.css');

        wp_enqueue_style( 'myStyleSheets');
        wp_enqueue_style( 'SlickStyle');
        wp_enqueue_style( 'SlickThemeStyle');

    }

    /**
     * add scripts to plugin
     */
    public function CurrentPluginName_enqueue_js() {
        wp_enqueue_script('slickJs', plugins_url('js/slick.min.js', __FILE__), array('jquery'));
        wp_enqueue_script('staffPageJs', plugins_url('js/script.js', __FILE__), array('jquery','slickJs'));

    }




}

add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );

?>
