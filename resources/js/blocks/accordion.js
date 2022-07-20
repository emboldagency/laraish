document.querySelectorAll('.accordion-title').forEach(el => {
  el.addEventListener('click', (e) => {
    const accordion = e.currentTarget;
    const accordionWrapper = accordion.parentElement;
    const content = accordion.parentElement.querySelector('.accordion-content-wrapper');
    const height = content.querySelector('.accordion-content').offsetHeight;

    if (accordionWrapper.classList.contains('content-hidden')) {
      accordionWrapper.classList.remove('content-hidden');
      content.style.height = `${height}px`;
      return;
    }

    accordionWrapper.classList.add('content-hidden');
    content.style.height = `0px`;
  });
});