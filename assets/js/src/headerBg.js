/* eslint-disable no-undef */
/* eslint-disable computed-property-spacing */
/* eslint-disable space-in-parens */
/* eslint-disable no-unused-expressions */
const bgimage = document.getElementById('header-bgimg').getAttribute('data-background');
// eslint-disable-next-line space-before-function-paren
// eslint-disable-next-line space-before-function-paren
document.getElementById('header-bgimg').style.backgroundImage = 'url(' + bgimage + ')';

gsap.from('div', { opactiy: 0, duration: 1, y: -50 });
