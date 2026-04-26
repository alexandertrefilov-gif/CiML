(function () {
	var header = document.querySelector('.site-header');

	if (header) {
		window.addEventListener(
			'scroll',
			function () {
				header.classList.toggle('has-shadow', window.scrollY > 8);
			},
			{ passive: true }
		);
	}

	if ('IntersectionObserver' in window) {
		var observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('visible');
						observer.unobserve(entry.target);
					}
				});
			},
			{ rootMargin: '0px 0px -30px 0px', threshold: 0.08 }
		);

		document.querySelectorAll('.fade-in').forEach(function (element) {
			observer.observe(element);
		});
	} else {
		document.querySelectorAll('.fade-in').forEach(function (element) {
			element.classList.add('visible');
		});
	}
})();
