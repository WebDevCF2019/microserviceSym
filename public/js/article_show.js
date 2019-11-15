// on utilisera jquery pour notre AJAX (AJAJ)
$(document).ready(function(){
    // quand on clique sur le lien dont la classe contient js-like-article, on lance une fonction anonyme, le "e" en paramètre permet de
    $('.js-like-article').on("click",function (e) {
        // "e" représente la fonction anonyme, ici on rend le lien non cliquable

        e.preventDefault();
        // on récupère le lien de la classe
        let $link = $(e.currentTarget);

        // on change le cœur grâce au css
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');
    });
});