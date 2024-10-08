<?php
// Enqueue styles and scripts
function movie_theme_enqueue_styles() {
    wp_enqueue_style( 'main-css', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'movie_theme_enqueue_styles' );

// Fetch movies from TMDB API
function fetch_tmdb_movies( $page = 1 ) {
    $api_key = '2f5408a04ba17e17cc93b9017c6ead23'; // Replace with your TMDB API Key
    $endpoint = "https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=en-US&page=$page";
    
    $response = wp_remote_get( $endpoint );
    $body = wp_remote_retrieve_body( $response );
    return json_decode( $body );
}

// Add theme support for title tag
add_theme_support( 'title-tag' );
