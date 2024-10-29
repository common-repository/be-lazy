jQuery($ =>
{
	$('.column-be-lazy img').click(e =>
	{
		$.post(
			ajaxurl,
			{
				'action': 'be_lazy_toggle',
				'post_id': $(e.currentTarget).attr('data-id'),
				'value': $(e.currentTarget).hasClass('active') ? 0 : 1
			},
			() =>
			{
				$(e.currentTarget).toggleClass('active')
			}
		)
	})
})