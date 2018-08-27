function showDoctor(id, state) {
	    alert('showDoctor');
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerHTML = this.responseText;
            }
        };
        /*xmlhttp.open("GET","getDoctor.php?q="+state,true);*/
		xmlhttp.open("GET","getDoctor.php?q="+state,true);
        xmlhttp.send();
 }
 
 


jQuery( document ).ready( function( $ ) {
$('.stated').click(function(event){
    event.preventDefault(); // prevent default behaviour of link click

	//var state = '#' + $(this).attr('state');
	var state_abbr = $(this).attr('state_abbr')
	var value = $( this ).attr( 'href' );
	var state = value + "_data";
	
	console.log('debug',state,value);

  var data = {
	type:   'post',
    'action': 'get_doctor', 'state': state_abbr
  };
  $.post( ajaxurl, data, function( response ) {
      //alert( 'Got this from the server: ' + response );
	  //alert($(response).val());
      //$('div#table_az').append(response);

	  $(value).append(response);
  });

	console.log('after data');

});  //stated click event

$('.doctor_select').click(function(event){
   alert('DOCTOR SELECTED');
});  
});

//jQuery('.stated').click(test);
/*REMOVE
function test(){


    event.preventDefault(); // prevent default behaviour of link click
    console.log('before data');

  var data = {
	type:   'post',
    'action': 'get_doctor', 'state': 'AZ'
  };
  $.post( ajaxurl, data, function( response ) {
      //alert( 'Got this from the server: ' + response );
	  //alert($(response).val());
	  $('div#table_az').append(response);
  });

	console.log('after data');


}
*/