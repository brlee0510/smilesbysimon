<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input class="form-control on-left" type="text" name="s"
		       value="<?php echo get_search_query(); ?>"
		       placeholder="<?php echo esc_attr(__('Type search query', 'dentist')); ?>"/>

        <span class="input-group-btn">
            <button class="btn btn-lg btn-primary"><i class="fa fa-search"></i></button>
        </span>
	</div>
</form>