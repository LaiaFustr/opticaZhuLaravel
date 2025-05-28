<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AmpliacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores =[
            ['nif' => '98258036A', 'nombre' => 'Gafas Primas Guerrero', 'direccion' => 'Calle del Lugar Real 12', 'correo' => 'gpgafas@gmail.com', 'telefono' => '612253284', 'codPostal' => '02598'],
            ['nif' => '59764895E', 'nombre' => 'MarcoGafa S.L.', 'direccion' => 'Avenida Mora Azul', 'correo' => 'carla42@gmail.com', 'telefono' => '612202643', 'codPostal' => '32794'],
            ['nif' => '47010457Z', 'nombre' => 'GafaX S.A.', 'direccion' => 'Calle Miopio 9', 'correo' => 'gafaxsa@hotmail.com', 'telefono' => '679031931', 'codPostal' => '45369'],
            ['nif' => '26611894M', 'nombre' => 'GafeGafa', 'direccion' => 'Plaza del Estigma', 'correo' => 'gafegafa@gmail.com', 'telefono' => '637125440', 'codPostal' => '37839'],
            ['nif' => '28187881S', 'nombre' => 'Exfolium', 'direccion' => 'Calle Cien Prereal', 'correo' => 'exfolium@gmail.com', 'telefono' => '655516451', 'codPostal' => '81994'],
       
        ];

        $articulos = [
            ['nombre' => 'Gafa Marco Azul', 'descripcion' => 'Gafas con marco de color azul', 'stock' => 20, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 1],
            ['nombre' => 'Gafa Marco Rojo', 'descripcion' => 'Gafas con marco de color rojo', 'stock' => 25, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 1],
            ['nombre' => 'Gafa Marco Negro', 'descripcion' => 'Gafas con marco de color negro', 'stock' => 25, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 1],
            ['nombre' => 'Gafa Marco Metalico', 'descripcion' => 'Gafas con marco metalico de aluminio', 'stock' => 25, 'precio' => 39.99, 'idProveedor' => 2, 'idOptica' => 1],
            ['nombre' => 'Gafa Marco Transparente', 'descripcion' => 'Gafas con marco transparente', 'stock' => 43, 'precio' => 34.99, 'idProveedor' => 2, 'idOptica' => 1],
            ['nombre' => 'Gafa Marco Con Patron', 'descripcion' => 'Gafas con marco de varios colores siguiendo un patron', 'stock' => 98, 'precio' => 35.99, 'idProveedor' => 2, 'idOptica' => 1],
            ['nombre' => 'Gafa de Sol', 'descripcion' => 'Gafas cuadradas de sol', 'stock' => 45, 'precio' => 24.99, 'idProveedor' => 3, 'idOptica' => 1],
            ['nombre' => 'Gafa de Sol Marco 2', 'descripcion' => 'Gafas redondas de sol', 'stock' => 72, 'precio' => 24.99, 'idProveedor' => 3, 'idOptica' => 1],
            ['nombre' => 'Gafa de Sol Graduada', 'descripcion' => 'Gafas cuadradas de sol graduadas', 'stock' => 90, 'precio' => 34.99, 'idProveedor' => 3, 'idOptica' => 1],
            ['nombre' => 'Gafa de Niño Verde', 'descripcion' => 'Gafas para niño/a de color verde', 'stock' => 74, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 1],
            ['nombre' => 'Gafa de Niño Azul', 'descripcion' => 'Gafas para niño/a de color azul', 'stock' => 46, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 1],
            ['nombre' => 'Gafa de Niño Rosa', 'descripcion' => 'Gafas para niño/a de color rosa', 'stock' => 19, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 1],
            ['nombre' => 'Paño Limpia Gafas', 'descripcion' => 'Paño reutilizable para limpiar gafas', 'stock' => 90, 'precio' => 4.99, 'idProveedor' => 5, 'idOptica' => 1],
            ['nombre' => 'Spray Liquido Limpia Gafas', 'descripcion' => 'Spray con liquido limpiagafas en un bote de 50ml', 'stock' => 18, 'precio' => 9.99, 'idProveedor' => 5, 'idOptica' => 1],
            ['nombre' => 'Estuche Para Gafas', 'descripcion' => 'Estuche para gafas en color negro', 'stock' => 18, 'precio' => 14.99, 'idProveedor' => 5, 'idOptica' => 1],
        
            ['nombre' => 'Gafa Marco Azul', 'descripcion' => 'Gafas con marco de color azul', 'stock' => 68, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 2],
            ['nombre' => 'Gafa Marco Rojo', 'descripcion' => 'Gafas con marco de color rojo', 'stock' => 53, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 2],
            ['nombre' => 'Gafa Marco Negro', 'descripcion' => 'Gafas con marco de color negro', 'stock' => 49, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 2],
            ['nombre' => 'Gafa Marco Metalico', 'descripcion' => 'Gafas con marco metalico de aluminio', 'stock' => 59, 'precio' => 39.99, 'idProveedor' => 2, 'idOptica' => 2],
            ['nombre' => 'Gafa Marco Transparente', 'descripcion' => 'Gafas con marco transparente', 'stock' => 92, 'precio' => 34.99, 'idProveedor' => 2, 'idOptica' => 2],
            ['nombre' => 'Gafa Marco Con Patron', 'descripcion' => 'Gafas con marco de varios colores siguiendo un patron', 'stock' => 98, 'precio' => 35.99, 'idProveedor' => 2, 'idOptica' => 2],
            ['nombre' => 'Gafa de Sol', 'descripcion' => 'Gafas cuadradas de sol', 'stock' => 10, 'precio' => 24.99, 'idProveedor' => 3, 'idOptica' => 2],
            ['nombre' => 'Gafa de Sol Marco 2', 'descripcion' => 'Gafas redondas de sol', 'stock' => 10, 'precio' => 24.99, 'idProveedor' => 3, 'idOptica' => 2],
            ['nombre' => 'Gafa de Sol Graduada', 'descripcion' => 'Gafas cuadradas de sol graduadas', 'stock' => 10, 'precio' => 34.99, 'idProveedor' => 3, 'idOptica' => 2],
            ['nombre' => 'Gafa de Niño Verde', 'descripcion' => 'Gafas para niño/a de color verde', 'stock' => 74, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 2],
            ['nombre' => 'Gafa de Niño Azul', 'descripcion' => 'Gafas para niño/a de color azul', 'stock' => 46, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 2],
            ['nombre' => 'Gafa de Niño Rosa', 'descripcion' => 'Gafas para niño/a de color rosa', 'stock' => 19, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 2],
            ['nombre' => 'Paño Limpia Gafas', 'descripcion' => 'Paño reutilizable para limpiar gafas', 'stock' => 90, 'precio' => 4.99, 'idProveedor' => 5, 'idOptica' => 2] ,
            ['nombre' => 'Spray Liquido Limpia Gafas', 'descripcion' => 'Spray con liquido limpiagafas en un bote de 50ml', 'stock' => 18, 'precio' => 9.99, 'idProveedor' => 5, 'idOptica' => 2],
            ['nombre' => 'Estuche Para Gafas', 'descripcion' => 'Estuche para gafas en color negro', 'stock' => 18, 'precio' => 14.99, 'idProveedor' => 5, 'idOptica' => 2],

            ['nombre' => 'Gafa Marco Azul', 'descripcion' => 'Gafas con marco de color azul', 'stock' => 68, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 3],
            ['nombre' => 'Gafa Marco Rojo', 'descripcion' => 'Gafas con marco de color rojo', 'stock' => 53, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 3],
            ['nombre' => 'Gafa Marco Negro', 'descripcion' => 'Gafas con marco de color negro', 'stock' => 49, 'precio' => 39.99, 'idProveedor' => 1, 'idOptica' => 3],
            ['nombre' => 'Gafa Marco Metalico', 'descripcion' => 'Gafas con marco metalico de aluminio', 'stock' => 19, 'precio' => 39.99, 'idProveedor' => 2, 'idOptica' => 3],
            ['nombre' => 'Gafa Marco Transparente', 'descripcion' => 'Gafas con marco transparente', 'stock' => 12, 'precio' => 34.99, 'idProveedor' => 2, 'idOptica' => 3],
            ['nombre' => 'Gafa Marco Con Patron', 'descripcion' => 'Gafas con marco de varios colores siguiendo un patron', 'stock' => 21, 'precio' => 34.99, 'idProveedor' => 2, 'idOptica' => 3],
            ['nombre' => 'Gafa de Sol', 'descripcion' => 'Gafas cuadradas de sol', 'stock' => 45, 'precio' => 24.99, 'idProveedor' => 3, 'idOptica' => 3],
            ['nombre' => 'Gafa de Sol Marco 2', 'descripcion' => 'Gafas redondas de sol', 'stock' => 72, 'precio' => 24.99, 'idProveedor' => 3, 'idOptica' => 3],
            ['nombre' => 'Gafa de Sol Graduada', 'descripcion' => 'Gafas cuadradas de sol graduadas', 'stock' => 90, 'precio' => 34.99, 'idProveedor' => 3, 'idOptica' => 3],
            ['nombre' => 'Gafa de Niño Verde', 'descripcion' => 'Gafas para niño/a de color verde', 'stock' => 74, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 3],
            ['nombre' => 'Gafa de Niño Azul', 'descripcion' => 'Gafas para niño/a de color azul', 'stock' => 46, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 3],
            ['nombre' => 'Gafa de Niño Rosa', 'descripcion' => 'Gafas para niño/a de color rosa', 'stock' => 19, 'precio' => 34.99, 'idProveedor' => 4, 'idOptica' => 3],
            ['nombre' => 'Paño Limpia Gafas', 'descripcion' => 'Paño reutilizable para limpiar gafas', 'stock' => 90, 'precio' => 4.99, 'idProveedor' => 5, 'idOptica' => 3],
            ['nombre' => 'Spray Liquido Limpia Gafas', 'descripcion' => 'Spray con liquido limpiagafas en un bote de 50ml', 'stock' => 18, 'precio' => 9.99, 'idProveedor' => 5, 'idOptica' => 3],
            ['nombre' => 'Estuche Para Gafas', 'descripcion' => 'Estuche para gafas en color negro', 'stock' => 18, 'precio' => 14.99, 'idProveedor' => 5, 'idOptica' => 3],
        ];

        $pedidos = [
            ['fecha' => '2025-06-14', 'estado' => 'pendiente', 'total'=> 249.80, 'idProveedor' => 5, 'idOptica' => 1],//
            ['fecha' => '2025-06-14', 'estado' => 'pendiente', 'total'=> 1699.40, 'idProveedor' => 3, 'idOptica' => 2],
            ['fecha' => '2025-06-15', 'estado' => 'pendiente', 'total'=> 224.85, 'idProveedor' => 4, 'idOptica' => 3],
            ['fecha' => '2025-06-17', 'estado' => 'pendiente', 'total'=> 1384.62, 'idProveedor' => 2, 'idOptica' => 3],
            ['fecha' => '2025-06-17', 'estado' => 'pendiente', 'total'=> 199.95, 'idProveedor' => 1, 'idOptica' => 1],
        ];

        $detallepedidos =[
            ['idPedido' => 1, 'idArticulo' => 15, 'cantidad' => 10, 'precio' => 14.99, 'subtotal' => 149.90],
            ['idPedido' => 1, 'idArticulo' => 14, 'cantidad' => 10, 'precio' => 9.99, 'subtotal' => 99.90],
            ['idPedido' => 2, 'idArticulo' => 22, 'cantidad' => 20, 'precio' => 24.99, 'subtotal' => 499.80],
            ['idPedido' => 2, 'idArticulo' => 23, 'cantidad' => 20, 'precio' => 24.99, 'subtotal' => 499.80],
            ['idPedido' => 2, 'idArticulo' => 24, 'cantidad' => 20, 'precio' => 34.99, 'subtotal' => 699.80],
            ['idPedido' => 3, 'idArticulo' => 45, 'cantidad' => 15, 'precio' => 14.99, 'subtotal' => 224.85],
            ['idPedido' => 4, 'idArticulo' => 34, 'cantidad' => 11, 'precio' => 39.99, 'subtotal' => 439.89],
            ['idPedido' => 4, 'idArticulo' => 35, 'cantidad' => 18, 'precio' => 34.99, 'subtotal' => 629.82],
            ['idPedido' => 4, 'idArticulo' => 36, 'cantidad' => 9, 'precio' => 34.99, 'subtotal' => 314.91],
            ['idPedido' => 5, 'idArticulo' => 1, 'cantidad' => 5, 'precio' => 39.99, 'subtotal' => 199.95],
        ];

        DB::table("proveedores")->insert($proveedores);
        DB::table('articulos')->insert($articulos);
        DB::table('pedidos')->insert($pedidos);
        DB::table('detallepedidos')->insert($detallepedidos);

    }
}
