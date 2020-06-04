<?php
	
/**
 * WP_CGV Class
 *
 * @class   WP_CGV
 * @package WP_CGV
 *
 * @author  Uncleserj <serj[at]serj[dot]pro>
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WP_CGV {
	
    /**
	 * Instance
	 *
	 * @static
	 * @access private
	 * @var array
	 */
			
	private static $_instance;
		
	/**
	 * Singleton
	 */

	private function __construct() {
								
		$this->hooks();
				
	}
	
	private function __clone() {}
    
    private function __wakeup() {}
	
	public static function app() {
	
		if (self::$_instance === null) {
			self::$_instance = new self();
			
			/**
			 * Plugin loaded.
			 *
			 * Fires when Pluign was fully loaded and instantiated.
			 *
			 * @since 1.0.0
			 */
			 
			do_action( 'wp-cgv/loaded' );
		}
				
		return self::$_instance;
	}
	
    /**
	 * Plugin activation function
	 */
	
    public static function activate() {
        
		if ( ! current_user_can( 'activate_plugins' ) ) return;
		
		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
		
		check_admin_referer( "activate-plugin_{$plugin}" );
        
        /* Create page */
        
        $page = get_page_by_path('legal');
        	        	
    	if ( $page ) {
        	
        	$id = $page->ID;
        	
        	$args = array(
            	'ID' => $page->ID,
                'post_content' => '[wp-cgv]',
                'post_title' => __( 'Conditions Générales de Vente', 'wp-cgv' )
        	);
        	
        	wp_update_post( $args );
        	
    	} else {
    	
            $page = array(
                'post_title'    => __( 'Conditions Générales de Vente', 'wp-cgv' ),
                'post_content'  => '[wp-cgv]',
                'post_status'   => 'publish',
                'post_author'   => 1,
                'post_type'     => 'page',
                'post_name'     => 'legal'
            );
            
            $id = wp_insert_post($page);
        
        }
        
        delete_transient( 'wp-cgv-checking-usage' );
		
	}

    /**
	 * Plugin deactivation function
	 */
	 
	public static function deactivate() {
		
		if ( ! current_user_can( 'activate_plugins' ) ) return;
		
		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
		
		check_admin_referer( "deactivate-plugin_{$plugin}" );
		
        $page = get_page_by_path('legal');
        	        	
    	if ( $page ) {
        	
        	$id = $page->ID;
        	
            wp_delete_post( $id, true );
            
        }
        
        delete_option( 'wp-cgv-fields' );
    	
    	delete_option( 'wp-cgv-result' );
    	
    	delete_option( 'wp-cgv-parts' );
    	
    	delete_transient( 'wp-cgv-checking-usage' );

	}
	
    /**
	 * Plugin uninstall function
	 */
	 
	public static function uninstall() {
		
        $page = get_page_by_path('legal');
        	        	
    	if ( $page ) {
        	
        	$id = $page->ID;
        	
            wp_delete_post( $id, true );
            
        }
        
        delete_option( 'wp-cgv-fields' );
    	
    	delete_option( 'wp-cgv-result' );
    	
    	delete_option( 'wp-cgv-parts' );
    	
    	delete_transient( 'wp-cgv-checking-usage' );

	}

    /**
	 * Wordpress Hooks
	 */

	public function hooks() {
		
        /**
		 * Load Text Domain
		 */
		
		add_action( 'init', array( $this, 'load_text_domain' ) );
		
		/**
         * Checking usage
         */
         
        //add_action( 'init', array( $this, 'checking_usage' ) );
		
		/**
         * Add Menu Item
         */
        
        add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
		
		/**
		 * Admin Styles and Scripts
		 */
		
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles_scripts' ) );
		
		/**
         * AJAX
         */
		
		add_action( 'wp_ajax_generate_page', array( $this, 'ajax_generate_page' ) );
		
		add_action( 'wp_ajax_reset_page', array( $this, 'ajax_reset_page' ) );
		
		//add_action( 'wp_ajax_send_site_url', array( $this, 'ajax_send_site_url' ) );
		
		/**
         * Shortcode
         */
         
        add_shortcode( 'wp-cgv', array( $this, 'wp_cgv_shortcode' ) );
		
    }
    
    /**
     * Checking usage
     */
     
    public function checking_usage() {
     
        if ( false === get_transient( 'wp-cgv-checking-usage' ) ) {
            
    		$url_args = array(
    			'action' => 'send_site_url',
    			'security'  => wp_create_nonce( 'wp-cgv' ),
    		);
    		
    		$args = array(
    			'timeout'   => 5,
    			'blocking'  => false,
    			'cookies'   => $_COOKIE,
    			'sslverify' => apply_filters( 'https_local_ssl_verify', false ),
    		);
    		
            $url = add_query_arg( $url_args, admin_url( 'admin-ajax.php' ) );
                    		
            wp_remote_post( esc_url_raw( $url ), $args );            

            set_transient( 'wp-cgv-checking-usage', true, 24 * HOUR_IN_SECONDS );
        }
    
    }
    
    /**
	 * Load Text Domain
	 */
	
	public function load_text_domain() {
		
		load_plugin_textdomain( 'wp-cgv', false, WP_CGW_DIR . '/lang/' );
		
	}
    
    /**
     * Create menu item
     */
    
    public function add_menu_item() {
    
    	add_menu_page( 
    		__( 'WP-CGV', 'wp-cgv' ),
    		__( 'WP-CGV', 'wp-cgv' ),
    		'manage_options', 
    		'wp-cgv',
    		array( $this, 'wp_cgv_main_page' )
    	);
    	
    }
    
	/**
	 * Header Page Layout
	 */
	
	public function header_template() {
		?>
		<div class="wrap" id="wp-cgv">
			
			<h1><span style="display:inline-block;margin-right:1rem;margin-bottom:1rem">WP-CGV Administrator</span>
    			<div style="display:inline-block;">
                    <button role="button" class="button button-secondary" @click="reset"><?php _e( 'Reset', 'wp-cgv' ); ?></button>
        			<button role="button" class="button button-secondary" @click="preview"><?php _e( 'Prévisualiser vos CGV', 'wp-cgv' ); ?></button>
        			<a v-if="page_exists" role="button" class="button button-secondary" href="<?php echo get_site_url() . '/legal'; ?>" target="_blank"><?php _e( 'Voir le résultat final', 'wp-cgv' ); ?></a>
                    <img v-if="doing_ajax_top" style="position:relative;top:1px;" src="<?php echo WP_CGW_URL . 'assets/spinner.gif'; ?>" srcset="<?php echo WP_CGW_URL . 'assets/spinner.gif'; ?>, <?php echo WP_CGW_URL . 'assets/spinner@2x.gif'; ?> 2x">
    			</div>
            </h1>
            		
			<div class="container">
			
                <tabs>
                    <tab name="<?php _e( 'Votre entreprise', 'wp-cgv' ); ?>" :selected="true">
                        <?php include_once( WP_CGW_DIR . 'tabs/first.php' ); ?>
                    </tab>
                    <tab name="<?php _e( 'Vos options', 'wp-cgv' ); ?>">
                        <?php include_once( WP_CGW_DIR . 'tabs/second.php' ); ?>
                    </tab>
                    <tab name="<?php _e( 'Vos CGV', 'wp-cgv' ); ?>">
                        <?php include_once( WP_CGW_DIR . 'tabs/third.php' ); ?>
                    </tab>
                </tabs>
                
                <div style="margin: 1rem 0;" v-if="currentTab != 2">               
                    <button role="button" class="button button-primary" @click="generate( true )"><?php _e( 'Enregistrer', 'wp-cgv' ); ?></button>
                    <img v-if="doing_ajax" style="position:relative;top:4px;" src="<?php echo WP_CGW_URL . 'assets/spinner.gif'; ?>" srcset="<?php echo WP_CGW_URL . 'assets/spinner.gif'; ?>, <?php echo WP_CGW_URL . 'assets/spinner@2x.gif'; ?> 2x">
                </div>
            
                <div id="wp-cgv-result" v-html="result" style="display: none"></div>
        
            </div>	
			
		<?php
	}
	
	/**
	 * Footer Page Layout
	 */
	
	public function footer_template() {
		?>
		</div>
		<?php
	}
    
	/**
	 * Render main page
	 */
	
	public function wp_cgv_main_page() {
    	
		$this->header_template();
						
		$this->footer_template();
    	
    }
    
    /**
	 * Admin Styles and Scripts
	 */	
	 
	public function admin_styles_scripts() {
		
		$screen = get_current_screen();
		
		switch ( $screen->id ) {
			
			/* Top Level Page */
			
			case 'toplevel_page_wp-cgv':
                
                /**
                 * Admin notice
                 */
                 
                add_action( 'admin_notices', array( $this, 'admin_notice' ) );
			
			    /* Top Level Page Styles */
			
                wp_enqueue_style( 'wp-cgv-admin', WP_CGW_URL . 'css/wp-cgv-admin.css', array( 'wp-admin' ), WP_CGV_VERSION, 'all' ); 
                
                /* FancyBox */
                
                wp_enqueue_style( 'wp-cgv-fancybox', WP_CGW_URL . 'css/jquery.fancybox.min.css', array( 'wp-admin' ), WP_CGV_VERSION, 'all' );    
                
                /* Top Level Page Scripts */   
                
                wp_enqueue_script( 'wp-cgv-admin', WP_CGW_URL  . 'js/wp-cgv-admin.js', array( 'jquery', 'wp-cgv-vue-js' ), WP_CGV_VERSION, true);  
                
                /* FancyBox */
                
                wp_enqueue_script( 'wp-cgv-fancybox', WP_CGW_URL  . 'js/jquery.fancybox.min.js', array( 'jquery' ), WP_CGV_VERSION, true);  
                
                /* VueJS */
                
                //wp_enqueue_script( 'wp-cgv-vue-js', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', null, WP_CGV_VERSION, true );
                wp_enqueue_script( 'wp-cgv-vue-js', WP_CGW_URL . 'js/vue.min.js', null, WP_CGV_VERSION, true );
            	            	
				wp_localize_script( 'wp-cgv-admin', 'wp_cgv', array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'ajaxnonce' => wp_create_nonce( 'wp-cgv' ),
					'strings' => array(
    					'intro' => '<p><i>Généré par <a href="http://donneespersonnelles.fr/wp-cgv" target="_blank" title="WP-CGV">WP-CGV</a></i></p>',
					    'edit' => __( 'Adapter', 'wp-cgv' ),
					    'saved' => __( 'Enregistrer', 'wp-cgv' ),
					    'exp' => __( 'Explications', 'wp-cgv' ),
					    'edit_title' => __( 'Modifier le titre', 'wp-cgv' ),
					    'default_name' => __( 'ARTICLE', 'wp-cgv' ), 
					    'default_text' => __( '...', 'wp-cgv' ),
                    ),
                    'parts' => $this->get_parts(),
                    'fields' => $this->get_fields(),
                    'urls' => array(
                    	array(
                        	'title' => get_site_url() . '/legal',
                        	'value' => get_site_url() . '/legal',
                    	)      
                    ),
                    'spinnerUrl' => WP_CGW_URL . 'assets/spinner.gif',
                    'site' => get_site_url(),
                    'page' => get_page_by_path('legal') ? true : null
                    )
				);	
				
			break;
			
			default: break;

        }
        
    }
    
    /**
     * AJAX: Generate legal page
     */
     
    public function ajax_generate_page() {
        
    	check_ajax_referer( 'wp-cgv', 'security' );
    
    	$data = $_REQUEST[ 'data' ] ? wp_kses_post( $_REQUEST[ 'data' ] ) : null;
    	
    	$fields = $_REQUEST[ 'fields' ] ? sanitize_text_field( $_REQUEST[ 'fields' ] ) : null;
    	
    	$fields = str_replace('\\', '', $fields);
    	
    	$parts = $_REQUEST[ 'parts' ] ? wp_kses_post( $_REQUEST[ 'parts' ] ) : null;
    	
    	$parts = str_replace('\\n', '', $parts);
    	
    	$parts = str_replace('\\', '', $parts);
    	
    	if ( $data ) {
        	
        	$id = null;
        	
        	$page = get_page_by_path('legal');
        	        	
        	if ( $page ) {
            	
            	$id = $page->ID;
            	/*
            	$args = array(
                	'ID' => $page->ID,
                    'post_content' => '[wp-cgv]',
                    'post_title' => __( 'Conditions Générales de Vente', 'wp-cgv' )
            	);
            	
            	wp_update_post( $args );
            	*/
        	} else {
        	
                $page = array(
                    'post_title'    => __( 'Conditions Générales de Vente', 'wp-cgv' ),
                    'post_content'  => '[wp-cgv]',
                    'post_status'   => 'publish',
                    'post_author'   => 1,
                    'post_type'     => 'page',
                    'post_name'     => 'legal'
                );
                
                $id = wp_insert_post($page);
            
            }
            
            get_option( 'wp-cgv-result' ) === FALSE ? add_option( 'wp-cgv-result', $data ) : update_option( 'wp-cgv-result', $data );
            
            get_option( 'wp-cgv-fields' ) === FALSE ? add_option( 'wp-cgv-fields', $fields ) : update_option( 'wp-cgv-fields', $fields );
            
            get_option( 'wp-cgv-parts' ) === FALSE ? add_option( 'wp-cgv-parts', $parts ) : update_option( 'wp-cgv-parts', $parts );

            /**
             * Clear cache
             */

        	if ( function_exists( 'w3tc_pgcache_flush' ) ) { w3tc_pgcache_flush(); }
        	
        	if ( function_exists( 'wp_cache_clear_cache' ) ) { wp_cache_clear_cache(); }
        	
    	}	
    	
    	echo $id;
    	
    	wp_die();
        
    }
    
    /**
     * AJAX: Reset fields
     */
     
    public function ajax_reset_page() {
        
    	check_ajax_referer( 'wp-cgv', 'security' );
    	
    	delete_option( 'wp-cgv-fields' );
    	
    	delete_option( 'wp-cgv-parts' );
    	
    	wp_die();
        
    }
    
    /**
     * Ajax: Send site url
     */
     
    public function ajax_send_site_url() {
        
        check_ajax_referer( 'wp-cgv', 'security' );
        
        wp_remote_get( 'https://www.donneespersonnelles.fr/cgv.json?site=' . esc_url_raw( get_site_url() ), array( 'timeout' => 5, 'blocking' => false ) );
        
        wp_die();
        
    }      
    
    /**
     * Get parts of CGV
     */
    
    private function get_parts() {
        
        $parts = require_once( WP_CGW_DIR . 'parts/parts.php' );
        
        foreach( $parts as $key=>$part ) {
            $parts[$key]['currentText'] = '';
            $parts[$key]['currentCachedText'] = '';
            $parts[$key]['id'] = uniqid(); 
        }
        
        if ( get_option( 'wp-cgv-parts' ) !== FALSE ) {
            
            $temp_parts = json_decode( get_option( 'wp-cgv-parts' ), true );
            
            if ( $temp_parts ) $parts = $temp_parts;
            
        }
        
        return $parts;
        
    }
    
    /**
     * Get fields of CGV
     */
    
    private function get_fields() {
        
        $fields = array(
            'company_name' => '',
            'description' => '',
        	'capital' => '',
        	'address' => '',
        	'postal' => '',
        	'city' => '',
        	'siret' => '',
        	'branch' => '',
        	'kind' => '',
        	'email' => '',
        	'phone' => ''
        );
        
        if ( get_option( 'wp-cgv-fields' ) !== FALSE ) {
            
            $temp_fields = json_decode( get_option( 'wp-cgv-fields' ), true );
            
            if ( $temp_fields ) $fields = $temp_fields;
            
        }
        
        return $fields;
    
    }    
    
    /**
     * Shortcode
     */
     
    public function wp_cgv_shortcode( $atts, $content = null ) {
        
        $output = '';
        
        $result = get_option( 'wp-cgv-result' ) !== FALSE ? get_option( 'wp-cgv-result' ) : null;
                
        $result = str_replace( "\'", "'", $result );
        
        $result = str_replace( '\"', '"', $result );
				        
        $output .= '<div id="wp-cgv">' . $result . '</div>';
                
        return $output;
        
    }
    
    /**
     * Admin Notice
     */
    
    public function admin_notice() {
        ?>
        <div class="notice notice-info wp-cgv-notice">
            <p><?php _e( 'Pensez à ajouter un lien sur toutes les pages de votre site vers vos CGV. Ce plugin vous est offert gratuitement par <a href="http://donneespersonnelles.fr" title="Données personnelles" target="_blank">donneespersonnelles.fr</a> - afin de vous aider à vous documenter et élaborer vos CGV, adaptez-le en fonction de vos besoins. Si vous souhaitez une fonctionnalité spécifique dites le nous dans les <a href="http://donneespersonnelles.fr/wp-cgv" target="_blank" title="WP-CGV">commentaires</a>.', 'wp-cgv' ); ?></p>
        </div>
        <?php
    }

}
?>