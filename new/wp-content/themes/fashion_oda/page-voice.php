<?php get_header(); ?>
<div class="box_white_under">
	<?php echo do_shortcode('[kv_image]'); ?>
	<section class="sec_breadcrumb">
		<ul class="list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>life/" class="fade">学生生活</a></li>
			<li> 在校生VOICE</li>
		</ul>
	</section>
	<!-- /.sec_breadcrumb -->
	<section class="sec_contents">
			<ul class="anchor-link-voice">
				<li><a href="#fashiondesign" class="fade">ファッション<br>デザイン科</a></li>
				<li><a href="#fashiontechnical" class="fade">ファッション<br>テクニカル科</a></li>
				<li><a href="#stylist" class="fade">スタイリスト科</a></li>
				<li><a href="#fashionbusiness" class="fade">ファッション<br>ビジネス科</a></li>
			</ul>
<?php foreach(get_terms("course", "hide_empty=1") as $course): ?>
			<section id="<?php echo esc_attr($course->slug); ?>" class="clm section">
				<h2 class="headline-2-1"><span><?php echo esc_html($course->name); ?></span></h2>
	<?php
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'voice',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'course',
					'field' => 'slug',
					'terms' => array($course->slug),
					'operator' => 'IN'
				)
			),
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
		$posts = get_posts($args);
	?>
	<?php if($posts): ?>
				<div class="column-4 sp-column-2">
		<?php foreach($posts as $post): setup_postdata($post); ?>
					<div>
						<a href="#modal<?php the_ID(); ?>" class="btn_modal noscroll fade a-block">
							<div class="image image-height">
								<?php the_post_thumbnail("thumbnail"); ?>
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/common/square.png" alt="" class="size">
							</div>
							<p class="text-block-black mt00 tal"><?php the_title(); ?></p>
						</a>
						<div style="display: none;">
							<div id="modal<?php the_ID(); ?>" class="voice-modal">
								<div class="column-1-square">
									<div class="image"><?php the_post_thumbnail("full"); ?></div>
								</div>
								<div class="box_txt">
									<p class="text-size24 bold tac"><?php the_title(); ?> [<?php the_field("school"); ?>]</p>
									<p class="tac"><?php the_field("interview"); ?></p>
								</div>
							</div>
						</div>
					</div>
		<?php endforeach; ?>
				</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
			</section>
<?php endforeach; ?>
	</section>
	<!-- /.sec_about -->
</div>
<?php get_footer(); ?>
