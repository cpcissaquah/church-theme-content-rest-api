<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/joe--cool
 * @since      1.0.0
 *
 * @package    Church_Theme_Content_Rest_Api
 * @subpackage Church_Theme_Content_Rest_Api/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    
    <form method="post" name="rest_api_options" action="options.php">

        <?php
            //Grab all options
            $options  = get_option($this->plugin_name);
            $sermon   = $options['sermon'];
            $event    = $options['event'];
            $location = $options['location'];
            $people   = $options['people'];
        ?>

        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        ?>
    
        <!-- SERMON -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for Sermons', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sermon">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sermon" name="<?php echo $this->plugin_name; ?> [sermon]" value="1" <?php checked($sermon, 0); ?> />
                <span><?php esc_attr_e('Enable REST API for Sermons', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- EVENT -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for Events', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-event">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-event" name="<?php echo $this->plugin_name; ?> [event]" value="1" <?php checked($event, 0); ?> />
                <span><?php esc_attr_e('Enable REST API for Events', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- LOCATION -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for Locations', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-location">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-location" name="<?php echo $this->plugin_name; ?> [location]" value="1" <?php checked($location, 0); ?> />
                <span><?php esc_attr_e('Enable REST API for Locations', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- PERSON -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for People', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-people">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-people" name="<?php echo $this->plugin_name; ?> [people]" value="1" <?php checked($people, 0); ?> />
                <span><?php esc_attr_e('Enable REST API for People', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

    </form>

</div>