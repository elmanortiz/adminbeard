 $(document).ready(function(){
    inicioPantalla();

     $("#tipoPago").select2();
      $("#tipoPagoE").select2();
     
     
      $('#busqueda-clienteN').select2({
                ajax: {
                    url: Routing.generate('busqueda_abogado_select'),
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        var select2Data = $.map(data.data, function (obj) {
                            obj.id = obj.abogadoid;
                            obj.text = obj.codigo + ' - ' + obj.nombres;

                            return obj;
                        });

                        return {
                            results: select2Data
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection,
                formatInputTooShort: function () {
                    return "Enter 1 Character";
                }
            });
     
     
     
     
     
     $('#busqueda-cliente').select2({
                ajax: {
                    url: Routing.generate('busqueda_abogado_select'),
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        var select2Data = $.map(data.data, function (obj) {
                            obj.id = obj.abogadoid;
                            obj.text = obj.codigo + ' - ' + obj.nombres;

                            return obj;
                        });

                        return {
                            results: select2Data
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection,
                formatInputTooShort: function () {
                    return "Enter 1 Character";
                }
            });
            
            
            
             $('#busqueda-clienteE').select2({
                ajax: {
                    url: Routing.generate('busqueda_abogado_select'),
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        var select2Data = $.map(data.data, function (obj) {
                            obj.id = obj.abogadoid;
                            obj.text = obj.codigo + ' - ' + obj.nombres;

                            return obj;
                        });

                        return {
                            results: select2Data
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatRepo,
//                templateSelection: formatRepoSelection,
                formatInputTooShort: function () {
                    return "Enter 1 Character";
                }
            });
     
 $(document).on("click","#guardarAbonoN", function(){


     
     
                 var num=0;
                $('.requeridoInsercion').each( function (){
            
                       var x=$(this).val();
            
                       if(x==""){
                           num=num+1;
                       }

                       });
           
               
                if (num==0){ 
                   var fechaRegistroCliente= $('#txtFechaInicioN').val();
                    var idCliente = $('#busqueda-clienteN').val();
                     var montoAbono= $('#montoAbonoN').val();
                     var tipoPago = $("#tipoPago").val();
                     var descripcion = $("#descripcionAbono").val();
                   if (isNaN(montoAbono)!=true){

                          $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {tipoPago:tipoPago,descripcion:descripcion,fechaRegistroCliente:fechaRegistroCliente,idCliente:idCliente,
                                    montoAbono:montoAbono},
                                    url: Routing.generate('insertarAbono'),
                                    success: function (data)
                                    {
                                         if (data.estado==true){
                                          
                                          swal({
                                                    title: "Datos  ingresados con exito",
                                                    text: "¿Quieres seguir ingresando mas registros de abonos?",
                                                    type: "success",
                                                    showCancelButton: true,
                                                    cancelButtonText: "Despues",
                                                    confirmButtonText: "Seguir",
                                                    confirmButtonColor: "#00A59D",
                                                    closeOnConfirm: true,
                                                    closeOnCancel: false
                                                },
                                                        function (isConfirm) {
                                                            if (isConfirm) {
                                                                   var url=Routing.generate('nuevo_abono_index');
                                                                window.open(url,"_self"); 
                                                                  
                                      
                                                            } else {
                                                                    var url=Routing.generate('admin_contabilidad_index');
                                                                window.open(url,"_self"); 

                                                            }
                                                        });
                                            
                                             
                                         }
                                         else 
                                             if(data.estado==false){
                                             swal("Error!", "No puedes ingresar un abono mayor al total de la deuda", "error");
                                         }
                                         else{
                                             
                                                swal("Error!", "Error al ingresar los datos", "error");
                                            location.reload();

                                         }
  
                                    },
                                    error: function (xhr, status)
                                    {
                      
                    }
            });
          }else{
              
              swal("Error!", "El monto del abono no pueden ser letras", "error");
          }   

                }else{

                    swal("Error!", "No debe dejar datos vacios a la hora de guardar", "error");
                }
            
       
            
            
  });
  
  
  
  
   $(document).on("click","#guardarEdicionE", function(){
         var num=0;
                $('.requeridoEdicion').each( function (){
            
                       var x=$(this).val();
            
                       if(x=="" || x==null){
                           num=num+1;
                       }

                       });
           
               
                if (num==0){ 
                     var fechaRegistroCliente= $('#txtFechaInicioE').val();
                    var idCliente = $('#busqueda-clienteE').val();
                    var montoAbono= $('#montoAbonoE').val();
                    var idDetalle=$('#idDetalle').val();
                    var tipoPago = $("#tipoPagoE").val();
                     var descripcion = $("#descripcionAbonoE").val();
                    if (isNaN(montoAbono)!=true){
                 $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {fechaRegistroCliente:fechaRegistroCliente,idCliente:idCliente,
                                    montoAbono:montoAbono,idDetalle:idDetalle,descripcion:descripcion,tipoPago:tipoPago},
                                    url: Routing.generate('editarAbono'),
                                    success: function (data)
                                    {
                                         if (data.estado==true){
                                          
                                          swal({
                                                    title: "Datos  modificados con exito",
                                                    text: "¿Quieres seguir modificando registros de abonos?",
                                                    type: "success",
                                                    showCancelButton: true,
                                                    cancelButtonText: "Despues",
                                                    confirmButtonText: "Seguir",
                                                    confirmButtonColor: "#00A59D",
                                                    closeOnConfirm: true,
                                                    closeOnCancel: false
                                                },
                                                        function (isConfirm) {
                                                            if (isConfirm) {
                                                                    
                                                                       var url=Routing.generate('admin_abonos_index');
                                                                window.open(url,"_self"); 
                            
                                      
                                                            } else {
                                                                    var url=Routing.generate('admin_contabilidad_index');
                                                                window.open(url,"_self"); 

                                                            }
                                                        });
                                            
                                             
                                         }
                                         else 
                                             if(data.estado==false){
                                             swal("Error!", "No puedes ingresar un abono mayor al total de la deuda", "error");
                                         }
                                         else{
                                             
                                                swal("Error!", "Error al ingresar los datos", "error");
                                            location.reload();

                                         }

                                    },
                                    error: function (xhr, status)
                                    {
                      
                    }
            });
       }else{
                     swal("Error!", "El monto del abono no pueden ser letras", "error");
                }
                   
                   
                
                }else{
                    
                    
                    swal("Error!", "No debe dejar datos vacios a la hora de guardar la edicion", "error");
                }
            
     
       
       
       
   });
     
 
 $('#txtFechaInicioE').Zebra_DatePicker({
     format: 'Y-m-d'
});    

$('#txtFechaInicioN').Zebra_DatePicker({
     format: 'Y-m-d',
    direction: false
});

var fecha =new   Date();
var dia = fecha.getDate();
var mes = fecha.getMonth();
var anho = fecha.getFullYear();

    if (mes<10){
        mes=mes+1;
    }


 var fechaFinal = anho+"-"+"0"+mes+"-"+dia;

  

$('#txtFechaInicio').Zebra_DatePicker({
     format: 'Y-m-d',
    direction: -1,
    pair: $('#txtFechaFin')
});


     
  $('#txtFechaFin').Zebra_DatePicker({
     format: 'Y-m-d',
     direction: [true, fechaFinal]
});   
     
     
     
       $(document).on("click",".verPDFAbono",function() {
           var idDetalle =$(this).attr("id");
      
           
          var url=Routing.generate('verPDFRegistroAbono',{idDetalle: idDetalle});

                                        window.open(url,"_blank"); 

       });

     
 });

function formatRepo (data) {
            console.log(data);
            if(data.nombres){
                var markup = "<div class='select2-result-repository clearfix'>" +
                             "<div class='select2-result-repository__meta'>" +
                             "<div class='select2-result-repository__title'>" + data.codigo + " - " + data.nombres + "</div>" +
                             "</div></div>";
            } 
            return markup;
        }

        function formatRepoSelection (data) {
            if(data.nombres){
                return data.codigo + " - " + data.nombres ;
            } else {
                return "Seleccione un cliente";
            }   
        }
        
        
        
function inicioPantalla(){
 $('#nuevoAbono').hide();
  $('#contenidoMonto').hide();
   $('#deudaContenido').hide();
   $('#fechaRegistro').hide();
    $('#cancelarAbono').hide();
      $('#guardarAbono').hide();
       $('#contenidoEdicionAbono').hide();
        $('#guardarEdicion').hide();                       
               
                                         

}

