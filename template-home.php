<?php /* template name: Pagina Home */ ?>
<?php get_header() ?>

    <section>
      <?php echo do_shortcode('[rev_slider alias="home"]') ?>
    </section>

    <section class="pre-produtos">
      <div class="container">
        <h1 class="titulo-home">Uniformes personalisados para esportes</h1>
        <div class="row">
          <?php
          $arg_prod_home  = array(
            'post_type'       => 'produto',
            'posts_per_page'  => 4,
            'meta_query'      => array(
              array(
                'key'     => 'destacar',
		            'value'   => 1
              )
            )
          );

          $produtos_home = new wp_query($arg_prod_home);
          if ($produtos_home->have_posts()):
            while ($produtos_home->have_posts()): $produtos_home->the_post();
          ?>
          <div class="col-md-3 grid-produto">
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
      </div>
    </section>

    <section class="section-tecnologia">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <a href="http://4uniformes.com.br/tecnologia/ ">
              <img src="<?php echo get_template_directory_uri() ?>/images/box_tecnologia.jpg" alt="" class="img-responsive" />
            </a>
          </div>
          <div class="col-md-5">
            <a href="http://4uniformes.com.br/personalize-com-sua-marca/ ">
              <img src="<?php echo get_template_directory_uri() ?>/images/box_personalise.jpg" alt="" class="img-responsive" />
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="entrega-frete">
      <div class="container">
        <h3>VEJA PASSO A PASSO</h3>
        <h4>DESDE O MOMENTO DA ESCOLHA ATÉ O RECEBIMENTO EM SUA CASA </h4>
        <a href="<?php echo esc_url( home_url( 'passo-a-passo' ) ); ?>">
          <img src="<?php echo get_template_directory_uri() ?>/images/box_info.jpg" alt="" class="img-responsive" />
        </a>
      </div>
    </section>

    <section class="section-tecnologia">
      <div class="container">
        <div class="row">
          <div class="col-md-6">

            <a href="<?php echo esc_url( home_url( 'catalogo' ) ); ?>">
              <img src="<?php echo get_template_directory_uri() ?>/images/box_catalogo.jpg" alt="" class="img-responsive" />
            </a>
            <a href="<?php echo esc_url( home_url( 'promocoes' ) ); ?>">
              <img src="<?php echo get_template_directory_uri() ?>/images/box_promo.jpg" alt="" class="img-responsive" />
            </a>
          </div>
          <div class="col-md-6">
            <a href="<?php echo esc_url( home_url( 'orcamentos' ) ); ?>">
              <img src="<?php echo get_template_directory_uri() ?>/images/box_orcamento.jpg" alt="" class="img-responsive" />
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-clientes">
      <div class="container">
        <h3 class="titulo-home">Clientes</h3>
        <div class="logos">
          <?php
          $page_id = 38;
          $page_data = get_page ( $page_id );
          $content = $page_data->post_content;
          $title = $page_data->post_title;
           remove_filter ('the_content','wpautop');
          echo apply_filters( 'the_content', $page_data->post_content );
          ?>
        </div>
      </div>
    </section>
<?php get_footer() ?>
