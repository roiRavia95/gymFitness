<?php
function laPizzeria_database(){
    // get global wp database
    global $wpdb;

    global $lapizzeria_db_version;
    $lapizzeria_db_version = '1.0';
    //Name the table
    $table = $wpdb->prefix . 'reservations';

    $charset_collate = $wpdb->get_charset_collate();

    //SQL
    //Create SQL table structure for relevant table (in this case - reservations)
    //If one of the requirenments isn't met, the form doesn't get posted to the db
    $sql = "CREATE TABLE $table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(50) NOT NULL,
        date datetime NOT NULL,
        email varchar(50) DEFAULT '' NOT NULL,
        phone varchar(10) NOT NULL,
        message longtext NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    
}
add_action("after_setup_theme","laPizzeria_database")
?>

