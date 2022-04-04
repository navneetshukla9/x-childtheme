<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$n = x_footer_widget_areas_count();

?>

<?php if ( $n != 0 ) : ?>

  <footer class="x-colophon top" id="site-footer" role="contentinfo" style="padding-bottom: 1em; font-size: 14px;">
    <div class="x-container max width">

      <?php

      $i = 0; while ( $i < $n ) : $i++;

        $last = ( $i == $n ) ? ' last' : '';

        echo '<div class="x-column x-md x-1-' . $n . $last . '">';
          dynamic_sidebar( 'footer-' . $i );
        echo '</div>';
      endwhile;
        echo '</div>';
      if (is_dynamic_sidebar('sidebar-after-footer-navigation')) { ?>
        <div class="x-container max width after-footer-nav" style="clear: both; margin: 2em auto 0; border-top: 1px solid #ccc; padding: 1em 0 0; WIDTH: 88%;">
          <span style="float: left; font-size: 12px;">&copy; <?php echo date('Y'); ?> USC Viterbi</span><span style="float: right; font-size: 12px;"><a href="https://viterbi.usc.edu/privacy" target="_blank">Privacy Notice</a> | <a href="https://policy.usc.edu/smoke-free/" target="_blank">Smoke-Free Policy</a></span>
        </div>
      <?php }

      ?>

    </div>
  </footer>

<?php endif; ?>