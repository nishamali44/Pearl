<?php
 
 /*
 	
 @package pearltheme
 -- Audio Post Format
 
 */
 
 ?>
 
 <article id="post-<?php the_ID(); ?>" <?php post_class( 'pearl-format-audio' ); ?>>
 	<header class="entry-header">
 		
 		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
 		
 		<div class="entry-meta">
 			<?php echo pearl_posted_meta(); ?>
 		</div>
 		
 	</header>
 	
 	<div class="entry-content">
 		
 		<?php echo pearl_get_embedded_media( array('audio','iframe') ); ?>
 		
 	</div><!-- .entry-content -->
 	
 	<footer class="entry-footer">
 		<?php echo pearl_posted_footer(); ?>
 	</footer>
 	
 </article>