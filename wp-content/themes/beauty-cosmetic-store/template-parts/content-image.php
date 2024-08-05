<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Beauty Cosmetic Store
 */
$beauty_cosmetic_store_post_page_title =  get_theme_mod( 'beauty_cosmetic_store_post_page_title', 1 );
$beauty_cosmetic_store_post_page_meta =  get_theme_mod( 'beauty_cosmetic_store_post_page_meta', 1 );
$beauty_cosmetic_store_post_page_thumb =  get_theme_mod( 'beauty_cosmetic_store_post_page_thumb', 1 );
?>

<div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
        <?php if ($beauty_cosmetic_store_post_page_thumb == 1 ) {?>
            <?php if ( has_post_thumbnail() ) { ?>
                <?php beauty_cosmetic_store_post_thumbnail(); ?>
            <?php }?>
        <?php }?>
        <?php if ($beauty_cosmetic_store_post_page_meta == 1 ) {?>
            <div class="meta-info-box my-2">
                <span class="entry-author"><?php esc_html_e('BY','beauty-cosmetic-store'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
            </div>
        <?php }?>
        <div class="post-summery">
            <?php if ($beauty_cosmetic_store_post_page_title == 1 ) {?>
                <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
            <?php }?>
            <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','beauty-cosmetic-store'); ?></a>
        </div>
    </article>
</div>