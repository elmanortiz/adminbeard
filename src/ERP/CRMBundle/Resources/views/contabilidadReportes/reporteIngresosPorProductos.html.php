<!DOCTYPE HTML>
<html lang="Es">
<head>
    <title>Reporte de comision</title>
	<style type="text/css">
		body{font-size:0.80em;}
		.Cabecera{}
                
                .thClass{
                    height: 20px;
                    width: 225px;
                }
                .tdProductoE{
                     height: 10px;
                    width: 100px;
                     text-align: right; 
                }
                
                .tdC{
                    text-align: right;
                    
                }
                .tdProducto{
                    text-align: left; 
                }
                
                .encabezado{
                   
                    font-size: 15px;
                    
                }
                body {
                    font-family: 'Open Sans', sans-serif;
                }
	</style>


</head>
<body>
    
	
      <div >
    
             <div style="height: 120px; margin-bottom: -20px;">
             
                 
              
              <table>
                
                    <tr>
                        <td colspan="5" style="font-size: 20px; font-weight: 600;text-transform: uppercase;"> Reporte de ingresos por productos</td>
                    </tr>
                    <tr>
                      <td class="tdProductoE"><b>Rango de fechas:</b></td>
                      <td class="tdProducto">
                        <?php 
                      
                            if ($fechaInicio!=0 && $fechaFin!=0 ){
                               
                                
                                 echo 'Del '.$fechaInicio ." Al ".$fechaFin;

                            }else{
                                echo "No ha seleccionado un rango de fechas";
                                
                            }
                        
                        ?>
                      </td>
                     

                       </tr>
                         
              </table>
                    
                <img src="http://marvinvigil.info/imagenesbeard/barba1.png" style="width: 100px; height: auto; float: right;margin-top: -80px;"/>
        </div>
			
			
          <div style="border-top: 2px solid #888888;"></div>   
	
    <div style="margin-top: 20px;  margin-left: 125px;">
        <div>
            <p style="font-size: 17px; font-weight: 600;  text-transform: uppercase;">Detalle de de ingresos por producto</p>
        </div>  
        
       <table style="border: 2px solid #3C2D2D;">
        <thead>
            <tr style="background-color: #f2f2f2;">
              
                <th class="thClass">Nombre producto</th>
               <th class="thClass">Total de ingreso neto</th>
            </tr>
        </thead>
              <?php
              $dimension = count($monto);
              $totalIngreso =0;
              
              for ($i=0;$i<$dimension;$i++){
                   $totalIngreso=$totalIngreso+ $monto[$i]['montoTotal'];
                    
                    ?>  
                  <tr>
                      
                      <td class="tdProducto">
                            <?php
                            echo $monto[$i]['nombrePro'];
                             ?>
                        </td>
                         <td class="tdC">
                         <?php
                            echo "$ ". number_format($monto[$i]['montoTotal'],2);
                             ?>
                        </td>
                    
                  </tr>
                             <?php
                             }
                    ?>  
    </table>
    </div>
       <div style="margin-top: 20px; margin-left: 420px;">
              <table>
                   <tr>
                       <td class="tdProductoE"><b>Total de ingresos:</b></td><td class="tdC"><?php echo "$  ".number_format($totalIngreso,2) ?>     </td>
                  </tr>
                 </table>
          </div>    
          
          
</div>
</body>
</html> 





