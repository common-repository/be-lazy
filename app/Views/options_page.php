<?php
	use BeLazy\Helpers\Config;
	use BeLazy\Helpers\Form;
?>

<div class="wrap">
	<h1><?php _e('Be Lazy Settings', 'be-lazy'); ?></h1>
	<form method="post" action="options.php">
		<?php settings_fields(BE_LAZY_SLUG); ?>
		<?php do_settings_sections(BE_LAZY_SLUG); ?>
		<h2><?php _e('Post types', 'be-lazy'); ?></h2>
		<table class="form-table">
			<tbody>
				<?php foreach(Config::get_post_types() as $post_type) : ?>
					<tr>
						<th scope="row"><?php echo $post_type->label; ?></th>
						<td>
							<fieldset>
								<?php Form::radio('active', $post_type->name, '', '1', __('Inactive', 'be-lazy')); ?>
								<?php Form::radio('active', $post_type->name, '1', '1', __('Automatically', 'be-lazy')); ?>
								<?php Form::radio('active', $post_type->name, '2', '1', __('Manually', 'be-lazy')); ?>
							</fieldset>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php submit_button(); ?>
	</form>
</div>