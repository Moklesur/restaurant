<div class="menu-list-wrap">
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<h2 class="menu-title"><?php echo  esc_html( $instance['title'] ); ?></h2>
	<?php endif; ?>
	<div class="row">
		<?php foreach( $instance['menus'] as $i => $menu ) : ?>
			<div class="themetim-menus-list col-md-<?php echo esc_attr( $instance['per_row'] ); ?> col-sm-<?php echo esc_attr( $instance['per_row'] ); ?> col-xs-12">
				<div class="menu-list-details">
					<?php if ( ! empty( $menu['menu_title'] ) ) : ?>
						<h4><span class="padding-right-10"><?php echo esc_html( $menu['menu_title'] ); ?></span><?php if ( ! empty( $menu['menu_price'] ) ) : ?><span class="menu-price">(<?php echo esc_html( $menu['menu_price'] ); ?>)</span><?php endif; ?></h4>
					<?php endif; ?>
					<?php if ( ! empty( $menu['texteditor'] ) ) : ?>
						<div class="menu-content"><?php echo  $menu['texteditor'] ; ?></div>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
