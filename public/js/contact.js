window.onload = () => {


  // begin initialize

  let form
  let firstName
  let lastName 
  let email 
  let phone 
  let message 

  // initialize finished
  
  

  // begin addValue

  function addValue() {
    form = document.getElementById('contactForm')
    firstName = document.getElementById('contact_firstName') // contact = le formulaire, firstName = le champ du formulaire
    lastName = document.getElementById('contact_lastName') // contact = le formulaire, lastName = le champ du formulaire
    email = document.getElementById('contact_email') // contact = le formulaire, email = le champ du formulaire
    phone = document.getElementById('contact_phone') // contact = le formulaire, phone = le champ du formulaire
    message = document.getElementById('contact_message') // contact = le formulaire, message = le champ du formulaire
    

    // begin submitForm

    form.addEventListener('submit', function(event) {
      event.preventDefault()
      requestAsyncAwaitContact()   
    })

    // submitForm finished


    // begin restartForm

    form.addEventListener('reset', function(event) {
      event.preventDefault()
      restartForm()
    })

  }

  //  restartForm finished

  // addValue finished

  addValue()


 // begin restartForm

 function restartForm() {
  firstName.value = ''
  lastName.value = ''
  email.value = ''
  phone.value = ''
  message.value = ''
  const invalidFeedback = document.querySelectorAll('.invalid-feedback')  
  invalidFeedback.forEach((feedback) => {
  feedback.remove()
  })
  const isInvalid = document.querySelectorAll('.is-invalid')
  isInvalid.forEach((invalid) => {
  invalid.classList.remove('is-invalid')
  })
}

// restartForm finished

  

  // begin requestAsyncAwaitContact

  async function requestAsyncAwaitContact() {
    try {
        const content = document.getElementById('pageContain'); // Récupère un élément avec l'ID #pageContain
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

// requestAsyncAwaitcontact finished
}

// window.onload finished