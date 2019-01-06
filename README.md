# test-placetopay
Prueba de desarrollador PlaceToPay

Se deben configurar las siguientes variables en el archivo .env
ej: PSE_TRAN_KEY="Llave transacciona", PSE_LOGIN="Identificador" , PSE_URL="WSDL"
para pruebas así:
PSE_TRAN_KEY="024h1IlD"
PSE_LOGIN="6dd490faf9cb87a9862245da41170ff2"
PSE_URL="https://test.placetopay.com/soap/pse/?wsdl"

Se deben crear una base de datos y configurar los datos en el archivo .env

Se deben correr los siquientes comandos 
php artisan migrate:install
php artisan migrate


Nota: La base de datos en la tabla payment_references en los campos 
phone y mobile no acepta mas de 20 el web services tira una alerta, por esta razón se coloca de tal forma en la migración

