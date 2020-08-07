document.querySelector(".map__preloader").addEventListener("mouseenter", () => {
  var mapDiv = document.querySelector(".map");

  if (mapDiv.innerHTML.indexOf("img") != -1) {
    mapDiv.innerHTML =
      '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7183.409252898974!2d55.955761928027606!3d25.813316985714053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef671154cd793ab%3A0x313e4b1da6bdee83!2sHilton%20Ras%20Al%20Khaimah%20Resort%20%26%20Spa!5e0!3m2!1sru!2sru!4v1595489247708!5m2!1sru!2sru" width="100%" height="213" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
  }
});
