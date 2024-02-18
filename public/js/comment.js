window.onload = () => {
  
  
// form comment


    // begin initialize
    
    let form
    let name
    let stars
    let comment
    let star1, star2, star3, star4, star5

    // initialize finished
    


    // begin addValue

    function addValue() {
      form = document.getElementById('commentForm')
      name = document.getElementById('comments_name')
      stars = document.getElementById('comments_stars')
      comment = document.getElementById('comments_message')
      star1 = document.getElementById('star1')
      star2 = document.getElementById('star2')
      star3 = document.getElementById('star3')
      star4 = document.getElementById('star4')
      star5 = document.getElementById('star5')
      stars.value = 5
      
      
      // begin submitForm "ecoute quand on soumet le formulaire"

      form.addEventListener('submit', function(event) {
        event.preventDefault()
        requestAsyncAwaitComment()   
      })

      // submitForm finished
  


      // begin restartForm

      form.addEventListener('reset', function(event) {
        event.preventDefault()
        restartForm()
      })

      // restartForm finished
  

      // star 1 "ecoute quand on clique sur la premiere etoile"

      star1.addEventListener('click', function() {
        stars.value = 1
        star1.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star2.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
        star3.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
        star4.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
        star5.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
      })
      
  
      // star 2

      star2.addEventListener('click', function() {
        stars.value = 2
        star1.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star2.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star3.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
        star4.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
        star5.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
      })
      
  
      // star 3

      star3.addEventListener('click', function() {
        stars.value = 3
        star1.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star2.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star3.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star4.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
        star5.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
      })
      
  
      // star 4

      star4.addEventListener('click', function() {
        stars.value = 4
        star1.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star2.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star3.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star4.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star5.innerHTML ="<img src=\'images/etoilesnonvote.png\' width=\'38px\' height=\'38px\'>";
      })
      
  
      // star 5

      star5.addEventListener('click', function() {
        stars.value = 5
        star1.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star2.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star3.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star4.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
        star5.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
      })
     
    }

    // addvalue finished

    addValue()
   

 // begin restartForm

 function restartForm() {
  name.value = ''
  comment.value = ''
  stars.value = 5
  const invalidFeedback = document.querySelectorAll('.invalid-feedback')  
  invalidFeedback.forEach((feedback) => {
    feedback.remove()
  })
  const isInvalid = document.querySelectorAll('.is-invalid')
  isInvalid.forEach((invalid) => {
  invalid.classList.remove('is-invalid')
  })
  star1.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
  star2.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
  star3.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
  star4.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
  star5.innerHTML ="<img src=\'images/etoilesvote.png\' width=\'38px\' height=\'38px\'>";
}

// restartForm finished



    // begin requestAsyncAwait contactAbout

  async function requestAsyncAwaitComment() {
    try {
        const content = document.getElementById('modalForm'); // Récupère un élément avec l'ID #pageContain
        const formData = new FormData(form); // Crée un objet FormData à partir du formulaire

        const Url = new URL(window.location.href); // Obtient l'URL actuelle

        // Effectue une requête POST AJAX vers l'URL actuelle avec les données du formulaire
        const response = await fetch(Url.pathname, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        });

        const data = await response.json(); // Convertit la réponse en JSON

        if (data.success) {
            restartForm(); // Réinitialise le formulaire

            // Affiche une notification "Sweet Alert" pour informer l'utilisateur que la demande a été envoyée avec succès
            Swal.fire({
                imageUrl: "../images/logocontact.png",
                title: "MERCI!",
                text: "Votre demande de contact vient d'être envoyée.",
                imageWidth: 250,
                imageHeight: 250,
                imageAlt: "Custom image",
                showConfirmButton: false
            });

            // Après un délai de 4 secondes, ferme la notification et redirige l'utilisateur vers une URL spécifiée
            setTimeout(() => {
                Swal.close();
                window.location.href = data.UrlRedirect;
            }, 4000);
        } else {
            // Remplace le contenu de l'élément #pageContain par le contenu de la réponse
            content.innerHTML = data.content;
            // Réassigne les valeurs au formulaire
            addValue();
        }
    } catch (error) {
        // Affiche toute erreur dans une boîte de dialogue d'alerte
        alert(error);
    }
  }

// requestAsyncAwait contactAbout finished

}

// window.onload finished