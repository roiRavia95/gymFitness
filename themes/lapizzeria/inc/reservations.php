<?php
function laPizzeria_save_reservations(){
    global $wpdb;
    //_POST puts into an asc array form (with post method)values
    if(isset($_POST['reservation']) && ($_POST['hidden'] == '1')){

        $name = sanitize_text_field($_POST['name']);
        $date = sanitize_text_field($_POST['date']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_text_field($_POST['message']);

        $table = $wpdb->prefix . 'reservations';

        $data = array(
            'name'=>$name,
            'date'=>$date,
            'email'=>$email,
            'phone' => $phone,
            'message'=>$message
        );

        $format = array(
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        );

        $wpdb->insert($table,$data,$format);


        $page = get_page_by_title('Thanks for the reservation!');
        wp_redirect(get_permalink($page));
        exit();
    }

};

add_action('init','laPizzeria_save_reservations');

function laPizzeria_remove_reservation(){
    global $wpdb;
    $table = $wpdb->prefix . "reservations";
    $post_id = $_POST['id'];
    // $_POST is the data from the ajax call with the post method
    if($_POST['type']=='delete'){
        $result = $wpdb->delete($table,array("id"=>$post_id),array("%d"));
    }

    if($result == 1){
        $response = array(
            "response"=>"Success",
            "id"=>$post_id
        );
    }else{
        $response = array(
            "response"=>"Error",
        );
    };


    //Always add die() with ajax functions
    die(json_encode($response));
}

add_action("wp_ajax_laPizzeria_remove_reservation","laPizzeria_remove_reservation")

?>