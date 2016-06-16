$(document).ready(function(){

  var datos = {
    id : $("#data").data('id')
  }

  $.ajax({
    url: "/getEstadisticasHijo",
    type: "post",
    data: {data : datos}
  })
  .done(function(response){
    if(response[0] == 'success'){
      $setHtml = "<div class='felicitacionHijos text-center'>"+
                    "<h1>¡Felicidades Papá!</h1>"+
                    "<p>"+
                      "Todos sus hijos se encuentran con un nivel excelente. "+
                      "Es por esto que <b>Curiosity</b> le quiere dar las gracias "+
                      "y enviarle una grata felicitación, esperando así que se mantenga "+
                      "este compromiso en la educación.<br><br>"+
                      "<small><i>(Cualquier cambio se hará notar en esta sección)</i></small>"+
                    "</p>"+
                  "</div>";
      $(".alertaBox").html($setHtml);
    }
    else{
      $.each(response, function(index){
          $setHtml = "<div class='alertaHijo'>"+
                        "<h4><b>"+response[index].usernameHijo+"</b></h4>"+
                        "<h5><b>Tema: </b class='temanombre'>"+response[index].ayuda[0].tema_nombre+"</h5>"+
                        "<h5><b>Actividad: </b class='actividadnombre'>"+response[index].actividadNombre+"</h5>"+
                        "<a href='/packages/docs/"+response[index].ayuda[0].pdf+"' class='btn btn-success guiapdf' target='_blank'>"+
                          "<i class='fa fa-download'> Guía PDF</i>"+
                        "</a>"+
                        "<a href='javascript:void(0)' class='btn btn-danger guiavideo' data-embed='"+response[index].ayuda[0].code_embed+"'>"+
                          "<i class='fa fa-youtube-play'> Video de ayuda</i>"+
                        "</a>"+
                      "</div>";
          $(".alertaBox").append($setHtml);
      });
    }
  })
  .fail(function(error){
    console.log(error);
  });

  $(".alertaBox").on('click', '.alertaHijo > .guiavideo', function(){
    $("#videoAyuda").attr('src', $(this).data('embed'));
    $("#modalVideo").modal('show');
  });

  $.ajax({
    url: "/grafPuntajes",
    type: "post",
    data: {data : datos}
  })
  .done(function(response){
    var datos = [];
    var datosMin = [];
    $.each(response, function(index, obj){
      datos.push([obj.hijo+" (actividad: )", obj.maximo]);
      datosMin.push([obj.hijo+" (actividad: )", obj.minimo]);
    });
	  
	  // datos de la primera gráfica "doughnut"
	 var datos = {
		 type: "doughnut",
		 data:{
			 datasets:[{
				 data:[
					5,
					10,
					40,
					12,
					 
				 ],
				 
				 backgroundColor:[
					 "#65499d",
					 "#e6218f",
					 "#3cb54a",
					 "#f2bc19",
				 ],
			 }],
			 
			 labels:[
				 "Datos 1",
				 "Datos 2",
				 "Datos 3",
				 "Datos 4",
			 ]
		 },
		 
		 options:{
			 responsive: true,
		 }
	 };
	  
	  // datos de la segunda gráfica "line"
	 var datos2 = {
		 type: "line",
		 data:{
			 datasets:[{
				label: "My First dataset",
				fill: false,
				lineTension: 0.1,
				backgroundColor: "rgba(75,192,192,0.4)",
				borderColor: "rgba(75,192,192,1)",
				borderCapStyle: 'butt',
				borderDash: [],
				borderDashOffset: 0.0,
				borderJoinStyle: 'miter',
				pointBorderColor: "rgba(75,192,192,1)",
				pointBackgroundColor: "#fff",
				pointBorderWidth: 1,
				pointHoverRadius: 5,
				pointHoverBackgroundColor: "rgba(75,192,192,1)",
				pointHoverBorderColor: "rgba(220,220,220,1)",
				pointHoverBorderWidth: 2,
				pointRadius: 1,
				pointHitRadius: 10,
				data: [65, 59, 80, 81, 56, 55, 40],
			 }],
			 
			 labels:[
				 "Junio",
				 "Julio",
				 "Agosto",
				 "Septiembre",
				 "Octubre",
				 "Noviembre",
				 "Diciembre",
			 ]
		 },
		 
		 options:{
			 responsive: true,
		 }
	 };
	  
	  // Seleccionamos el contenedor
	  var contenedor = document.getElementById('puntaje_exp').getContext('2d');
	  var contenedor2 = document.getElementById('puntaje_pts').getContext('2d');
	  
	  // Creamos las gráficas "doughnut" y "line", toma dos parametros  1.el contenedor 2.los datos
	  var myDoughnutChart = new Chart(contenedor, datos);
	  var myline = new Chart(contenedor2, datos2);
	  
  })
  .fail(function(error){
    console.log(error);
  });

  // for (var i = 0; i < 3; i++) {
  //   $(".graf").append("<center><div class='graficaBox grafica"+i+"'></div></center>");
  // }

});
