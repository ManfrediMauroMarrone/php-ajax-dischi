$(document).ready(function(){

  const source  = $("#card-template").html();
  var template = Handlebars.compile(source);

  if($("#versione-ajax").length) {
    $.ajax({
      url: '../dischi.php',
      methods: 'GET',
      success: function(data){
        var genres = [];
        for (var i = 0; i < data.length; i++) {
          var context = {
            poster: data[i].poster,
            title: data[i].title,
            author: data[i].author,
            year: data[i].year,
          };
          var html = template(context);
          $('.card-container').append(html)
          // recupero il genere del disco corrente
          var current_genre = data[i].genre;
          // verifico se questo genere non è gia prensente nelarray dei generi
          if(!genres.includes(current_genre)) {
              genres.push(current_genre);
          }
        };
        for (var i = 0; i < genres.length; i++) {
            // per ogni genere, appendo una option nella select
            $('#filter').append(`
                <option value="${genres[i]}">
                    ${genres[i]}
                </option>`);
        }
      },
      error: function() {
        console.log('errore');
      }
    });

  }

  // intercetto il cambio della select
  $('#filter').change(function(){
    // svuoto il contenitore altrimenti si sommerebbero le card
    $('.card-container').empty();
    // recupero il genere selezionato
    let selectedGenre = $(this).val();
    // faccio una chiamata ajax per inviare al server il genere selezionato
    $.ajax({
      url: '../dischi.php',
      methods: 'GET',
      data: {
        genre: selectedGenre
      },
      success: function(data){
        for (var i = 0; i < data.length; i++) {

          var context = {
            poster: data[i].poster,
            title: data[i].title,
            author: data[i].author,
            year: data[i].year,
          };
          var html = template(context);
          $('.card-container').append(html)
        }
      },
      error: function() {
        console.log('errore');
      }
    });
  });
});
