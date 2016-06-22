<?php /* template name: produtos */ ?>
<?php get_header() ?>
  <main class="interno">
      <section class="topo-titulo">
        <div class="container">
          <h1 class="pull-left">
            <?php
            $titulo = get_the_terms($post->ID,'categoria-Produto');
            $titulo_certo = $titulo[0]->name;
            echo $titulo_certo;
            ?>
          </h1>
          <div class="pull-right">
            <?php
              if ( function_exists('yoast_breadcrumb') )
              {
                yoast_breadcrumb('<p id="breadcrumbs">','</p>');
              }
            ?>
          </div>
        </div>
      </section>

      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="menu-lateral" >
                <form class="" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                  <div class="input-group pull-right">
                    <input type="text" name="s" id="s" class="form-control" placeholder="Pesquisar por...">
                    <span class="input-group-btn">
                      <button class="btn btn-buscatop" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </span>
                  </div>
                </form>
                <div class="clearfix"></div>
              </div>
              <div class="clearfix" style="margin-bottom:20px;"></div>
              <div class="menu-lateral">
                <?php
                  print_produtos_e_filhos('categoria-Produto',$titulo_certo);
                ?>
              </div>
            </div>
            <div class="col-md-8">
              <div class="row">
                <?php
                  /*$args = array(
                    'post_type' => 'produto',
                    'paged'     => $paged,
                    'taxonomy'  => 'categoria-Produto',
                    'term'      => get_the_title()
                  );

                  $produtos = new wp_query($args);*/
                  if(have_posts()):
                    while (have_posts()): the_post();
                  ?>
                  <div class="col-md-4 grid-produto">
                    <?php if (has_post_thumbnail()): ?>
                      <div class="img-produto">
    										<a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
                        </a>
    									</div>
                    <?php endif; ?>
                    <a href="<?php the_permalink() ?>" class="btn btn-4uniformes">
                      <?php the_title() ?>
                    </a>
                  </div>
                  <?php
                    endwhile;
                  endif;
                ?>
              </div>
              <?php the_posts_paginate() ?>
            </div>
          </div>
        </div>
      </section>
  </main>
<?php get_footer() ?>
