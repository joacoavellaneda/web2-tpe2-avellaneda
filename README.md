# AVELLANEDA JOAQUIN TPE2 WEB2 API
tabla de productos renderizada desde el servidor.

## Importar la base de datos
- importar desde PHPMyAdmin (o cualquiera) database/db_tpe.php

El endpoint de la API es: http://localhost/web2-tpe2-avellaneda/api/products


## Campos de la tabla:

- id
- name
- price
- color
- size
- description
- id_category



## GET: 

[GET]  - (Trae todos los productos) -

        http://localhost/web2-tpe2-avellaneda/api/products


[GET:ID] -(Accede a un producto por su id)-
        
        http://localhost/web2-tpe2-avellaneda/api/products/:ID


## GET: OPCIONALES
[GET/ORDER/SORT] -(Ordena ascendete (asc) o descendente (desc) los campos de la tabla)-
            se debe de elejir entre:

            - asc
            - desc

            - Varible: order
            - Varible: field

         http://localhost/web2-tpe2-avellaneda/api/products?sort=price&orden=asc


[GET/FILTERNAME] -(Filtra por nombre o marca de producto)-
        
        http://localhost/web2-tpe2-avellaneda/api/products?filtername=helmet


[GET/PAGINAR] -(Muestra la cantidad de productos (limit) por pagina (page))-
        
        http://localhost/web2-tpe2-avellaneda/api/products?page=2&limit=3


## DELETE:


[DEL:ID]- -(Elimina un producto por el id seleccionado)-

        http://localhost/web2-tpe2-avellaneda/api/products/:ID




## POST & PUT:


[PUT:ID] (lee el contenido del body y edita los datos del producto con el id seleccionado)

         http://localhost/api-productTPE/api/products/:ID


[POST] (Este metodo lee el contenido del body y agrega un nuevo producto a la base de datos)

         http://localhost/api-productTPE/api/products

-Para hacer un POST o un PUT se deben ingresar los datos con el siguiente formato:

EJEMPLO:

        {
        "id_products": 106,
        "name": "C.A.M.P. Energy CR-3 Harness - Men's",
        "price": 50,
        "color": "#4ca545",
        "size": "l",
        "description": " Thermoformed padding molds to your body for comfort Adjustable leg loops let you fine-tune the fit4 webbing-reinforced gear loops and a haul loop Certified by the International Climbing and Mountaineering Federation: CE EN 12277, type C.nImported",
        "id_category": 2
    }


