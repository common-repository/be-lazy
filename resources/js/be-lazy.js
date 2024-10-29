require('intersection-observer');

new (require('vanilla-lazyload'))({
	elements_selector: '[data-lazy]',
	data_src:          'lazy',
	data_srcset:		'lazy-set',
	threshold:         100
});
