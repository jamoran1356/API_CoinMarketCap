# CREA UNA TABLA DE PRECIOS DE CRIPTOMONEDAS USANDO PHP Y MSQL Y LA API DE COINMARKETCAP

El presente código tiene como finalidad transformar la data que se recolecta desde la API de CoinMarketCap en una tabla en la que se pueda mostrar los datos json que se reciben.

Igualmente se pueden ampliar en su uso como lo es almacenar la data en una base de datos local, con lo que se límita el uso de la api, ya que a diario solo se te permite un número límitado de consultas.

## PASOS PARA CONSEGUIR LA API
Este es uno de los pasos más sencillos, solo debes registrar tu cuenta en la página web de https://www.coinmarketcap.com/api/. Allí con tu correo una vez que lo verifiques te llegará un código de validación que debes introducir y listo, ya tienes acceso a tu plan básico.

Una vez que tengas acceso a tu plan solo debes sustituir tu api key en la sección del código que esta demarcado.

## USOS QUE LE PODEMOS DAR AL SCRIPT 
Con este script ya tienes acceso a la información que entrega la API de CoinmarketCap, sin embargo, el numero de consultas es límitado como se comentó anteriormente, por lo que recomendamos que la información se almacene en una base de datos periodicamente. Para esto debes crear un proceso en el servidor en donde se ejecute de forma automatica el script cada cierto tiempo, y tu recuperar la información a traves de una consulta a tu base de datos.

En este caso, les voy a mostrar como guardar la información en la BDD y que la puedan recuperar a una tabla con estilos.


## DONACIONES
Si crees que este código es de utilidad y quieres dar una donación, puedes hacerlo a la siguiente billetera:

Red: TR20 (Tron)
Dirección: TAzU3SEgFfUubtqxbH2fYGRW4G7tN3fY5o


 
