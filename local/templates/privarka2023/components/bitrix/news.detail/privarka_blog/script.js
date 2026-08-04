(function () {
	'use strict';

	function slugify(text) {
		return text
			.toLowerCase()
			.replace(/[«»"'„]/g, '')
			.replace(/[^\w\u0400-\u04FF]+/g, '-')
			.replace(/^-+|-+$/g, '')
			.substring(0, 80);
	}

	function insertContactBanner() {
		var root = document.querySelector('.privarka-blog[data-contact-banner="1"]');
		var tpl = document.getElementById('privarka-blog-contact-banner-template');
		if (!root || !tpl || !tpl.content) {
			return;
		}

		var bodyEl = root.querySelector('.privarka-blog__body');
		if (!bodyEl) {
			return;
		}

		var headings = bodyEl.querySelectorAll('h3');
		if (headings.length < 3) {
			return;
		}

		var thirdH3 = headings[2];
		var prev = thirdH3.previousElementSibling;
		if (prev && prev.classList.contains('privarka-blog-contact-banner')) {
			return;
		}

		var node = tpl.content.firstElementChild
			? tpl.content.firstElementChild.cloneNode(true)
			: null;
		if (!node) {
			return;
		}

		thirdH3.insertAdjacentElement('beforebegin', node);
	}

	function placeTocOnMobile() {
		var root = document.querySelector('.privarka-blog');
		var aside = root && root.querySelector('.privarka-blog__aside');
		var hero = root && root.querySelector('.privarka-blog__article-hero');
		var expert = root && root.querySelector('.privarka-blog__expert');
		var body = root && root.querySelector('.privarka-blog__body');
		if (!aside || !hero) {
			return;
		}

		var mq = window.matchMedia('(max-width: 991px)');
		var asideOrigin = null;

		function apply() {
			if (mq.matches) {
				if (!asideOrigin) {
					asideOrigin = {
						parent: aside.parentNode,
						next: aside.nextSibling,
					};
				}

				var anchor = expert || body;
				if (anchor) {
					if (aside.compareDocumentPosition(anchor) & Node.DOCUMENT_POSITION_FOLLOWING) {
						return;
					}
					anchor.insertAdjacentElement('beforebegin', aside);
					return;
				}

				if (hero.nextElementSibling !== aside) {
					hero.insertAdjacentElement('afterend', aside);
				}
				return;
			}

			aside.style.position = '';
			aside.style.top = '';
			aside.style.bottom = '';
			aside.style.left = '';
			aside.style.right = '';

			if (asideOrigin && asideOrigin.parent) {
				asideOrigin.parent.insertBefore(aside, asideOrigin.next);
			}
		}

		apply();
		if (typeof mq.addEventListener === 'function') {
			mq.addEventListener('change', apply);
		} else if (typeof mq.addListener === 'function') {
			mq.addListener(apply);
		}
	}

	function buildToc() {
		var roots = document.querySelectorAll('.privarka-blog__body[id]');
		if (!roots.length) return;

		roots.forEach(function (bodyEl) {
			var tocList = document.getElementById('privarka-blog-toc');
			if (!tocList) return;

			var headings = bodyEl.querySelectorAll('h2');
			if (!headings.length) {
				var aside = document.querySelector('.privarka-blog__aside');
				if (aside) aside.style.display = 'none';
				return;
			}

			var used = {};
			headings.forEach(function (h, idx) {
				var txt = (h.textContent || '').trim();
				if (!txt) return;
				var base = slugify(txt) || 'section-' + (idx + 1);
				var id = base;
				var n = 2;
				while (used[id]) {
					id = base + '-' + n++;
				}
				used[id] = true;
				h.id = id;

				var li = document.createElement('li');
				var a = document.createElement('a');
				a.href = '#' + id;
				a.textContent = txt;
				li.appendChild(a);
				tocList.appendChild(li);
			});
		});
	}

	function initStagingTabs() {
		document.querySelectorAll('[data-privarka-staging]').forEach(function (root) {
			var btnWrap = root.querySelector('[data-staging-buttons]');
			var panels = root.querySelectorAll('[data-staging-panel]');
			if (btnWrap && panels.length) {
				btnWrap.addEventListener('click', function (e) {
					var btn = e.target.closest('[data-staging-tab]');
					if (!btn || !root.contains(btn)) return;
					var tab = btn.getAttribute('data-staging-tab');
					btnWrap.querySelectorAll('[data-staging-tab]').forEach(function (b) {
						b.classList.toggle('is-active', b === btn);
					});
					panels.forEach(function (p) {
						var match = p.getAttribute('data-staging-panel') === tab;
						p.style.display = match ? '' : 'none';
						p.hidden = !match;
					});
				});
				return;
			}

			panels = root.querySelectorAll('[data-staging-panel]');
			if (!panels.length) return;

			var nav = document.createElement('div');
			nav.className = 'privarka-blog-staging-nav';
			var firstId = null;
			panels.forEach(function (panel, i) {
				var title = panel.getAttribute('data-title') || ('Вариант ' + (i + 1));
				var pid = panel.getAttribute('data-staging-panel') || 'tab-' + (i + 1);
				if (!firstId) firstId = pid;
				var b = document.createElement('button');
				b.type = 'button';
				b.className = 'privarka-blog-staging-btn' + (i === 0 ? ' is-active' : '');
				b.setAttribute('data-staging-tab', pid);
				b.textContent = title;
				nav.appendChild(b);
			});
			root.insertBefore(nav, panels[0] || root.firstChild);

			function activate(pid) {
				nav.querySelectorAll('.privarka-blog-staging-btn').forEach(function (b) {
					b.classList.toggle('is-active', b.getAttribute('data-staging-tab') === pid);
				});
				panels.forEach(function (p) {
					var match = p.getAttribute('data-staging-panel') === pid;
					p.style.display = match ? '' : 'none';
					p.hidden = !match;
				});
			}

			nav.addEventListener('click', function (e) {
				var btn = e.target.closest('.privarka-blog-staging-btn');
				if (!btn) return;
				activate(btn.getAttribute('data-staging-tab'));
			});

			if (firstId) activate(firstId);
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			placeTocOnMobile();
			buildToc();
			insertContactBanner();
			initStagingTabs();
		});
	} else {
		placeTocOnMobile();
		buildToc();
		insertContactBanner();
		initStagingTabs();
	}
})();
