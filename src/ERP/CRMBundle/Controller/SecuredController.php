<?php


namespace ERP\CRMBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use ERP\ImpresionBundle\Entity\Usuario;
use ERP\ImpresionBundle\Controller\UsuarioController;
/**
 * @Route("/secured")
 */
class SecuredController extends Controller
{

    /**
     * @Route("/login", name="abogado_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        if (class_exists('\Symfony\Component\Security\Core\Security')) {
            $authErrorKey = Security::AUTHENTICATION_ERROR;
            $lastUsernameKey = Security::LAST_USERNAME;
        } else {
            // BC for SF < 2.6
            $authErrorKey = SecurityContextInterface::AUTHENTICATION_ERROR;
            $lastUsernameKey = SecurityContextInterface::LAST_USERNAME;
        }
        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }
        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

        //ladybug_dump($error);
        return array(
            'last_username' => $lastUsername,
            'error' => $error,
            
        );
        /*ladybug_dump($error);
        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'errors'         => $error,
        );*/
    }

    /**
     * @Route("/login_check", name="abogado_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
        
    }

    /**
     * @Route("/logout", name="abogado_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }
    
    
    
    
//     /**
//     * Recuperar contraseÃ±a
//     * 
//     * @Route("/forgot-password", name="admin_forgot_passw")
//     */
//    public function forgotPasswordAction(Request $request) 
//    {
//        $parameters = $request->request->all();
//        $email = $parameters['email'];
//       
//        $em = $this->getDoctrine()->getManager();
//        $usuario = $em->getRepository('DGAbgSistemaBundle:CtlUsuario')->findOneBy(array('username' => $email));        
//        
//        $password = $this->generateRandomString(12);
//       
//        $usuario->setPassword($password);
//        $this->setSecurePassword($usuario,$password);
//        
//        $this->get('envio_correo')->sendEmail($usuario->getUsername(), "", "", "",
//                    "
//                        <table style=\"width: 540px; margin: 0 auto;\">
//                          <tr>
//                            <td class=\"panel\" style=\"border-radius:4px;border:1px #dceaf5 solid; color:#000 ; font-size:11pt;font-family:proxima_nova,'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; padding: 30px !important; background-color: #FFF;\">
//                            <center>
//                              <img style=\"width:50%;\" src=\"http://www.abogados.com.sv/badge1.png\">
//                            </center>
//                                <p>Hola " . $usuario->getRhPersona() . ", tu has recibido una solicitud para reestablecer tu contraseña.</p>
//                                <p> Usuario: " . $usuario->getUsername() . "</p>
//                                <p> Correo: " . $email . "</p>
//                                <p><b> Contraseña: " . $password . "</b></p>
//                                <p>Gracias, por usar nuestros servicios. </p>    
//                            </td>
//                            <td class=\"expander\"></td>
//                          </tr>
//                        </table>
//                    ");
//        //var_dump($password);
//        //var_dump($usuario);
//        //die();
//        $em->persist($usuario);
//        $em->flush();
//         
//        $mensaje="Se le envió la nueva contraseña a su correo electrónico , para introducir la nueva contraseña revise su correo electronico.";
//
//         $error = null; // The value does not come from the security component.
//        $lastUsername = null; 
//         
//        return $this->render('DGAbgSistemaBundle:Secured:login.html.twig', array(
//            'mensaje'=>$mensaje,
//            'redirect'=>'Login',
//            'error' => $error,
//            'last_username' => $lastUsername,
//            'header'=>'Tu contraseña ha sido modificada, en un momento recibiras un correo para poder reestablecerla',
//        ));    
//    }
//    
//     function generateRandomString($length) {
//        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//        $charactersLength = strlen($characters);
//        $randomString = '';
//        
//        for ($i = 0; $i < $length; $i++) {
//            $randomString .= $characters[rand(0, $charactersLength - 1)];
//        }
//        
//        return $randomString;
//    }
//    
//    private function setSecurePassword(&$entity, $contrasenia) {
//        $entity->setSalt(md5(time()));
//        $encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
//        $password = $encoder->encodePassword($contrasenia, $entity->getSalt());
//        $entity->setPassword($password);
//    } 
//    
//    
//    /**
//     * Recuperar contraseÃ±a
//     * 
//     * @Route("/correoContacto", name="correoContacto")
//     */
//    public function correoContacto(Request $request) 
//    {
//        
//        $parameters = $request->request->all();
//        
//        $emailAbogado = $parameters['correoAbogado'];
//        $emailCliente=$parameters['correoCliente'];
//        $nombreCliente=$parameters['nombreCliente'];
//        $mensajeCliente=$parameters['mensajeCliente'];
//        $emailAbogado=str_replace(" ", "", $emailAbogado);
//        
//       
//      
//        $em = $this->getDoctrine()->getManager();
//        $usuario = $em->getRepository('DGAbgSistemaBundle:CtlUsuario')->findOneBy(array('username' => $emailAbogado));        
//  
//        $this->get('envio_correo')->sendEmail($emailAbogado, "", "", "",
//                    "
//                        <table style=\"width: 600px; margin: 0 auto;\">
//                          <tr>
//                            <td class=\"panel\" style=\"border-radius:4px;border:1px #dceaf5 solid; color:#000 ; font-size:11pt;font-family:proxima_nova,'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; padding: 30px !important; background-color: #FFF;\">
//                            <center>
//                              <img style=\"width:50%;\" src=\"http://www.abogados.com.sv/badge1.png\">
//                            </center>
//                                <p>"."Hola " . $usuario->getRhPersona() . " esperamos la estes pasando bien dentro de nuestra plataforma, queremos notificarte que : <b>".$nombreCliente. "</b>  esta solicitando tus servicios profesionales, enviandote el siguiente mensaje.</p>  
//                                <p>" .'"'. $mensajeCliente .'"'. "</p>
//                                <p> Puedes ponerte en contacto al siguiente correo: " . $emailCliente . "</p>
//                                <p>Gracias, por utilizar los servicios de abogados.com.sv  </p> 
//                                <p>Saludos.</p>
//                            </td>
//                            <td class=\"expander\"></td>
//                          </tr>
//                        </table>
//                    ");
//  
//         
//       
//
//         $error = null; // The value does not come from the security component.
//        $lastUsername = null; 
//         
//        return $this->render(':directorio:directorio.html.twig', array(
//            'redirect'=>'Login',
//            'error' => $error,
//            'last_username' => $lastUsername,
//            
//        ));    
//    }
//    
//    
//   /**
//     * Recuperar contraseÃ±a
//     * 
//     * @Route("/correoRecomendacion", name="correoRecomendacion")
//     */
//    public function correoRecomendacion(Request $request) 
//    {
//        
//        $parameters = $request->request->all();
//        
//        $emailAbogado = $parameters['correoAbogado'];
//        
//        $emailRecomendador=$parameters['correoRecomendador'];
//        $nombreRecomandador=$parameters['nombreRecomendador'];
//        $nombrePersonaARecomendar=$parameters['nombrePersonaAaRecomendar'];
//        $emailPersonaRecomendar=$parameters['correoPersonaARecomendar'];
//        $emailAbogado=str_replace(" ", "", $emailAbogado);
//
//        $this->get('envio_correoRe')->sendEmail($emailPersonaRecomendar, "", "", "",
//                    "
//                        <table style=\"width: 600px; margin: 0 auto;\">
//                          <tr>
//                            <td class=\"panel\" style=\"border-radius:4px;border:1px #dceaf5 solid; color:#000 ; font-size:11pt;font-family:proxima_nova,'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; padding: 30px !important; background-color: #FFF;\">
//                            <center>
//                              <img style=\"width:50%;\" src=\"http://www.abogados.com.sv/badge1.png\">
//                            </center>
//                                <p>"."Hola " . $nombrePersonaARecomendar. ",te saludamos de abogados.com.sv, queremos notificarte que : <b>".$nombreRecomandador. "</b>  quiere recomendarte a un abogado que se encuentra dentro de nuestra plataforma. </p>  
//           
//                                <p> Puedes ponerte en contacto al siguiente correo: " . $emailAbogado . "</p>
//                                <p> Tambien puedes visitar su perfil en esta direccion: abogados.com.sv/directorio/  </p>
//                                <p>Gracias, por utilizar nuestros servicios</p> 
//                                <p>Saludos.</p>
//                            </td>
//                            <td class=\"expander\"></td>
//                          </tr>
//                        </table>
//                    ");
//  
//         
//       
//
//         $error = null; // The value does not come from the security component.
//        $lastUsername = null; 
//         
//        return $this->render(':directorio:directorio.html.twig', array(
//            'redirect'=>'Login',
//            'error' => $error,
//            'last_username' => $lastUsername,
//            
//        ));    
//    }
//      
    
    
    
    
    
    
    
    
    
    
    
    
    
}