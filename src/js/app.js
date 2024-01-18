document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
    darkMode();
});

function darkMode() {
  const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
  prefiereDarkMode.addEventListener('change', () => {
    if(prefiereDarkMode.matches) {
      document.body.classList.add('dark-mode');
    }else{
      document.body.classList.remove('dark-mode');
    }
  });
  
  if(prefiereDarkMode.matches) {
    document.body.classList.add('dark-mode');
  }else{
    document.body.classList.remove('dark-mode');
  }
  const botonDarkMode = document.querySelector('.dark-mode-boton');
  botonDarkMode.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      botonDarkMode.classList.toggle('active');
  });
}

function eventListeners() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
  const navegacion = document.querySelector('.navegacion');
  navegacion.classList.toggle('mostrar');
}