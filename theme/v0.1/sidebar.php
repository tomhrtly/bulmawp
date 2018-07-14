<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.1
 */
?>
<div class="column is-3">
	<aside class="menu">
		<?php
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar')) :
		endif; ?>
	</aside>
</div>
