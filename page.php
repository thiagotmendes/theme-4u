<?php get_header() ?>
  <main class="interno">
    <?php if (have_posts()): ?>
      <?php while(have_posts()): the_post() ?>
        <section class="topo-titulo">
          <div class="container">
            <h1><?php the_title() ?></h1>
          </div>
        </section>
        <section>
          <div class="container">
            <?php the_content() ?>
          </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>
  </main>
<?php get_footer() ?>
