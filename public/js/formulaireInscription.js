$(document).ready(function(){
    
    var $prenom = $('#prenom'),
        $nom = $('#nom'),
        $mdp = $('#motDePasse'),
        $tel =$('#telephone'),
        $confirmation = $('#motDePasseConfirm'),
        $mail = $('#email'),
        $envoi = $('#envoi'),
        $reset = $('#rafraichir'),
        $champ = $('.champ');
        $code_postal = $('#code_postal');

    $code_postal.keyup(function(){
        $patt = new RegExp ('^[0-9]{4}$');
        if(!$patt.test(($(this).val()))){ // si le champ est vide
                // on affiche le message d'erreur
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


    $mail.keyup(function(){
        $patt = new RegExp ('^[a-z]+.[a-z]+@esprit.tn$');
        if($(this).val() == "" || !$patt.test(($(this).val()))){ // si le champ est vide
                // on affiche le message d'erreur
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
        $tel.keyup(function(){
            $patt = new RegExp ('^(00216)?[0-9]{8}$');
            if(!$patt.test(($(this).val()))){ // si le champ est vide
                    // on affiche le message d'erreur
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
            $champ.keyup(function(){
                if($(this).val().length < 5 ){ // si la cha??ne de caract??res est inf??rieure ?? 5
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
        if($(this).val() != $mdp.val()){ // si la confirmation est diff??rente du mot de passe
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

    

   


       

});


/*


*/