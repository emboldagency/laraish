import { trapFocus } from './utils/trapFocus';

// call trapFocus in a function so we can removeEventListener later
function initTrapFocus(e) {
  return trapFocus(e, `mobile-nav-wrapper`);
}

async function showMobileNav() {
  document.querySelector('.em-burger').classList.add('active');
  document.querySelector('#mobile-nav').classList.add('active');

  await new Promise(resolve => setTimeout(resolve, 5));
  document.querySelector('#mobile-nav').classList.add('fadein');

  await new Promise(resolve => setTimeout(resolve, 10));
  document.querySelector('#mobile-nav-wrapper').classList.add('visible');

  document.addEventListener(`keydown`, initTrapFocus);
  document.querySelector('html').classList.add('mobile-nav-open');

  document.querySelector(`#mobile-nav-wrapper`).focus();
}

async function closeMobileNav() {
  document.querySelector('#mobile-nav-wrapper').classList.remove('visible');
  await new Promise(resolve => setTimeout(resolve, 250));

  document.querySelector('#mobile-nav').classList.remove('fadein');
  await new Promise(resolve => setTimeout(resolve, 5));

  document.querySelector('.em-burger').classList.remove('active');
  document.querySelector('#mobile-nav').classList.remove('active');

  document.removeEventListener(`keydown`, initTrapFocus);
  document.querySelector('html').classList.remove('mobile-nav-open');
}

document.querySelector('#mobile-nav').addEventListener('click', async e => {
  if (e.target.id === 'mobile-nav') {
    await closeMobileNav();
  }
});

async function toggleMobileNav() {
  if (!document.querySelector('.em-burger').classList.contains('active')) {
    return await showMobileNav();
  }

  await closeMobileNav();
}

document.body.addEventListener('click', async e => {
  if (e.target.closest('.toggleMobileNav')) {
    await toggleMobileNav();
  }
});