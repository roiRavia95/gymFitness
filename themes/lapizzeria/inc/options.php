<?php
function laPizzeria_options(){
    add_menu_page('La Pizzeria Options','Options','administrator','Options','laPizzeria_adjustments','',20);

    add_submenu_page('Options','Reservations','Reservations','administrator','reservations','laPizzeria_reservations');
};
add_action('admin_menu','laPizzeria_options');

// Register each setting
function laPizzeria_settings(){
    //Google Maps
    register_setting('laPizzeria_options_gmaps','laPizzeria_gmaps_latitude');
    register_setting('laPizzeria_options_gmaps','laPizzeria_gmaps_longitude');
    register_setting('laPizzeria_options_gmaps','laPizzeria_gmaps_zoom');
    register_setting('laPizzeria_options_gmaps','laPizzeria_gmaps_apikey');

    //Information Group
    register_setting('laPizzeria_options_info','laPizzeria_options_address');
    register_setting('laPizzeria_options_info','laPizzeria_options_phone');

};

add_action('init','laPizzeria_settings');

function laPizzeria_adjustments(){?>
    <div class='wrap'>
        <h1>La Pizzeria Adjustments</h1>
        <form action='options.php' method='post'>
            <?php 
            settings_fields('laPizzeria_options_gmaps');
            do_settings_sections('laPizzeria_options_gmaps');
            ?>
            <h2>Google Maps</h2>
            <table class='form-table'>
                <tr valign='top'>
                    <th scope='row'>
                        Latitude: 
                    </th>
                    <td>
                        <input type='text' name='laPizzeria_gmaps_latitude' value='<?php echo esc_html(get_option('laPizzeria_gmaps_latitude')) ?>'>
                    </td>
                </tr>
                <tr valign='top'>
                    <th scope='row'>
                        Longitude: 
                    </th>
                    <td>
                        <input type='text' name='laPizzeria_gmaps_longitude' value='<?php echo esc_html(get_option('laPizzeria_gmaps_longitude')) ?>'>
                    </td>
                </tr>
                <tr valign='top'>
                    <th scope='row'>
                        Zoom: 
                    </th>
                    <td>
                        <input type='number' min="8" max="20" name='laPizzeria_gmaps_zoom' value='<?php echo esc_html(get_option('laPizzeria_gmaps_zoom')) ?>'>
                    </td>
                </tr>
                <tr valign='top'>
                    <th scope='row'>
                        API key: 
                    </th>
                    <td>
                        <input type='text' name='laPizzeria_gmaps_apikey' value='<?php echo esc_html(get_option('laPizzeria_gmaps_apikey')) ?>'>
                        <label for="laPizzeria_gmaps_apikey">*Be Carful</label>
                    </td>
                </tr>
            </table>

            <?php 
            settings_fields('laPizzeria_options_info');
            do_settings_sections('laPizzeria_options_info');
            ?>
            <h2>Restuarant information</h2>
            <table class='form-table'>
                <tr valign='top'>
                <th scope='row'>
                       Address: 
                    </th>
                <td>
                        <input type='text' name='laPizzeria_options_address' value='<?php echo esc_attr(get_option('laPizzeria_options_address')) ?>'>
                    </td>
                </tr>
                <tr valign='top'>
                <th scope='row'>
                        Phone: 
                    </th>
                <td>
                        <input type='text' name='laPizzeria_options_phone' value='<?php echo esc_attr(get_option('laPizzeria_options_phone')) ?>'>
                    </td>
                </tr>
            </table>

            <?php submit_button() ?>
        </form>
    </div>

    <?php
};


function laPizzeria_reservations(){
    ?>
    <div class='wrap'>
        <h2>Reservations</h2>
        <table class='wp-list-table widefat striped'>
            <thead>
                <tr>
                    <th class='manage-column'>ID</th>
                    <th class='manage-column'>Name</th>
                    <th class='manage-column'>Date</th>
                    <th class='manage-column'>Email</th>
                    <th class='manage-column'>Phone</th>
                    <th class='manage-column'>Message</th>
                    <th class='manage-column remove'>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $wpdb;
                $table = $wpdb->prefix . 'reservations';
                $data = $wpdb->get_results("SELECT * FROM $table",ARRAY_A);
                foreach($data as $reservation){
                    ?>
                    <tr>
                    <td class='data'><?php echo $reservation['id']?></td>
                    <td class='data'><?php echo $reservation['name']?></td>
                    <td class='data'><?php echo $reservation['date']?></td>
                    <td class='data'><?php echo $reservation['email']?></td>
                    <td class='data'><?php echo $reservation['phone']?></td>
                    <td class='data'><?php echo $reservation['message']?></td>
                    <td class='remove'><a href="#" class="remove_reservation" data-reservation="<?php echo $reservation['id']?>">Remove</a></td>
                    </tr>
                    <?php
                }
?>

             </tbody>
        </table>
    </div>
    <?php
}

?>