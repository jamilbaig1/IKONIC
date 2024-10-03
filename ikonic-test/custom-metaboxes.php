<?php

// Register Meta Boxes
function project_meta_boxes() {
    add_meta_box( 
        'project_start_date', 
        'Project Start Date', 
        'project_start_date_callback', 
        'projects', 
        'normal', 
        'default' 
    );
    add_meta_box( 
        'project_end_date', 
        'Project End Date', 
        'project_end_date_callback', 
        'projects', 
        'normal', 
        'default' 
    );
    add_meta_box( 
        'project_url', 
        'Project URL', 
        'project_url_callback', 
        'projects', 
        'normal', 
        'default' 
    );
}
add_action( 'add_meta_boxes', 'project_meta_boxes' );

// Meta Box Callbacks
function project_start_date_callback( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'save_project_meta_box_data', 'project_meta_box_nonce' );

    $value = get_post_meta( $post->ID, '_project_start_date', true );
    echo '<label for="project_start_date">Start Date: </label>';
    echo '<input type="date" id="project_start_date" name="project_start_date" value="' . esc_attr( $value ) . '" />';
}

function project_end_date_callback( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'save_project_meta_box_data', 'project_meta_box_nonce' );

    $value = get_post_meta( $post->ID, '_project_end_date', true );
    echo '<label for="project_end_date">End Date: </label>';
    echo '<input type="date" id="project_end_date" name="project_end_date" value="' . esc_attr( $value ) . '" />';
}

function project_url_callback( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'save_project_meta_box_data', 'project_meta_box_nonce' );

    $value = get_post_meta( $post->ID, '_project_url', true );
    echo '<label for="project_url">Project URL: </label>';
    echo '<input type="url" id="project_url" name="project_url" value="' . esc_attr( $value ) . '" />';
}

// Save Meta Box Data
function save_project_meta_boxes_data( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['project_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['project_meta_box_nonce'], 'save_project_meta_box_data' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Sanitize user input and update the meta fields.
    if ( isset( $_POST['project_start_date'] ) ) {
        $start_date = sanitize_text_field( $_POST['project_start_date'] );
        update_post_meta( $post_id, '_project_start_date', $start_date );
    }

    if ( isset( $_POST['project_end_date'] ) ) {
        $end_date = sanitize_text_field( $_POST['project_end_date'] );
        update_post_meta( $post_id, '_project_end_date', $end_date );
    }

    if ( isset( $_POST['project_url'] ) ) {
        $url = esc_url_raw( $_POST['project_url'] );
        update_post_meta( $post_id, '_project_url', $url );
    }
}
add_action( 'save_post', 'save_project_meta_boxes_data' );