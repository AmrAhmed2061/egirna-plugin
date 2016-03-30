<div class="egirna_plugin" xmlns="http://www.w3.org/1999/html">

    <div>
        <label><?php _e('Your Name', 'egirna_plugin') ?></label><br/>
        <input type="text" id="<?php echo $this->get_field_id('name'); ?>"
               name="<?php echo $this->get_field_name('name'); ?>"
               value="<?php echo esc_attr($instance['name']); ?>"/>
    </div>


    <div>
        <label><?php _e('Your Channel', 'egirna_plugin') ?></label></br>
        <textarea id="<?php echo $this->get_field_id('channel'); ?>"
                  name="<?php echo $this->get_field_name('channel'); ?>"
                  rows="3" cols="30" maxlength="160"
                  class="egirna_plugin_channel"><?php echo esc_textarea($instance['channel']); ?></textarea>
        <p class="description"><?php _e('You have 160 characters remaining.', 'egirna_plugin'); ?>
            <span class="egirna_plugin_count">160</span><?php _e('characters remaining', 'egirna_plugin'); ?></p>
    </div>


    <div>
        <label><?php _e('Display name', 'egirna_plugin'); ?></label></br>
        <select id="<?php echo $this->get_field_id('position'); ?>"
                name="<?php echo $this->get_field_name('position'); ?>">
            <option
                value="above"<?php selected('above', $instance['position'], true); ?>><?php _e('above the channel', 'egirna_plugin'); ?></option>
            <option
                value="below"<?php selected('below', $instance['position']) ?>><?php _e('below the channel', 'egirna_plugin'); ?></option>
        </select>
    </div>


    <div>
        <label>
            <input type="checkbox" id="<?php echo $this->get_field_id('homepage-only'); ?>"
                   name="<?php echo $this->get_field_name('homepage-only'); ?>"
                   value="1" <?php checked(1, $instance['homepage-only'], true); ?>/>
            <?php _e('Display only on homepage?', 'egirna_plugin'); ?>
        </label>
    </div>
</div>