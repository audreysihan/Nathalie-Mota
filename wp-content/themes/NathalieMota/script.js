const modaleContent = document.querySelector('.modale-content');
const btnContact = document.querySelector('#menu-item-28');
const btnModale = document.querySelector('.btnModal');
const modaleBox = document.querySelector('.modale-box');
const postCta = document.getElementById('js-post-cta');
// const refPhoto = document.getElementById('ref-photo');
// const formRefPhoto = document.getElementById('form-ref-photo');
const formRefPhoto = document.getElementById('form-ref-photo');
const btnContactMobile = document.getElementsByClassName('contactMobile');
const btnclose = document.querySelector('.close');
// Fait apparaitre la modale au clic
// btnContact.addEventListener('click', openModale);
// btnModale.addEventListener('click', openModale);

if (btnContact) {
    btnContact.addEventListener('click', openModale);
  }
  
function openModale(e) {
e.preventDefault();
modaleContent.style.display = "block";
}

if (btnclose) {
  btnclose.addEventListener('click', closeModale);
}

function closeModale(e) {
  e.preventDefault();
  modaleContent.style.display = "none";
  }