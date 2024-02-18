window.onload = () => {
  
  // LES SLIDER DANS LA PAGE NOS VEHICULES

  let priceMin = valueMinPrice
  let priceMax = valueMaxPrice
  let kmMin = valueMinKm
  let kmMax = valueMaxKm
  let yearMin = valueMinYear
  let yearMax = valueMaxYear

  $( function() {
    $( "#slider-range-prix" ).slider({
      range: true,
      min: valueMinPrice,
      max: valueMaxPrice,
      values: [ valueMinPrice, valueMaxPrice ],
      slide: function( event, ui ) {
        $( "#amountPrix" ).val( ui.values[ 0 ] + " € - " + ui.values[ 1 ] + " €")
      },
      stop: function( event, ui ) {
        priceMin = ui.values[ 0 ]
        priceMax = ui.values[ 1 ]
        requestAsyncAwaitSlider()
      }
    })
    $( "#amountPrix" ).val( $( "#slider-range-prix" ).slider( "values", 0 ) + " €"  +
    " - " + $( "#slider-range-prix" ).slider( "values", 1 ) + " € " )
  } )
  

  $( function() {
    $( "#slider-range-km" ).slider({
      range: true,
      min: valueMinKm,
      max: valueMaxKm,
      values: [ valueMinKm, valueMaxKm ],
      slide: function( event, ui ) {
        $( "#amountKm" ).val( ui.values[ 0 ] + " Km - " + ui.values[ 1 ] +" Km" )
        },
      stop: function( event, ui ) {
        kmMin = ui.values[ 0 ]
        kmMax = ui.values[ 1 ]
        requestAsyncAwaitSlider()
      }
    })
    $( "#amountKm" ).val( $( "#slider-range-km" ).slider( "values", 0 ) + " Km" +
    " - " + $( "#slider-range-km" ).slider( "values", 1 ) + " Km " )
  } )


  $( function() {
    $( "#slider-range-annee" ).slider({
      range: true,
      min: valueMinYear,
      max: valueMaxYear,
      values: [ valueMinYear, valueMaxYear ],
      slide: function( event, ui ) {
        $( "#amountAnnee" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] )
      },
      stop: function( event, ui ) {
        yearMin = ui.values[ 0 ]
        yearMax = ui.values[ 1 ]
        requestAsyncAwaitSlider()
      }
    })
    $( "#amountAnnee" ).val( "" + $( "#slider-range-annee" ).slider( "values", 0 ) +
    " - " + $( "#slider-range-annee" ).slider( "values", 1 ) )
  } )


  let reinitialiserPrix
  let reinitialiserKm
  let reinitialiserAnnee


  // bouton réinitialiserAnneePrix

  reinitialiserPrix = document.getElementById('restartPrix')

  
  reinitialiserPrix.addEventListener('click', function(event) {
    $( "#slider-range-prix" ).slider( "values", [ valueMinPrice, valueMaxPrice ] )
    $( "#amountPrix" ).val( $( "#slider-range-prix" ).slider( "values", 0 ) + " €"  +
    " - " + $( "#slider-range-prix" ).slider( "values", 1 ) + " € " )
    priceMin = valueMinPrice
    priceMax = valueMaxPrice
  
    requestAsyncAwaitSlider()
  })


  // bouton réinitialiserKm

  reinitialiserKm = document.getElementById('restartKm')

  reinitialiserKm.addEventListener('click', function(event) {
    $( "#slider-range-km" ).slider( "values", [ valueMinKm, valueMaxKm ] )
    $( "#amountKm" ).val( $( "#slider-range-km" ).slider( "values", 0 ) + " Km" +
    " - " + $( "#slider-range-km" ).slider( "values", 1 ) + " Km " )
    kmMin = valueMinKm
    kmMax = valueMaxKm
  
    requestAsyncAwaitSlider()
  })


  // bouton réinitialiserAnnee

  reinitialiserAnnee = document.getElementById('restartAnnee')
  
  reinitialiserAnnee.addEventListener('click', function(event) {
    $( "#slider-range-annee" ).slider( "values", [ valueMinYear, valueMaxYear ] )
    $( "#amountAnnee" ).val( "" + $( "#slider-range-annee" ).slider( "values", 0 ) +
    " - " + $( "#slider-range-annee" ).slider( "values", 1 ) )
    yearMin = valueMinYear
    yearMax = valueMaxYear
  
    requestAsyncAwaitSlider()
  })




  // Fonction requestAsyncAwaitSlider
  
  async function requestAsyncAwaitSlider() {
    try {
      const content = document.getElementById('content');
      let yearMinDate = `${yearMin}-01-01`;
      let yearMaxDate = `${yearMax}-12-31`;
  
      const Params = new URLSearchParams();
  
      Params.append('priceMin', priceMin);
      Params.append('priceMax', priceMax);
      Params.append('kmMin', kmMin);
      Params.append('kmMax', kmMax);
      Params.append('yearMin', yearMinDate);
      Params.append('yearMax', yearMaxDate);
  
      const Url = new URL(window.location.href);
  
      const response = await fetch(Url.pathname + '?' + Params.toString(), {
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      });
  
      const data = await response.json();
      content.innerHTML = data.content;
    } catch (e) {
      alert(e);
    }
  }
}
