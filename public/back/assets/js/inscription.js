$(document).ready(function(){
    
    var $pseudo = $('#pseudo'),
        $mdp = $('#mdp'),
        $confirmation = $('#confirmation'),
        $mail = $('#mail'),
        $envoi = $('#envoi'),
        $reset = $('#rafraichir'),
        $erreur = $('#erreur'),
        $champ = $('.champ');

    $champ.keyup(function(){
        if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
            $(this).css({ // on rend le champ rouge
                borderColor : 'red',
	        color : 'red'
            });
         }
         else{
             $(this).css({ // si tout est bon, on le rend vert
	         borderColor : 'green',
	         color : 'green'
	     });
         }
    });

    $confirmation.keyup(function(){
        if($(this).val() != $mdp.val()){ // si la confirmation est différente du mot de passe
            $(this).css({ // on rend le champ rouge
     	        borderColor : 'red',
        	color : 'red'
            });
        }
        else{
	    $(this).css({ // si tout est bon, on le rend vert
	        borderColor : 'green',
	        color : 'green'
	    });
        }
    });

    $envoi.click(function(e){
        e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi

        // puis on lance la fonction de vérification sur tous les champs :
        verifier($pseudo);
        verifier($mdp);
        verifier($confirmation);
        verifier($mail);
    });

    $reset.click(function(){
        $champ.animate({ // on remet le style des champs comme on l'avait défini dans le style CSS
            borderColor : '#ccc',
    	    color : '#555'
        });
        $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur
    });

    function verifier(champ){
        if(champ.val() == ""){ // si le champ est vide
    	    $erreur.css('display', 'block'); // on affiche le message d'erreur
            champ.css({ // on rend le champ rouge
    	        borderColor : 'red',
    	        color : 'red'
    	    });
        }
    }

});


/*

vous pourriez vérifier le format de l'adresse e-mail, grâce à une expression régulière, faite avec l'objet Regex de JavaScript ;

vous auriez pu également vérifier que le mot de passe était sûr, en faisant par exemple un mini-indicateur de sûreté qui se baserait sur le nombre de caractères, leur diversité, ...

il est possible d'afficher un message d'aide pour chaque champ, lorsque l'utilisateur tape du texte dans ceux-ci ;
*/