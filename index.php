<?php get_header(); ?>

<div class="movie-list">
    <?php
    $movies = fetch_tmdb_movies();
    if ( $movies && !empty( $movies->results ) ) {
        foreach ( $movies->results as $movie ) {
            ?>
            <div class="movie-item">
                <img src="https://image.tmdb.org/t/p/w500<?php echo esc_url( $movie->poster_path ); ?>" alt="<?php echo esc_attr( $movie->title ); ?>">
                <h2><?php echo esc_html( $movie->title ); ?></h2>
                <p><?php echo esc_html( $movie->overview ); ?></p>
                <span>Release Date: <?php echo esc_html( $movie->release_date ); ?></span>
            </div>
            <?php
        }
    } else {
        echo '<p>No movies found.</p>';
    }
    ?>
</div>

<?php get_footer(); ?>
