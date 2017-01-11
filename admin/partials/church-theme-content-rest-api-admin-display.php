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

            $sermon             = $options['sermon'];
            $sermon_topic       = $options['sermon_topic'];
            $sermon_book        = $options['sermon_book'];
            $sermon_series      = $options['sermon_series'];
            $sermon_speaker     = $options['sermon_speaker'];
            $sermon_tag         = $options['sermon_tag'];

            $event              = $options['event'];
            $event_category     = $options['event_category'];

            $location           = $options['location'];

            $person             = $options['person'];
            $person_group       = $options['person_group'];

            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        ?>

    
        <!-- SERMON -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for Sermons', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sermon">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sermon" name="<?php echo $this->plugin_name; ?>[sermon]" value="1" <?php checked($sermon, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Sermons', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>&nbsp;&nbsp;&nbsp;<?php _e('Enable REST API for Sermon Topic', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sermon_topic">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sermon_topic" name="<?php echo $this->plugin_name; ?>[sermon_topic]" value="1" <?php checked($sermon_topic, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Sermon Topic', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>&nbsp;&nbsp;&nbsp;<?php _e('Enable REST API for Sermon Book', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sermon_book">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sermon_book" name="<?php echo $this->plugin_name; ?>[sermon_book]" value="1" <?php checked($sermon_book, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Sermon Book', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>&nbsp;&nbsp;&nbsp;<?php _e('Enable REST API for Sermon Series', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sermon_series">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sermon_series" name="<?php echo $this->plugin_name; ?>[sermon_series]" value="1" <?php checked($sermon_series, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Sermon Series', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>&nbsp;&nbsp;&nbsp;<?php _e('Enable REST API for Sermon Speaker', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sermon_speaker">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sermon_speaker" name="<?php echo $this->plugin_name; ?>[sermon_speaker]" value="1" <?php checked($sermon_speaker, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Sermon Speaker', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>&nbsp;&nbsp;&nbsp;<?php _e('Enable REST API for Sermon Tag', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sermon_tag">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sermon_tag" name="<?php echo $this->plugin_name; ?>[sermon_tag]" value="1" <?php checked($sermon_tag, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Sermon Tag', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- EVENT -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for Events', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-event">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-event" name="<?php echo $this->plugin_name; ?>[event]" value="1" <?php checked($event, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Events', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>&nbsp;&nbsp;&nbsp;<?php _e('Enable REST API for Event Category', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-event_category">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-event_category" name="<?php echo $this->plugin_name; ?>[event_category]" value="1" <?php checked($event_category, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Event Category', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- LOCATION -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for Locations', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-location">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-location" name="<?php echo $this->plugin_name; ?>[location]" value="1" <?php checked($location, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Locations', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- PERSON -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable REST API for Person', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-person">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-person" name="<?php echo $this->plugin_name; ?>[person]" value="1" <?php checked($person, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Person', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>&nbsp;&nbsp;&nbsp;<?php _e('Enable REST API for Person Group', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-person_group">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-person_group" name="<?php echo $this->plugin_name; ?>[person_group]" value="1" <?php checked($person_group, 1); ?> />
                <span><?php esc_attr_e('Enable REST API for Person Group', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

    </form>

</div>
