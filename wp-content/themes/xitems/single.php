<?php get_header() ?>
    <!-- BEGIN CONTENT -->
<?php the_post() ?>
    <main class="content">
        <div class="guarantees delivery aboutUs">
            <div class="wrapper-small">
                <?php the_content() ?>
            </div>
        </div>
    </main>

    <!-- CONTENT EOF   -->
    <!-- BEGIN FOOTER -->

<?php get_footer() ?>