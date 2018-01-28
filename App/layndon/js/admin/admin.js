$('.delete-image').click(function(e){
  
  var id_film = e.target.id
  var host = window.location;
  
  var endpoint = host + '/delete/' + id_film;

  $.ajax({	
	url: endpoint,
	type:'DELETE'	  
  }).done( function() {
    	$('.'+id_film).remove();
	})
});

$('.see-image').click(function(e){
  
  var id_film = e.target.id
  var host = 'http://localhost/layndon-v2/public/layndon'
  
  var endpoint = host + '/film/' + id_film;

  $.ajax({	
	url: endpoint,
	type:'GET'	  
  }).done( function() {
    	location = endpoint;
	})
})