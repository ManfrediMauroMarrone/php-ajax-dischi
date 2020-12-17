$(document).ready(function(){

  const source   = $("#card-template").html();
  var template = Handlebars.compile(source);

  $.ajax({
    url: 'dischi.php',
    methods: 'GET',
    success: function(data){
      for (var i = 0; i < data.length; i++) {
        console.log(data[i].title);
        console.log(data[i].author);
        console.log(data[i].year);
        console.log(data[i].poster);

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
