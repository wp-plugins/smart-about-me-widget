<?php
/*
Plugin Name: Smart About Me Widget
Plugin URI: http://qualitytuts.com/smart-about-me-widget-wordpress
Description: Smart about me widget, to show your about me content with your social networks links
Version: 1.0
Author: Dheeraj, Sandeep
Author URI: http://qualitytuts.com
License: GPL2
*/
?>
<?php
/**
 * Adds Smart_About_Me_Widget widget.
 */
class Smart_About_Me_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'smart_about_me_widget', // Base ID
			'Smart About Me Widget', // Name
			array( 'description' => __( 'A widget displays about us content with social networks', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
        public function widget( $args, $instance ) {
            extract( $args );
            $title = empty($instance['title']) ? 'Smart About Me' : apply_filters('widget_title', $instance['title']);
            $name = empty($instance['name']) ? '' : apply_filters('widget_name', $instance['name']);
            $email = empty($instance['email']) ? '' : apply_filters('widget_email', $instance['email']);
            $about_me = empty($instance['about_me']) ? '' : apply_filters('widget_about_me', $instance['about_me']);
            $facebook = empty($instance['facebook']) ? '' : apply_filters('widget_facebook', $instance['facebook']);
            $twitter = empty($instance['twitter']) ? '' : apply_filters('widget_twitter', $instance['twitter']);
            $linkedin = empty($instance['linkedin']) ? '' : apply_filters('widget_linkedin', $instance['linkedin']);
            $google = empty($instance['google']) ? '' : apply_filters('widget_google', $instance['google']);
            $flickr = empty($instance['flickr']) ? '' : apply_filters('widget_flickr', $instance['flickr']);
            $youtube = empty($instance['youtube']) ? '' : apply_filters('widget_youtube', $instance['youtube']);
            $feedburner = empty($instance['feedburner']) ? '' : apply_filters('widget_feedburner', $instance['feedburner']);
            $lastfm = empty($instance['lastfm']) ? '' : apply_filters('widget_lastfm', $instance['lastfm']);
            $skype = empty($instance['skype']) ? '' : apply_filters('widget_skype', $instance['skype']);
            $digg = empty($instance['digg']) ? '' : apply_filters('widget_digg', $instance['digg']);
            
            echo $before_widget;
            if ( ! empty( $title ) )
			echo $before_title . $title . $after_title; ?>
            
            <!-- front display here -->
            <div>
                <div style="float: left; padding-right: 8px;"><?php echo get_avatar( $email, 50 ); ?></div>
                <div style="font-weight: bold; padding: 0 0 2px 0;">
                    <?php echo $name; ?>
                </div>
                <div style="text-align: justify;">
                    <?php echo $about_me; ?>
                </div>
                <div style="padding: 5px 0;">
                    <?php if($facebook) { ?>
                        <a href="<?php echo $facebook; ?>" target="_blank" title="facebook"><img src="<?php echo plugins_url('images/facebook.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($twitter) { ?>
                        <a href="<?php echo $twitter; ?>" target="_blank" title="twitter"><img src="<?php echo plugins_url('images/twitter.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($linkedin) { ?>
                        <a href="<?php echo $linkedin; ?>" target="_blank" title="linkedin"><img src="<?php echo plugins_url('images/linkedin.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($google) { ?>
                        <a href="<?php echo $google; ?>" target="_blank" title="google"><img src="<?php echo plugins_url('images/google.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($flickr) { ?>
                        <a href="<?php echo $flickr; ?>" target="_blank" title="flickr"><img src="<?php echo plugins_url('images/flickr.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($youtube) { ?>
                        <a href="<?php echo $youtube; ?>" target="_blank" title="youtube"><img src="<?php echo plugins_url('images/youtube.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($feedburner) { ?>
                        <a href="<?php echo $feedburner; ?>" target="_blank" title="feedburner"><img src="<?php echo plugins_url('images/feedburner.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($lastfm) { ?>
                        <a href="<?php echo $lastfm; ?>" target="_blank" title="lastfm"><img src="<?php echo plugins_url('images/lastfm.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($skype) { ?>
                        <a href="skype:<?php echo $skype; ?>?call" target="_blank" title="skype"><img src="<?php echo plugins_url('images/skype.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                    <?php if($digg) { ?>
                        <a href="<?php echo $digg; ?>" target="_blank" title="digg"><img src="<?php echo plugins_url('images/digg.png', __FILE__); ?>" alt="" /></a>
                    <?php } ?>
                </div>
            </div>
            
             <?php echo $after_widget;
        }
        /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
        public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
                
                $instance['title'] = strip_tags( $new_instance['title'] );
                $instance['name'] = strip_tags( $new_instance['name'] );
                $instance['email'] = strip_tags( $new_instance['email'] );
                $instance['about_me'] = strip_tags( $new_instance['about_me'] ); // remove strip_tags to allow HTML tags
                $instance['facebook'] = strip_tags( $new_instance['facebook'] );
                $instance['twitter'] = strip_tags( $new_instance['twitter'] );
                $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
                $instance['google'] = strip_tags( $new_instance['google'] );
                $instance['flickr'] = strip_tags( $new_instance['flickr'] );
                $instance['youtube'] = strip_tags( $new_instance['youtube'] );
                $instance['feedburner'] = strip_tags( $new_instance['feedburner'] );
                $instance['skype'] = strip_tags( $new_instance['skype'] );
                $instance['lastfm'] = strip_tags( $new_instance['lastfm'] );
                $instance['digg'] = strip_tags( $new_instance['digg'] );
               
                return $instance;
        }
        /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
        public function form( $instance ) {
		//print_r($instance);
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Smart About Me', 'text_domain' );
		} 
                if ( isset( $instance[ 'name' ] ) ) {
			$name = $instance[ 'name' ];
		}
		else {
			$name = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'email' ] ) ) {
			$email = $instance[ 'email' ];
		}
		else {
			$email = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'about_me' ] ) ) {
			$about_me = $instance[ 'about_me' ];
		}
		else {
			$about_me = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'facebook' ] ) ) {
			$facebook = $instance[ 'facebook' ];
		}
		else {
			$facebook = __( '', 'text_domain' );
		} 
                if ( isset( $instance[ 'twitter' ] ) ) {
			$twitter = $instance[ 'twitter' ];
		}
		else {
			$twitter = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'linkedin' ] ) ) {
			$linkedin = $instance[ 'linkedin' ];
		}
		else {
			$linkedin = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'google' ] ) ) {
			$google = $instance[ 'google' ];
		}
		else {
			$google = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'flickr' ] ) ) {
			$flickr = $instance[ 'flickr' ];
		}
		else {
			$flickr = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'youtube' ] ) ) {
			$youtube = $instance[ 'youtube' ];
		}
		else {
			$youtube = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'feedburner' ] ) ) {
			$feedburner = $instance[ 'feedburner' ];
		}
		else {
			$feedburner = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'skype' ] ) ) {
			$skype = $instance[ 'skype' ];
		}
		else {
			$skype = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'lastfm' ] ) ) {
			$lastfm = $instance[ 'lastfm' ];
		}
		else {
			$lastfm = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'digg' ] ) ) {
			$digg = $instance[ 'digg' ];
		}
		else {
			$digg = __( '', 'text_domain' );
		}
                ?>
        
                <p> 
                    <?php echo get_avatar( $email, 50 ); ?><br/>
                    <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
		</p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'about_me' ); ?>"><?php _e( 'About Me:' ); ?></label> 
                    <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_me' ); ?>" name="<?php echo $this->get_field_name( 'about_me' ); ?>"><?php echo esc_attr( $about_me ); ?></textarea>
		</p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email (to get your avatar from gravatar.com):' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		</p>
            
                        <h3>Widget Settings</h3>
            
                <p>
                    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
                
                        <h3>Social Networks</h3>
                        
                 <p>
                    <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'google' ); ?>"><?php _e( 'Google:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" type="text" value="<?php echo esc_attr( $google ); ?>" />
                 </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" type="text" value="<?php echo esc_attr( $flickr ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'feedburner' ); ?>"><?php _e( 'Feedburner:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'feedburner' ); ?>" name="<?php echo $this->get_field_name( 'feedburner' ); ?>" type="text" value="<?php echo esc_attr( $feedburner ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e( 'Skype:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" type="text" value="<?php echo esc_attr( $skype ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'lastfm' ); ?>"><?php _e( 'Last Fm:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'lastfm' ); ?>" name="<?php echo $this->get_field_name( 'lastfm' ); ?>" type="text" value="<?php echo esc_attr( $lastfm ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'digg' ); ?>"><?php _e( 'Digg:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'digg' ); ?>" name="<?php echo $this->get_field_name( 'digg' ); ?>" type="text" value="<?php echo esc_attr( $digg ); ?>" />
                 </p>
                
<?php        }
        
} // class Smart_About_Me_Widget ends

// register Smart_About_Me_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "smart_about_me_widget" );' ) );