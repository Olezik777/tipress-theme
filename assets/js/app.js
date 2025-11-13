// import setCurrentMenuItemClass from 'current-menu-item';

domReady(function () {
	setCurrentMenuItemClass();
	searchActive();
	microModalHandler()

	const menu = document.querySelector('.site-header');
	const menuToggle = document.querySelector('.menu-toggle');
	const primaryMenu = document.getElementById('primary-menu');

	if ( menuToggle && primaryMenu ) {
		menuToggle.addEventListener('click', function () {
			const expanded = this.getAttribute('aria-expanded') === 'true';
			this.setAttribute('aria-expanded', String(! expanded));
			primaryMenu.classList.toggle('is-open');
		});
	}

	if ( !!menu ) {

		window.addEventListener('scroll', function () {
			const scrollPosition = window.scrollY || document.documentElement.scrollTop;

			if (scrollPosition >= menu.offsetHeight) {
				menu.classList.add('sticky-header');
			} else {
				menu.classList.remove('sticky-header');
			}
		});

		const headerHeight = document.querySelector('.site-header').offsetHeight;
	}

	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			e.preventDefault();
			const headerHeight		= document.querySelector('.site-header').offsetHeight;
			const targetElement		= document.querySelector(this.getAttribute('href'));
			const targetPosition	= targetElement.getBoundingClientRect().top;
			// const startPosition		= window.pageYOffset;
			const startPosition = window.scrollY || window.pageYOffSet;
			const distance				= targetPosition - headerHeight; // Враховуємо висоту хедеру

			window.scrollBy({
				top: distance,
				behavior: 'smooth'
			});
		});
	});

	// Ініціалізуємо компонент, передаючи CSS клас як параметр
	const numberCounter = new NumberCounter("counter"); // Замініть "num" на бажаний клас
	numberCounter.init();

	jQuery(document).ready(function ($) {
		
		$('.woocommerce-shop .wdgk_donation_content .wdgk_add_donation').removeAttr('data-product-url');
		
		//Block Timer summer
		function updateCountdown() {
			// Дата целевого времени
			var targetDate = new Date('December 1, 2025 00:00:00').getTime();
			// Текущее время
			var now = new Date().getTime();
			// Разница во времени
			var timeRemaining = targetDate - now;

			// Рассчитываем дни, часы, минуты и секунды
			var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
			var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

			// Обновляем значения на странице
			$('#days').text(days);
			$('#hours').text(hours);
			$('#minutes').text(minutes);
			$('#seconds').text(seconds);

			// Если время истекло, остановим таймер
			if (timeRemaining < 0) {
				clearInterval(countdownInterval);
				$('#countdown').text("Время истекло");
			}
		}

		// Обновляем таймер каждую минуту (каждые 60 секунд)
		var countdownInterval = setInterval(updateCountdown, 1000);

		// Вызываем сразу же для инициализации значений
		updateCountdown();
		//End Block Timer summer
		
		$('.post-carousel ul').each(function () {
			var slidesToShow = $(this).closest('.post-carousel').data('slides-to-show') || 3;
			$(this).slick({
				slidesToShow: slidesToShow,
				slidesToScroll: slidesToShow,
				autoplay: false,
				dots: true,
				prevArrow: "<button type=\"button\" role=\"presentation\" class=\"slick-prev slick-arrow\"><span aria-label=\"Previous\">‹</span></button>",
				nextArrow: "<button type=\"button\" role=\"presentation\" class=\"slick-next slick-arrow\"><span aria-label=\"Next\">›</span></button>",
				autoplaySpeed: 2000,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						}
					}
				]
				// centerMode: true,
				// centerPadding: '20px'
			});
		});
	});

	jQuery(document).ready(function ($) {
		
		if ($('html').attr('lang') === 'he-IL') {
    
		// Проходим по всем кнопкам с классом .wp-block-button__link
		$('.wp-block-button__link').each(function() {

		  // Проверяем, есть ли у кнопки атрибут href
		  if (typeof $(this).attr('href') === 'undefined') {

			// Добавляем событие клика на кнопку
			$(this).on('click', function() {
			  // Имитируем клик на элементе с классом .open-popup
			  $('.open-popup').trigger('click');
			});
		  }
		});
	  }
		// home docs slider
		var isRTL = $('html').attr('dir') === 'rtl';
		$('.slider-246').slick({
			rtl: isRTL, 
			slidesToShow: 6, // Кількість слайдів на мобільних пристроях
			slidesToScroll: 1,
			arrows: true, // Показувати стрілки
			prevArrow: "<button type=\"button\" role=\"presentation\" class=\"slick-prev slick-arrow\"><span aria-label=\"Previous\">‹</span></button>",
			nextArrow: "<button type=\"button\" role=\"presentation\" class=\"slick-next slick-arrow\"><span aria-label=\"Next\">›</span></button>",

			// prevArrow: '‹', // Знак для стрілки вліво
			// nextArrow: '›', // Знак для стрілки вправо
			responsive: [
				{
					breakpoint: 620, // Планшет
					settings: {
						slidesToShow: 2, // Кількість слайдів на планшеті
					}
				},
				{
					breakpoint: 1024, // Десктоп
					settings: {
						slidesToShow: 4, // Кількість слайдів на десктопі
					}
				}
			]
		});
	});

});


function domReady(callback) {
	if (typeof document === 'undefined') {
		return;
	}

	if (
		document.readyState === 'complete' || // DOMContentLoaded + Images/Styles/etc loaded, so we call directly.
		document.readyState === 'interactive' // DOMContentLoaded fires at this point, so we call directly.
	) {
		return void callback();
	}

	// DOMContentLoaded has not fired yet, delay callback until then.
	document.addEventListener('DOMContentLoaded', callback);


}


function setCurrentMenuItemClass() {
	const menuItems = document.querySelectorAll('.wp-block-navigation-item, .menu-item');

	if (!menuItems.length) {
		return;
	}

	// Check for .current-menu-item class on any item and stop if found.
	for (let i = 0; i < menuItems.length; i++) {
		if (menuItems[i].classList.contains('current-menu-item')) {
			return;
		}
	}

	// Add trailing slash to path if missing.
	const url = window.location.href.endsWith('/')
		? window.location.href
		: `${window.location.href}/`;

	// Check for matching URL path on any child link of menuItems.
	for (let i = 0; i < menuItems.length; i++) {
		const link = menuItems[i].querySelector('a');
		const linkURL = link.href.endsWith('/')
			? link.href
			: `${link.href}/`;

		// Note: link.href returns full URL, even if it's a relative link.
		if (linkURL === url) {
			menuItems[i].classList.add('current-menu-item');
		}
	}
}

function searchActive() {
	const searchInput = document.querySelector('.site-header .wp-block-search__input');

	if (null === searchInput) {
		return;
	}

	searchInput.addEventListener('click', (e) => {
		const formElement = searchInput.closest('form');
		const target = e.target;
		console.log(formElement );
		// target.classList.toggle('active')
		formElement.classList.toggle('active')
	}, true);

	searchInput.addEventListener('blur', (e) => {
		const formElement = searchInput.closest('form');
		const target = e.target;
		setTimeout(() => {
			// target.classList.toggle('active')
			formElement.classList.toggle('active')
		}, 2000, target );
		// target.style.opacity = 0;
	}, true);

}

function microModalHandler() {
	const openModals = document.querySelectorAll('.open-popup a.wp-element-button, .open-popup');

	openModals.forEach(function (openModal) {
			openModal.classList.add('bodmodal-open');
			if (openModal.classList.contains('btn-big')) {
				console.log(openModal.classList);

				openModal.removeAttribute('href');
			}

	});
}

function microModalHandler2() {
	const openModals = document.querySelectorAll('.open-popup a.wp-element-button, .open-popup');

	for( let openModal of openModals ) {
		openModal.classList.add('bodmodal-open')

		if( openModal.classList.contains('btn-big')) {
			openModal.href = '';
		}
	}

}

document.addEventListener( 'click', function(ev) {

	if ( ev.target.matches('#calls-menu-toggle') ) {
		document.getElementById('calls-menu-mob').classList.toggle('active')
	}

	if (ev.target.matches('#calls-menu-close') ) {
		document.getElementById('calls-menu-mob').classList.toggle('active')
	}

	// if (ev.target.matches('.bp-cap') ) {
	// 	alert('caption event');
	// }

});

// Клас для анімації чисел
class NumberCounter {
	constructor(className) {
		this.className = className;
		this.animationDone = false; // Прапорець для відстеження завершення анімації
		this.elements = document.querySelectorAll(`.${className}`);
	}

	// Функція для анімації лічильника
	animateNumber(element, duration) {
		const target = parseInt(element.innerText);
		const increment = Math.ceil(target / (duration / 16)); // Оновлення кожні 16 мс (приблизно 60 FPS)
		let current = 0;

		const updateElement = () => {
			current += increment;
			if (current <= target) {
				element.innerText = current;
				requestAnimationFrame(updateElement);
			} else {
				element.innerText = target;
				this.animationDone = true;
			}
		};

		updateElement();
	}

	// Метод для перевірки, чи елемент видимий у viewport
	isElementInViewport(element) {
		const rect = element.getBoundingClientRect();
		return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
			rect.right <= (window.innerWidth || document.documentElement.clientWidth)
		);
	}

	// Метод для анімації чисел за допомогою класу
	animateNumbersIfVisible() {
		this.elements.forEach((element) => {
			if (this.isElementInViewport(element) && !this.animationDone) {
				const duration = 2000; // Тривалість анімації у мілісекундах (наприклад, 2000 мс = 2 секунди)
				this.animateNumber(element, duration);
			}
		});
	}

	// Метод для ініціалізації компонента та встановлення прослуховувача події прокрутки
	init() {
		window.addEventListener("scroll", () => {
			this.animateNumbersIfVisible();
		});
	}
}


document.addEventListener('DOMContentLoaded', function () {
	; (function () {
		var holder = document.getElementById('video-holder');

		function setClickHandler(id, fn) {
			document.getElementById(id).onclick = fn
		}

		function setClickHandlerByClass(className, fn) {
			var elements = document.getElementsByClassName(className);

			for (var i = 0; i < elements.length; i++) {
				elements[i].onclick = fn;
			}
		}

		function closeVHolder() {
			holder.classList.add('hidden')
		}

		function openDesktopPopup() {

			var id = '#desktop-popup';
			// Change popup on mobile
			// if (isMobile()) {
			// 	console.log(isMobile());
			// 	id = '#instead-of-cure-request';
			// }
			jQuery('#lb_button-call').hide();

			jQuery.fancybox2({
				'href': id,
				'width': 760,
				'autoSize': false,
				'height': 'auto',
				'wrapCSS': 'wpc-instead-of-cure-request',
				'zoomSpeedIn': 300,
				'zoomSpeedOut': 300,
				helpers: {
					overlay: {
						locked: false
					}
				},
				// 'afterClose': function () {
				// 	jQuery('#lb_button-call').show();
				// }
			});

		}

		setClickHandlerByClass('video-baner-image', function (e) {
			e.preventDefault();
			var big_pop = BigPicture({
				el: e.target,
				ytSrc: e.target.getAttribute('ytSrc'),
			});
		});

		setClickHandlerByClass('hv-close', function (e) {
			e.preventDefault();
			closeVHolder();
		});

	})();
});

document.addEventListener("DOMContentLoaded", function () {
	var headerElement = document.querySelector('header');

	if (!headerElement.classList.contains('site-header')) {
		headerElement.classList.add('site-header');
	}
});

jQuery(document).ready(function ($) {

	var modalCookie = 'tipressModalOnce';
	var loadOnce = checkForCookie(modalCookie);
	const d = new Date();
	d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000) );
	var expires = "expires=" + d.toUTCString();


	function checkForCookie(cookieName) {
		let name = cookieName + "=";
		let decodedCookie = decodeURIComponent(document.cookie);
		let ca = decodedCookie.split(';');
		for (let i = 0; i < ca.length; i++) {
			let c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

	if ( ! loadOnce ) {
		setTimeout(function () {
			var $modal = jQuery('.bodmodal-open');
			// console.log( $modal )
			if ($modal.length > 0) {
				$modal.trigger('click');
			}
		}, 60000);

		document.cookie = modalCookie + "=1;" + expires + ";path=/";

	}

});

document.addEventListener('DOMContentLoaded', function () {
    // Проверяем, что язык страницы русский
    if (document.documentElement.lang === "ru-RU") {
        // Enable copy and replace selected text
        document.body.addEventListener('copy', function (e) {
            e.preventDefault();

            // Получение выделенного текста
            const selectedText = window.getSelection().toString();

            // Текст для замены
            const replacedText = "Материалы сайта защищены авторским правом. Любое копирование запрещено и преследуется по закону! Запрещается копирование или свободное изложение текста, размещенного на сайте, используя замену слов, но без изменения смыслового содержания. \n\n" +
                selectedText + "\n\n" +
                "Сайт клиники Топ Ихилов. Все материалы сайта, включая фотоматериалы и дизайн, защищены российским и международным законодательством об авторских и смежных правах https://www.topichilov.com/.";

            // Создание объекта для копирования
            const clipboardData = e.clipboardData || window.clipboardData;

            // Добавление заменного текста в объект для копирования
            if (clipboardData) {
                clipboardData.setData('text/plain', replacedText);
                clipboardData.setData('text/html', `<p>${replacedText}</p>`);
            }
        });
    } else if (document.documentElement.lang === "he-IL") {
        // Enable copy and replace selected text
        document.body.addEventListener('copy', function (e) {
            e.preventDefault();

            // Получение выделенного текста
            const selectedText = window.getSelection().toString();

            // Текст для замены
            const replacedText = "\n\n" + selectedText + "\n\n" +
"כל החומרים באתר, כולל חומרי צילום ועיצוב, מוגנים על ידי חוק זכויות יוצרים. חל איסור להעתיק את הטקסטים, תמונות, סרטוני וידאו המפורסמים באתר ללא אישור מפורש בכתב מבעלי האתר דף הבית .";
            // Создание объекта для копирования
            const clipboardData = e.clipboardData || window.clipboardData;

            // Добавление заменного текста в объект для копирования
            if (clipboardData) {
                clipboardData.setData('text/plain', replacedText);
                clipboardData.setData('text/html', `<p>${replacedText}</p>`);
            }
        });
    }
});


// Функція для отримання мови сторінки
function getPageLanguage() {
	// Перевіряємо поточну мову сторінки, можливо, вам знадобиться реалізувати цю функцію відповідно до вашої інфраструктури
	// Наприклад, якщо ви використовуєте WordPress, ви можете використовувати `document.documentElement.lang`
	// Якщо ви використовуєте інший метод для визначення мови, змініть цю функцію відповідно
	return document.documentElement.lang;
}

// Функція для зміни тексту кнопки та заголовка таблиці
function changeText() {
	var language = getPageLanguage();

	if (language !== 'en-GB' && language!== 'he-IL') {
	// if (language !== 'en-GB' || language!== 'he-IL') {
		return; // Виходимо з функції, якщо мова не англійська
	}

	var button = document.querySelector('.wdgk_add_donation');

	if (button) {
		if ( language === 'en-GB' ) {
			button.textContent = 'Payment amount confirmation';
		} else {
			button.textContent = 'אישור הסכום';
		}
	}

}

// Викликаємо функцію для зміни тексту кнопки та заголовка таблиці при завантаженні сторінки
document.addEventListener('DOMContentLoaded', changeText);


document.addEventListener('DOMContentLoaded', function () {
    // Проверяем, что язык страницы установлен на иврит (lang="he-IL")
    if (document.documentElement.lang === 'he-IL') {
        // Находим все input с placeholder, начинающимся с "+7"
        const inputs = document.querySelectorAll('input[placeholder^="+7"]');
        
        // Меняем placeholder на "+9"
        inputs.forEach(input => {
            input.setAttribute('placeholder', input.getAttribute('placeholder').replace("+7", "ХХ"));
        });
    }
});