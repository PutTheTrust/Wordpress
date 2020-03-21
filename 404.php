<?php get_header() ?>

<div class="container-404">
    <h2 class="page-heading">Oh! What?? 404?</h2>
    <img src="http://source.unsplash.com/640x480?cats">

    <h3>Sorry Friend, I thnk you are lost. Please try the following links.</h3>
    <ul>
            <li>
                <a href="<?php echo site_url(''); ?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('/blog') ?>;">Blog</a>
            </li>
            <li>
                <a href="<?php echo site_url('/projects'); ?>">Projects</a>
            </li>
            <li>
                <a href="<?php echo site_url('/about'); ?>">About</a>
            </li>
</div>

<?php get_footer(); ?>