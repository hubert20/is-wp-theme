require("bootstrap");
import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

(function () {
  // Swipers on main page
  const swiperElements = document.querySelectorAll(".js-swiper");
  swiperElements.forEach((element) => {
    const type = element.dataset.swiperType || "default";
    const isStory = type === "story";
    const isBenefits = type === "benefits";

    const config = {
      modules: [Navigation, Pagination, Autoplay],
      speed: 450,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: element.querySelector(".swiper-pagination"),
        clickable: true,
      },
      slidesPerView: 1,
      spaceBetween: 20,
    };

    if (isStory || isBenefits) {
      config.autoplay = false;
    }

    if (isStory || isBenefits) {
      config.navigation = {
        nextEl: element.querySelector(".swiper-button-next"),
        prevEl: element.querySelector(".swiper-button-prev"),
      };
    }

    new Swiper(element, config);
  });

  // Sticky menu
  window.addEventListener('scroll', () => {
    var btnscroll = document.querySelector('#top-header');
    var scrollValue = window.pageYOffset || document.documentElement.scrollTop;
    if (btnscroll) {  // dodajemy sprawdzenie istnienia
      if (scrollValue > 0) {
        btnscroll.classList.add("sticky");
      } else {
        btnscroll.classList.remove("sticky");
      }
    }
  });

  document.addEventListener("DOMContentLoaded", function () {
    const projektSelect = document.getElementById('projektSelect');
    const wojewodztwoSelect = document.getElementById('wojewodztwoSelect');
    const daneList = document.querySelector('.dane');
    const wybraneWojewodztwo = document.getElementById('wybraneWojewodztwo');
    const brakWynikow = document.getElementById('brakWynikow');

    // Sprawdź, czy mechanizm istnieje na stronie
    if (projektSelect && wojewodztwoSelect && daneList && wybraneWojewodztwo && brakWynikow) {
      projektSelect.addEventListener('change', filterData);
      wojewodztwoSelect.addEventListener('change', filterData);

      function filterData() {
        const selectedProjekt = projektSelect.value;
        const selectedWojewodztwo = wojewodztwoSelect.value;

        wybraneWojewodztwo.textContent = wojewodztwoSelect.options[wojewodztwoSelect.selectedIndex].text;

        let wyniki = false;
        let delay = 0;

        for (const dane of daneList.children) {
          const projekt = dane.getAttribute('data-projekt');
          const wojewodztwo = dane.getAttribute('data-wojewodztwo');

          const projektMatch = selectedProjekt === 'wszystkie' || projekt === selectedProjekt;
          const wojewodztwoMatch = selectedWojewodztwo === 'wszystkie' || wojewodztwo === selectedWojewodztwo;

          dane.classList.remove('visible');
          dane.style.animationDelay = '0ms';

          if (projektMatch && wojewodztwoMatch) {
            dane.style.animationDelay = `${delay}ms`;
            dane.classList.add('visible');
            delay += 100;
            wyniki = true;
          }
        }

        brakWynikow.style.display = wyniki ? 'none' : 'block';
      }

      filterData();
    }
  });

  //Scrolltop after clicked btn form
  document.addEventListener('wpcf7mailsent', function (event) {
    const labelsucces = document.querySelector('.wpcf7-response-output');
    if (labelsucces) {
      const topPos = parseInt(labelsucces.offsetTop, 10);
      window.scrollTo({ top: topPos, behavior: 'smooth' });
    }
  }, false);

})();
