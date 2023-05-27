
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
     <?php while(have_posts()) : the_post();?>


    <article class="page">
        <?php if(page_is_parent() || $post->post_parent > 0):?>
        <nav class="nav sub-nav">
            <ul>
                <span class="parent-link"><a href="<?php echo
                get_the_permalink(get_top_parent());?>"><?php
                echo get_the_title(get_top_parent()); ?></a>
                </span>
        <?php
        $args = array(
            'child_of' => get_top_parent(),
            'title_li' => ''
        );
        ?>
        <?php wp_list_pages($args);?>
    </ul>
    <div class="clr"></div>
    </nav>
    <?php endif; ?>
        <h2><?php the_title();?></h2>
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