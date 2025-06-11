require("bootstrap");
(function () {
  // Add data-toggle to link menu
  // var menuItem = document.querySelector('#menu-item-194 a');
  // if (menuItem) {
  //   menuItem.setAttribute('data-bs-toggle', 'modal');
  //   menuItem.setAttribute('data-bs-target', '#offerformModal');
  //   menuItem.setAttribute('data-category', 'form-basic');
  // }

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