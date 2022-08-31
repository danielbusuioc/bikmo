<?php 
/*
YARPP Template: BIKMO Template
Description: A simple starter example template that you can edit.
Author: YARPP Team
*/
?>

<?php
/*
Templating in YARPP enables developers to uber-customize their YARPP display using PHP and template tags.

The tags we use in YARPP templates are the same as the template tags used in any WordPress template. In fact, any WordPress template tag will work in the YARPP Loop. You can use these template tags to display the excerpt, the post date, the comment count, or even some custom metadata. In addition, template tags from other plugins will also work.

If you've ever had to tweak or build a WordPress theme before, you’ll immediately feel at home.

// Special template tags which only work within a YARPP Loop:

1. the_score()		// this will print the YARPP match score of that particular related post
2. get_the_score()		// or return the YARPP match score of that particular related post

Notes:
1. If you would like Pinterest not to save an image, add `data-pin-nopin="true"` to the img tag.

*/
?>

<?php if ( have_posts() ) : ?>

<h3 class="h2-text yarpp-related__title"><?php the_field('articles_related_section_title', 'options'); ?></h3>
<section class="articles-list blog-list">
    <div class="wrapper">


		<?php while ( have_posts() ) :
			the_post(); ?>

			<?php include App\template_path(locate_template('views/partials/articles/loop-item.blade.php')); ?>

		<?php endwhile; ?>

		<?php //else : ?>
		<!-- <p>No related posts.</p> -->
    </div>
</section>

<?php endif; ?>

