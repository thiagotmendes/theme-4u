<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-3">
            <h4>Masculino</h4>
            <?php
            $terms = get_terms( 'categoria-Produto', array('child_of' => 3) );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
              echo '<ul>';
              foreach ( $terms as $term ) {
                $term_link = get_term_link( $term );
                echo '<li> <a href="' . esc_url( $term_link ) . '"> + ' . $term->name . '</a></li>';
              }
              echo '</ul>';
            }
            ?>
          </div>
          <div class="col-md-3">
            <h4>Feminino</h4>
            <?php
            $terms = get_terms( 'categoria-Produto', array('child_of' => 4) );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
              echo '<ul>';
              foreach ( $terms as $term ) {
                $term_link = get_term_link( $term );
                echo '<li> <a href="' . esc_url( $term_link ) . '">+ ' . $term->name . '</a></li>';
              }
              echo '</ul>';
            }
            ?>
          </div>
          <div class="col-md-3">
            <h4>Esportes</h4>
            <?php
            $terms = get_terms( 'categoria-Produto', array('child_of' => 5) );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
              echo '<ul>';
              foreach ( $terms as $term ) {
                $term_link = get_term_link( $term );
                echo '<li> <a href="' . esc_url( $term_link ) . '">+ ' . $term->name . '</a></li>';
              }
              echo '</ul>';
            }
            ?>
          </div>
          <div class="col-md-3 mapasite">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('rodape1') ) :?>
                <p class="msg-info">Gerencie seus Widgets pelo painel administrativo do Wordpress.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('rodape2') ) :?>
            <p class="msg-info">Gerencie seus Widgets pelo painel administrativo do Wordpress.</p>
        <?php endif; ?>
      </div>
      <div class="col-md-3">
        <a href="http://fourclimb.com.br/" target="_blank">
          <img src="<?php echo get_template_directory_uri() ?>/images/logo_4climb.png" alt="4climb" class="logo-footer" />
        </a>
        <?php echo do_shortcode('[contact-form-7 id="256" title="Newsletter"]') ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer() ?>
</body>
</html>
