<?php
namespace Roots\Sage\Jobs;

use function Roots\Sage\Extras\debug_to_console;

add_action('wp_ajax_import_jobs', __NAMESPACE__ . '\\import_jobs');
add_action('wp_ajax_nopriv_import_jobs', __NAMESPACE__ . '\\import_jobs');

function import_jobs() {
    $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
    $map_url = "https://cv-maxkompetens.app.intelliplan.eu/JobAdGlobePages/Feed.aspx?pid=AA31EA47-FDA6-42F3-BD9F-E42186E5A960&version=2";
    $xml = file_get_contents($map_url, false, $context);
    $xml = simplexml_load_string($xml);
    $arr = (array) $xml -> xpath('channel');
//        print_r($arr[0]->item);
    $count = $arr[0]->item->count();
    $items = $arr[0]->item;

    foreach($items as $item) {
        insert_or_update($item);
    }

    wp_die();
}

function insert_or_update($job_data) {

    if ( ! $job_data)
        return false;

    $args = array(
        'meta_query' => array(
            array(
                'key'   => 'maxkomp_jobs_ip_id',
                'value' => $job_data->userId
            )
        ),
        'post_type'      => 'job',
        'post_status'    => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit'),
        'posts_per_page' => 1
    );

    $job = get_posts( $args );

    $job_id = '';

    if ( $job )
        $job_id = $job[0]->ID;

    $job_post = array(
        'ID'            => $job_id,
        'post_title'    => $job_data->firstName." ".$job_data->lastName,
        'post_content'  => $job_data->publicDescription,
        'post_type'     => 'job',
        'post_status'   => ( $job ) ? $job[0]->post_status : 'publish'
    );

    $job_id = wp_insert_post( $job_post );

    if ( $job_id ) {
        $userId = $job_data->userId;
        if(is_array($job_data->email)) {
            $email = $job_data->email[0];
        }else{
            $email = $job_data->email;
        }
        update_post_meta( $job_id, '_job_cmb_id', $userId );
        update_post_meta( $job_id, '_job_cmb_email', $email);

//        update_post_meta( $job_id, 'json', addslashes( file_get_contents( 'php://input' ) ) );

//        wp_set_object_terms( $job_id, $job_data->tags, 'job_tag' );

        $image_url = $job_data->thumb;
        if($image_url)
//            set_profile_pic($image_url, $job_id); Disable for now, thumbs from dans.se is way too small

            $styles = get_styles($userId);

//        foreach($styles as $style) {
//            $parent_term = term_exists( 'fruits', 'custom_cat_job' ); // array is returned if taxonomy is given
//            $parent_term_id = $parent_term['term_id']; // get numeric term id
//            wp_insert_term(
//                $style, // the term
//                'custom_cat_job', // the taxonomy
//                array(
//                    'parent'=> $parent_term_id
//                )
//            );
//        }
        wp_set_object_terms( $job_id, $styles, 'custom_cat_job', false );
    }

}

?>