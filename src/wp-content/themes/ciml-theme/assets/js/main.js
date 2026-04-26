(function () {
	var root = document.documentElement;
	var header = document.querySelector('.site-header');
	var targets = document.querySelectorAll('.fade-in, .reveal');
	var prefersReducedMotion = false;

	if (window.matchMedia) {
		prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		if (prefersReducedMotion) {
			root.classList.add('reduce-motion');
		} else {
			root.classList.remove('reduce-motion');
		}
	}

	if (header) {
		var setHeaderState = function () {
			var scrolled = window.scrollY > 8;

			header.classList.toggle('has-shadow', scrolled);
			header.classList.toggle('is-scrolled', scrolled);
		};

		setHeaderState();
		window.addEventListener(
			'scroll',
			function () {
				setHeaderState();
			},
			{ passive: true }
		);
	}

	if (!targets.length) {
		return;
	}

	if (prefersReducedMotion || !('IntersectionObserver' in window)) {
		Array.prototype.forEach.call(targets, function (element) {
			element.classList.add('visible', 'is-visible');
		});
		return;
	}

	var observer = new IntersectionObserver(
		function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('visible', 'is-visible');
					observer.unobserve(entry.target);
				}
			});
		},
		{ rootMargin: '0px 0px -12% 0px', threshold: 0.12 }
	);

	Array.prototype.forEach.call(targets, function (element) {
		observer.observe(element);
	});
})();
