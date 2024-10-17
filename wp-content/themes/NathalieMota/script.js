//appeler la modale 

var modal = document.getElementById('myModal');

// appeler le bouton de la modale 

var btn = document.getElementById("myBtn");


// cliquer sur le bouton pour ouvrir la modale 

btn.onclick = function() {
    modal.style.display = "block";
}

// cliquer sur <span> (x), pour fermer la modale

span.onclick = function() {
    modal.style.display = "none";
}

//cliquer n'importe où pour fermer la modale

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}