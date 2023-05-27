
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <?php wp_head(); ?>
</head>
<body>

<?php
// Template Name:Company Layout
?>

<?php get_header(); ?>
  <div class="container content">
    <div class="main block">
    <?php if(have_posts()): ?>
     <?php while(have_posts()) : the_post();?>


    <article class="page">
        <h2><?php the_title();?></h2>
        <p class="phone">1-800-555-5555</p>
        <?php the_content();?>
    </article>   
    
    
    <?php endwhile;?>
    <?php else:?>
    <?php echo wpautop('Sorry ,no posts were found');?>
    <?php endif;?>   
    </div>
    
    <div class="side">
        <div class="block">
            <h3>Sidebar Head</h3>
            <p> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on th</p>
            <a class="button">More</a>
        </div>
    </div>
   
</div>

<?php get_footer();?>

</body>
</html>