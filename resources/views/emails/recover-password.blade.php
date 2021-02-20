@component('mail::message')
# 

Hola, has solicitado el cambio de contraseña.
<br>
Haz clic en el botón para cambiar tu contraseña.
@component('mail::button', ['url' => $url])
Cambiar contraseña
@endcomponent

Att: Gen Rubio
@endcomponent
