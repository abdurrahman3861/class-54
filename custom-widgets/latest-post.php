<?php

class comet_latest_post extends WP_Widget {

	public function __construct(){

		parent:: __construct('comet-latest-post', 'Comet Latest Posts', array(
			'description' => 'Custom Latest Post Widget by Comet Theme'
		));

	}

	public function widget($jkono, $instance){ ?>
	
	<?php echo $jkono['before_widget']; ?>
    	<?php echo $jkono['before_title']; ?>Latest Posts<?php echo $jkono['after_title']; ?>


		<?php 
	 	$posts = new WP_Query(array(
	 		'post_type' => 'post',
	 		'posts_per_page' => $jkono['kotogula']
	 		));
		?>

      <ul class="nav">
      	<?php while($posts->have_posts()) : $posts->the_post(); ?>
        	<li><a href="#"><?php the_title(); ?><i class="ti-arrow-right"></i><span><?php the_time('d M, Y') ?></span></a></li>
        <?php endwhile; ?>
      </ul>
    <?php echo $jkono['after_widget']; ?>
	<?php }

	public function form($abdur){ ?>

		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Title: </label>
			<input type="text" id="<?php echo $this->get_field_id('title') ?>" class="widefat" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo $abdur['title']; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('kotogula'); ?>">Number of posts to show:</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id('kotogula'); ?>" name="<?php echo $this->get_field_name('kotogula'); ?>" type="number" step="1" min="1" value="<?php echo $abdur['kotogula']; ?>" size="3">
		</p>


		
	<?php }

}

add_action('widgets_init', 'latest_post_widget');

function latest_post_widget(){
	register_widget('comet_latest_post');

}




