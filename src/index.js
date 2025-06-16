require("bootstrap");
import Swiper from "swiper"
import { Navigation } from 'swiper/modules'
(function () {
  // SWiper slider
  var swiper = new Swiper(".swiper-container", {
    modules: [Navigation],
    speed: 400,
    autoplay: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  //Sticky menu
  window.addEventListener('scroll', (event) => {
    var btnscroll = document.querySelector('#top-header');
    var scrollValue = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollValue > 0) {
      btnscroll.classList.add("sticky");
    } else {
      btnscroll.classList.remove("sticky");
    }
  });


  document.addEventListener("DOMContentLoaded", function () {
    const projektSelect = document.getElementById('projektSelect');
    const wojewodztwoSelect = document.getElementById('wojewodztwoSelect');
    const daneList = document.querySelector('.dane');
    const wybraneWojewodztwo = document.getElementById('wybraneWojewodztwo');
    const brakWynikow = document.getElementById('brakWynikow');

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
  });

})();