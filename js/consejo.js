
  const sliderItems = document.querySelectorAll('.slider-item');
  let currentIndex = 0;

  function showSlide(index) {
    sliderItems.forEach(item => {
      item.style.display = 'none';
    });
    sliderItems[index].style.display = 'block';
  }

  function nextSlide() {
    currentIndex++;
    if (currentIndex >= sliderItems.length) {
      currentIndex = 0;
    }
    showSlide(currentIndex);
  }

  setInterval(nextSlide, 8000);
  showSlide(currentIndex);
