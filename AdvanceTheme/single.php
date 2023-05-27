
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
    <?php if(have_posts()): ?>
     <?php while(have_posts()) :the_post(); ?>
     

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
    <?php the_content(); ?>
   
    </article>
    <?php endwhile; ?>
    
    <?php else: ?>
    <?php echo wpautop('Sorry ,no posts were found'); ?>
    <?php endif; ?>  
    <?php comments_template(); ?> 
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