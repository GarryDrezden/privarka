(function () {
	'use strict';

	function initBlogRating(root) {
		if (!root || root.getAttribute('data-rating-inited') === '1') {
			return;
		}
		root.setAttribute('data-rating-inited', '1');

		var articleId = parseInt(root.getAttribute('data-article-id') || '0', 10);
		var ajaxUrl = root.getAttribute('data-ajax-url') || '/local/ajax/blog_rating.php';
		var statsUrl =
			root.getAttribute('data-stats-url') ||
			'/local/ajax/blog_rating_stats.php';
		var sessid = root.getAttribute('data-sessid') || '';
		var starsWrap = root.querySelector('.privarka-blog-rating__stars');
		var stars = root.querySelectorAll('.privarka-blog-rating__star');
		var msgEl = root.querySelector('.privarka-blog-rating__msg');
		var voted = root.getAttribute('data-user-voted') === '1';
		var busy = false;

		function getSessid() {
			if (typeof BX !== 'undefined' && typeof BX.bitrix_sessid === 'function') {
				return BX.bitrix_sessid();
			}
			return sessid;
		}

		function setMessage(text) {
			if (msgEl) {
				msgEl.textContent = text || '';
			}
		}

		function setStarsSelected(vote) {
			var v = parseInt(String(vote), 10);
			if (v < 1 || v > 5) {
				return;
			}
			stars.forEach(function (star) {
				var sv = parseInt(star.getAttribute('data-vote') || '0', 10);
				star.classList.toggle('is-selected', sv <= v);
			});
		}

		function lockStars() {
			voted = true;
			root.setAttribute('data-user-voted', '1');
			root.classList.add('is-voted');
			stars.forEach(function (star) {
				star.disabled = true;
				star.classList.remove('is-hover');
			});
			if (starsWrap) {
				starsWrap.setAttribute('aria-disabled', 'true');
			}
		}

		function applyVotedState(userVote) {
			setStarsSelected(userVote);
			lockStars();
		}

		function getRatingSection() {
			return root.closest('.privarka-blog__rating-block');
		}

		function ensureSummary() {
			var section = getRatingSection();
			var summary = section
				? section.querySelector('.privarka-blog-rating__summary')
				: document.getElementById('privarka-blog-rating-summary-' + articleId);

			if (!summary && section) {
				summary = document.createElement('p');
				summary.className = 'privarka-blog-rating__summary';
				summary.id = 'privarka-blog-rating-summary-' + articleId;
				var label = root.getAttribute('data-label-rating') || 'Оценка';
				var votesWord = root.getAttribute('data-label-votes') || 'оценок';
				summary.innerHTML =
					label +
					': <strong class="privarka-blog-rating__summary-val">0,0</strong> ' +
					'(<span class="privarka-blog-rating__summary-count">0</span> ' +
					votesWord +
					')';
				var heading = section.querySelector('.privarka-blog__h3');
				if (heading) {
					heading.insertAdjacentElement('afterend', summary);
				} else {
					section.insertBefore(summary, root);
				}
			}

			return summary;
		}

		function updateDisplay(avgFmt, count) {
			var summary = ensureSummary();
			if (summary) {
				summary.hidden = false;
				summary.style.display = '';
				var valEl = summary.querySelector('.privarka-blog-rating__summary-val');
				var cntEl = summary.querySelector('.privarka-blog-rating__summary-count');
				if (valEl) {
					valEl.textContent = avgFmt || '0,0';
				}
				if (cntEl) {
					cntEl.textContent = String(count);
				}
			}

			var heroBadge = document.querySelector('.privarka-blog .article-hero__rating-badge');
			if (heroBadge) {
				heroBadge.hidden = false;
				heroBadge.style.display = '';
				var heroVal = heroBadge.querySelector('[data-hero-rating-value]');
				if (heroVal) {
					heroVal.textContent = avgFmt || '0,0';
				}
			}
		}

		function handleResponse(data, submittedVote) {
			var userVote = parseInt(
				(data && data.userVote) || submittedVote || root.getAttribute('data-user-vote') || '0',
				10
			);

			if (data && data.ok) {
				if (userVote > 0) {
					root.setAttribute('data-user-vote', String(userVote));
					applyVotedState(userVote);
				}
				updateDisplay(data.averageFormatted, data.count);
				setMessage(root.getAttribute('data-msg-thanks') || '');
				return;
			}
			if (data && data.error === 'already_voted') {
				if (userVote > 0) {
					root.setAttribute('data-user-vote', String(userVote));
					applyVotedState(userVote);
				}
				if (data.averageFormatted) {
					updateDisplay(data.averageFormatted, data.count);
				}
				setMessage(root.getAttribute('data-msg-voted') || '');
				return;
			}
			if (data && data.error === 'hl') {
				setMessage(root.getAttribute('data-msg-hl') || root.getAttribute('data-msg-error') || '');
				return;
			}
			if (data && data.error === 'sessid') {
				setMessage(root.getAttribute('data-msg-sessid') || root.getAttribute('data-msg-error') || '');
				return;
			}
			setMessage(root.getAttribute('data-msg-error') || '');
		}

		function sendVote(vote) {
			if (busy || voted) {
				if (voted) {
					setMessage(root.getAttribute('data-msg-voted') || '');
				}
				return;
			}
			if (!articleId || vote < 1 || vote > 5) {
				return;
			}

			busy = true;
			setMessage('');

			var payload = {
				articleId: articleId,
				vote: vote,
				sessid: getSessid(),
			};

			if (typeof BX !== 'undefined' && BX.ajax) {
				BX.ajax({
					url: ajaxUrl,
					method: 'POST',
					dataType: 'json',
					data: payload,
					onsuccess: function (data) {
						busy = false;
						handleResponse(data, vote);
					},
					onfailure: function () {
						busy = false;
						setMessage(root.getAttribute('data-msg-error') || '');
					},
				});
				return;
			}

			var body = new FormData();
			Object.keys(payload).forEach(function (key) {
				body.append(key, String(payload[key]));
			});

			fetch(ajaxUrl, {
				method: 'POST',
				body: body,
				credentials: 'same-origin',
				headers: {
					'X-Requested-With': 'XMLHttpRequest',
				},
			})
				.then(function (r) {
					return r.text().then(function (text) {
						var data = null;
						try {
							data = text ? JSON.parse(text) : null;
						} catch (e) {
							data = null;
						}
						return { data: data };
					});
				})
				.then(function (res) {
					busy = false;
					if (res.data) {
						handleResponse(res.data, vote);
						return;
					}
					setMessage(root.getAttribute('data-msg-error') || '');
				})
				.catch(function () {
					busy = false;
					setMessage(root.getAttribute('data-msg-error') || '');
				});
		}

		stars.forEach(function (star) {
			star.addEventListener('click', function (e) {
				e.preventDefault();
				if (voted || star.disabled) {
					return;
				}
				var vote = parseInt(star.getAttribute('data-vote') || '0', 10);
				sendVote(vote);
			});

			star.addEventListener('mouseenter', function () {
				if (voted) {
					return;
				}
				var v = parseInt(star.getAttribute('data-vote') || '0', 10);
				stars.forEach(function (s) {
					var sv = parseInt(s.getAttribute('data-vote') || '0', 10);
					s.classList.toggle('is-hover', sv <= v);
				});
			});
		});

		root.addEventListener('mouseleave', function () {
			if (voted) {
				return;
			}
			stars.forEach(function (s) {
				s.classList.remove('is-hover');
			});
		});

		function loadStatsFromServer() {
			if (!articleId) {
				return;
			}
			var url = statsUrl + (statsUrl.indexOf('?') >= 0 ? '&' : '?') + 'articleId=' + encodeURIComponent(String(articleId));

			var applyData = function (data) {
				if (!data || !data.ok) {
					return;
				}
				updateDisplay(data.averageFormatted, data.count);
				if (data.userVoted && data.userVote > 0) {
					root.setAttribute('data-user-vote', String(data.userVote));
					applyVotedState(data.userVote);
				}
			};

			if (typeof BX !== 'undefined' && BX.ajax) {
				BX.ajax({
					url: url,
					method: 'GET',
					dataType: 'json',
					onsuccess: applyData,
				});
				return;
			}

			fetch(url, { credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
				.then(function (r) {
					return r.json();
				})
				.then(applyData)
				.catch(function () {});
		}

		loadStatsFromServer();

		var initialVote = parseInt(root.getAttribute('data-user-vote') || '0', 10);
		if (voted && initialVote > 0) {
			applyVotedState(initialVote);
		}
	}

	function bootRating() {
		document.querySelectorAll('[data-privarka-blog-rating]').forEach(initBlogRating);
	}

	if (typeof BX !== 'undefined') {
		BX.ready(bootRating);
	} else if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', bootRating);
	} else {
		bootRating();
	}
})();
