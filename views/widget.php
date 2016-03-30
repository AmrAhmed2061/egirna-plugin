<?php if ( (1 == $instance['homepage-only'] && is_home()) || 1 != $instance['homepage-only'] ) { ?>


    <?php if ('above' == $instance['position']) { ?>

        <p class="egirna_plugin_name">
            <?php echo $instance['name']; ?></br>
        </p>


        <p class="egirna_plugin_channel">
            <?php echo $instance['channel']; ?>
        </p>

    <?php } else { ?>

        <p class="egirna_plugin_channel">
            <?php echo $instance['channel']; ?>
        </p>


        <p class="egirna_plugin_name">
            <?php echo $instance['name']; ?>
        </p>

    <?php } ?>

<?php } ?>


