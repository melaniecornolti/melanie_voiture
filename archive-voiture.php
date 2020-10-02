<?php get_header(); ?>
<div class="voitures">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <article class="voiture">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
        <h1 class="title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
        <div class="content">
            <?php the_content(); ?>
        </div>
        <div class="caracteristiques">
            <p>Couleur : <?php the_field( 'couleur' ); ?> • Cylindrée en m2 : <?php the_field( 'cylindree' ); ?> • Poids : <?php the_field( 'poids' ); ?></p>
        </div>
        <div>
            <?php the_terms( $post->ID, 'marque', 'Marque : ' ); ?>
        </div>

    </article>
    <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>