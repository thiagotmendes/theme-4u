<?php get_header() ?>
  <main class="interno">
    <?php
      //the_title();
      $termo = get_the_terms ( $post->ID, 'categoria-Produto' );
      //var_dump($termo);
    ?>
    <section class="topo-titulo">
      <div class="container">
        <h1 class="pull-left">
          <?php echo $termo[0]->name; ?>
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

    <?php if (have_posts()): ?>
      <?php while(have_posts()): the_post() ?>
        <?php $postid = get_the_Id() ?>
        <section>
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <?php
                  $galeria = get_field('galeria_produto');
                  if ($galeria):
                    //  slider superior
                    echo "<div class='slider-for'>";
                    foreach ($galeria as $imgGaleria):
                  ?>
                      <img src="<?php echo $imgGaleria['sizes']['large']; ?>"
                        alt="<?php echo $imgGaleria['alt']; ?>" />
                  <?php
                    endforeach;
                    echo "</div>";
                    // slider inferior
                    echo "<div class='slider-nav'>";
                    foreach ($galeria as $imgGaleria1):
                    ?>
                      <img src="<?php echo $imgGaleria1['sizes']['large']; ?>"
                        alt="<?php echo $imgGaleria1['alt']; ?>" />
                    <?php
                    endforeach;
                    echo "</div>";
                  else:
                    the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) );
                  endif;
                ?>
              </div>
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-7">
                    <div class="desc-block">
                      <h2 class="titulo-produto"><?php the_title() ?></h2>
                      <div class="desc-curta">
                        <?php
                        $descricao_curta = get_field('descrição_curta');
                        if ($descricao_curta) {
                          echo $descricao_curta;
                        }
                        ?>
                      </div>
                      <button type="button" name="button" class="btn btn-orcamento" data-toggle="modal" data-target="#form_orcamento">
                        Solicite um orçamento
                      </button>
                      <div class="modal fade" id="form_orcamento" tabindex="-1" role="dialog" aria-labelledby="Form orçamento">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel"><?php the_title() ?></h4>
                            </div>
                            <div class="modal-body">
                              <?php echo do_shortcode('[contact-form-7 id="77" title="form orçamento"]') ?>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="addons-produto">
                      <?php
                      $cores = get_field('cores');
                      if ($cores) {
                        echo "<h4>Cores:</h4>";
                        foreach ($cores as $cor) {
                          echo "<div class='itemcor' style='background-color:$cor' ></div>";
                        }
                      }
                      ?>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="quadro-tec">
                      <?php
                      $quadro_info = get_field('quadro');
                      if( $quadro_info ): ?>
                        <?php foreach( $quadro_info as $quadro ): ?>
                          <img src="<?php echo $quadro['sizes']['large']; ?>" alt="<?php echo $quadro['alt']; ?>" class="img-responsive" />
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <h3 class="titulo-descricao">Descrição</h3>
            <?php the_content() ?>
            <p style="text-align:center;">
              <button type="button" name="button" class="btn btn-orcamento" data-toggle="modal" data-target="#form_orcamento">
                Solicite um orçamento
              </button>
            </p>
          </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>
    <div class="container">
      <div class="produtos-relacionados">
        <h2 class="titulo-descricao">Produtos Relacionados</h2>
        <div class="row">
          <?php
          $produto_relacionado = get_the_terms($post->ID, 'categoria-Produto');
          $name_term = $produto_relacionado[0]->name;
          $argumento = array(
            'post_type'       => 'produto',
            'posts_per_page'  => 5,
            'tax_query' => array(
              array(
                'taxonomy'  => 'categoria-Produto',
                'field'     => 'name',
                'terms'     => $name_term,
              ),
            ),
          );
          $item_produtos = new wp_query($argumento);
          if ($item_produtos->have_posts()):
            while ($item_produtos->have_posts()): $item_produtos->the_post();
            if ($postid != get_the_Id()) {
            ?>
            <div class="col-md-3">
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
            }
            endwhile;
          endif;
          ?>
        </div>
      </div>
    </div>

  </main>
<?php get_footer() ?>
