import { trapFocus } from './utils/trapFocus';

// call trapFocus in a function so we can removeEventListener later
function initTrapFocus(e) {
  return trapFocus(e, `search-form-wrapper`);
}

async function showSearchForm() {
  document.querySelector('#search-form-wrapper').classList.add('active');
  document.body.classList.add('search-form-open');

  await new Promise(resolve => setTimeout(resolve, 5));
  document.querySelector('#search-form-wrapper').classList.add('fadein');

  await new Promise(resolve => setTimeout(resolve, 5));
  document.querySelector('.search-suggestions').classList.add('fadein');

  document.addEventListener(`keydown`, initTrapFocus);
  document.querySelector('html').classList.add('modal-open');

  document.addEventListener(`keydown`, closeModalWithEsc);
}

async function closeSearchForm() {
  document.querySelector('#search-form-wrapper').classList.remove('fadein');

  await new Promise(resolve => setTimeout(resolve, 5));
  document.querySelector('.search-suggestions').classList.remove('fadein');

  await new Promise(resolve => setTimeout(resolve, 250));
  document.querySelector('#search-form-wrapper').classList.remove('active');
  document.querySelector('html').classList.remove('modal-open');
  document.body.classList.remove('search-form-open');
  document.removeEventListener(`keydown`, closeModalWithEsc);
}

document.querySelector('#search-form-wrapper input').addEventListener('focusin', async e => {
  await showSearchForm();
});

document.querySelector('#search-form-wrapper').addEventListener('click', async e => {
  if (e.target.id === 'search-form-wrapper') {
    await closeSearchForm();
  }
});

document.querySelector('#closeSearch').addEventListener('click', e => {
  closeSearchForm();
})

function closeModalWithEsc(e) {
  if (e.key === `Escape` && document.getElementById(`search-form-wrapper`).contains(document.activeElement)) {
    e.preventDefault();
    closeSearchForm();
    document.querySelector('#search-form-wrapper input').blur();
  }
}