<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body>
<?php get_header(); ?>
  
<div class="container content">
    <div class="main block">
     <h1 class="page-header">
      <?php 
      if(is_category()){
      single_cat_title();
      }else if(is_author()){
      the_post();
      echo'Archives By Authors:'.get_the_author();
      rewind_posts();
      }else if(is_tag()){
      single_tag_title();
      }else if(is_day()){
      echo'Archives By Day:' .get_the_date();
      }else if(is_month()){
      echo 'Archives By Month:' .get_the_date('F Y');
      }else if(is_year()){
      echo'Archives By Year:' .get_the_date('Y');
      }else{
      echo'Archives';
      }
      ?>
      <?php if(have_posts()): ?>
     <?php while(have_posts()) :the_post(); ?>
     <?php get_template_part('content',get_post_format()); ?>

    
    <article class="post">
    <h2><?php the_title(); ?></h2>
   
    <p class="meta">Posted at
        <?php the_time('F j ,Y g:i a'); ?>
        by 
        <a href="<?php echo get_author_posts_url(
        get_the_author_meta('ID')); ?>">
        <?php the_author(); ?>
       </a>
       | Posted In
       <?php
       $categories=get_the_category();
       $separator=",";
       $output= '';
       
       if($categories){
            foreach($categories as $category){
                $output.='<a href='.get_category_link($category->term_id).'>'.
                $category->cat_name.'</a>'.$separator;
            }
        } 
        echo trim($output,$separator);
        ?>
    </p>

    <?php if(has_post_thumbnail()): ?>
        <div class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
        </div>  
    <?php endif; ?>
    
    <?php if(is_single()): ?>
    <?php else: ?>
    <?php the_excerpt(); ?>
    <?php endif; ?>
    
    <?php the_excerpt(); ?>
    <a class="button" href="<?php the_permalink(); ?>">Read More</a>
  </article>


   <!-- <div class="archive-post">
    <h4>
        <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
       </a>
    </h4>
    <p>Posted On:<?php the_time('F j, Y g:i a'); ?></p>
   </div> -->

    <?php endwhile; ?>
    <?php else: ?>
    <?php echo wpautop('Sorry ,no posts were found'); ?>
    <?php endif; ?>   
    </div>
    <div class="side">
        <div class="block">
            <h3>Sidebar Head</h3>
            <p> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on th</p>
            <a class="button">More</a>
        </div>
    </div>
   
</div>

<?php get_footer(); ?>

</body>
</html>