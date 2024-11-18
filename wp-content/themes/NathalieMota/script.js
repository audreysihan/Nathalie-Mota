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

  const bouton = document.querySelector('.bouton-contact')

if (bouton) {
  bouton.addEventListener('click', openModale);
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

  jQuery(document).ready(function ($) {
    let page = 1; // Page actuelle
    const loadMoreButton = $("#load-more-posts");

    loadMoreButton.on("click", function () {
        const button = $(this);
        button.text("Chargement...");

        $.ajax({
            url: "wp-admin/admin-ajax.php", // URL de WordPress AJAX
            type: "POST",
            data: {
                action: "load_more_posts", // Action définie dans functions.php
                page: page, // Page actuelle
            },
            success: function (response) {
                if (response) {
                    $(".thumbnail-container-accueil").append(response); // Ajout du contenu
                    page++;
                    button.text("Charger plus");

                    // Si plus aucun post à charger, cacher le bouton
                    if (response === "") {
                        button.hide();
                    }
                } else {
                    button.text("Plus aucun post à afficher");
                }
            },
            error: function () {
                button.text("Erreur, réessayez.");
            },
        });
    });
});




