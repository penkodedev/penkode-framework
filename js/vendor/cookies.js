window.addEventListener("load", function() {
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#000000",
        "text": "#fff"
      },
      "button": {
        "background": "#fff",
        "text": "#000"
      }
    },
    "content": {
      "message": "Utilizamos cookies propias y de terceros para mejorar nuestros servicios. Si continúa navegando, consideramos que acepta su uso.",
      "dismiss": "Acepto",
      "link": "Ver más",
      "href": "#" // Cambia a tu URL de privacidad
    }
  });
}); 