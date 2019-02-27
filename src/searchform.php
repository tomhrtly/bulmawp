<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
  <div class="field has-addons">
    <div class="control is-expanded">
      <input type="text" name="s" id="s" class="input" placeholder="Search" required>
    </div>
    <div class="control">
      <button type="submit" id="searchsubmit" class="button is-primary">
        <span class="icon">
          <i class="fas fa-search"></i>
        </span>
      </button>
    </div>
  </div>
</form>
