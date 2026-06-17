<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f5f5f5; padding: 20px; margin: 0;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e0e0e0;">
        
        <div style="background-color: #2d3a27; padding: 40px 30px; text-align: center; border-bottom: 4px solid #ff9900;">
            <div style="font-size: 28px; font-weight: bold; color: #ff9900; margin-bottom: 8px; letter-spacing: 1px;">
                LA PLOMADA
            </div>
            <div style="color: #c0c0c0; font-size: 13px; text-transform: uppercase; letter-spacing: 2px;">
                Articulos de Camping y Pesca
            </div>
        </div>
        
        <div style="padding: 40px 30px;">
            
            <div style="background-color: #fdfaf6; border-left: 4px solid #ff9900; padding: 25px; border-radius: 8px;">
                <h2 style="color: #2d3a27; margin-top: 0; font-size: 22px;">Hola,</h2>
                
                <p style="color: #333333; font-size: 15px; line-height: 1.6;">
                    Recibes este correo porque solicitaste restablecer la contraseña de tu cuenta en nuestro sistema.
                </p>
                
                <p style="color: #333333; font-size: 15px; line-height: 1.6; margin-top: 15px;">
                    Para restablecer tu contraseña, haz clic en el siguiente botón:
                </p>

                <div style="text-align: center; margin: 30px 0;">
                    <a href="{{ url(route('password.reset', ['token' => $token, 'email' => $email], false)) }}" 
                       style="display: inline-block; background-color: #ff9900; color: #ffffff; padding: 14px 35px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 15px;">
                        Restablecer Contraseña
                    </a>
                </div>
                
                <div style="height: 1px; background-color: #e0e0e0; margin: 25px 0;"></div>
                
                <p style="color: #666666; font-size: 14px; line-height: 1.6;">
                    Si no realizaste esta solicitud, no es necesario que hagas nada.
                </p>
                
                <p style="color: #333333; font-size: 15px; line-height: 1.6; margin-bottom: 0;">
                    Saludos,<br>
                    <strong style="color: #ff9900;">El equipo de La Plomada.</strong>
                </p>
            </div>

        </div>

        <div style="background-color: #2d3a27; padding: 30px; text-align: center; border-top: 4px solid #ff9900;">
            <p style="color: #c0c0c0; font-size: 13px; margin: 0; line-height: 1.7;">
                <strong>La Plomada</strong><br>
                Telefono: +54 (3794) 123-4567<br>
                Ciudad de Corrientes, Corrientes
            </p>
        </div>

    </div>

</body>
</html>