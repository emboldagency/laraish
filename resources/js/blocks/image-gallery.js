import Masonry from 'masonry-layout';
import '../lightbox';

const elem = document.querySelector('.masonry');

new Masonry(elem, { itemSelector: '.masonry-item' });