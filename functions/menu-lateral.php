<?php
function print_produtos_e_filhos( $tax_name ) {
    $cats = get_terms( $tax_name, [ 'parent' => 0, 'hide_empty' => true ] );
    echo '<ul>';
    foreach ( $cats as $cat ):
        if ( ! $cat->slug != 'destaque' ) {
            ?>
            <li>
                <span class="elementos-cat li-span">
                    <a href="<?php echo get_term_link( $cat ); ?>">
                        <?php echo $cat->name; ?>
                    </a>
                </span>
                <?php render_children( $cat ); ?>
            </li>

        <?php
        }
    endforeach;
    echo '</ul>';
  }

  function render_children( $parent ) {
    $children = get_terms( $parent->taxonomy, [ 'parent' => $parent->term_id, 'hide_empty' => true ] );
    echo '<ul class="ul-submenu">';
    foreach ( $children as $kid ):
        ?>
        <li class="elementos-cat li-submenu">
            <a href="<?php echo get_term_link( $kid ); ?>">
              + <?php echo $kid->name; ?>
            </a>
        </li>
    <?php
    endforeach;
    echo '</ul>';
  }
