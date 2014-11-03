<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * resizeImage helper
 *
 * Características:
 * - Sirve para obtener una imagen del tamaño que se epecifiquen en los parámetros, 
 * a partir de una imagen de mayor tamaño
 *
 * @package     resizeImage
 * @subpackage  Helpers
 * @category    Helpers
 * @author      Eric Bravo
 * @version     1.0 (CI 2.x & CI 1.x. Creado en Mayo, 12 2014)
 * @copyright   Copyright (c) 2013-2015 Eric Bravo, IT Citrus
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */


if ( ! function_exists( 'imagenGD' ) ){ // Permite la redimensión mediante GD
    function imagenGD( $img, $width1, $height1, $fileFinal, $ext ) {
        switch ( $ext ){
            case "png":
                $image = imagecreatefrompng( $img ); 
                break;
            case "gif":
                $image = imagecreatefromgif( $img );
                break;
            default:
                $image = imagecreatefromjpeg( $img );
                break;
        }

        list( $widthO, $heightO ) = @getimagesize( $img );
        $source_aspect_ratio = $widthO / $heightO;
        $desired_aspect_ratio = $width1 / $height1;

        if($source_aspect_ratio > 1 ) // si el original es landscape, la salida debe ser landscape
        {
            if($desired_aspect_ratio < 1) // si el deseado no es landscape, cruzar las dimensiones para cambiar el aspecto
            {
                $t_width = $height1;
                $t_height = $width1;
                $height1 = $t_height;
                $width1 = $t_width;
            }
        }

        if($source_aspect_ratio < 1 ) // si el original es portrait, la salida debe ser portrait
        {
            if($desired_aspect_ratio > 1) // si el deseado es landscape, cruzar las dimensiones para cambiar el aspecto
            {
                $t_width = $height1;
                $t_height = $width1;
                $height1 = $t_height;
                $width1 = $t_width;
            }
        }

        
            if ($source_aspect_ratio > $desired_aspect_ratio) { 
                /*
                 * Triggered when source image is wider
                 */
                $temp_height = $height1;
                $temp_width = ( int ) ($height1 * $source_aspect_ratio);
            } else {
                /*
                 * Triggered otherwise (i.e. source image is similar or taller)
                 */
                $temp_width = $width1;
                $temp_height = ( int ) ($width1 / $source_aspect_ratio);
            }

        $tmp = imagecreatetruecolor( $temp_width, $temp_height );
        imagecopyresampled( $tmp, $image, 0, 0, 0, 0, $temp_width, $temp_height, $widthO, $heightO );
        imagedestroy( $image );

        $x0 = ($temp_width - $width1) / 2;
        $y0 = ($temp_height -  $height1) / 2;
        $desired_gdim = imagecreatetruecolor($width1, $height1);
        imagecopy(
            $desired_gdim,
            $tmp,
            0, 0,
            $x0, $y0,
            $width1, $height1
            );

        switch ( $ext ){
            case "png":
                imagepng( $desired_gdim, $fileFinal ); 
                break;
            case "gif":
                imagegif( $desired_gdim, $fileFinal );  
                break;
            default:
                $calidad = 95;
                imagejpeg( $desired_gdim, $fileFinal, $calidad ); 
                break;
        }

       
    }
}

if( ! function_exists( 'imagenMagick' ) ){ // Permite la redimensión mediante Imagik
    function imagenMagick( $img, $width1, $height1, $widthO, $heightO, $fileFinal ){
        $newImg = new Imagick( $img );

        //landscape
        if ( $widthO > $heightO ){
            $newImg->scaleImage( 0, $height1 );
            $type = 2;

        //portrait  
        } elseif ( $widthO < $heightO ){

            $newImg->scaleImage( $width1, 0 );
            $type = 1;
        //ninguno
        } else{ 
            $newImg->scaleImage( $width1, $height1 );
            $type = 3;
        }

        $is = $newImg->getImageGeometry();
        $aW = $is['width']-$width1;
        $aH = $is['height']-$height1;

        switch( $type ){
            case 1:
                $x = 0;
                $y = $aH/2;
                break;
            case 2:
                $y = 0;
                $x = $aW/2;
                break;
            default:
                $x = 0;
                $y = 0;
                break;
        }

        $newImg->cropImage( $width1, $height1, $x, $y );
        $newImg->writeImage( $fileFinal );
        unset( $newImg );  
    }
}

if( ! function_exists( 'resizeImg' ) ){ // Permite la redimensión de imágenes dependiendo si existe GD o Imagik
        function resizeImg( $img, $tamanos){
        
        $nuevas_img = array();
        $sizeImg  = $tamanos;
        
        $division_de_ruta = explode( '.', $img );
        $ext = end( $division_de_ruta );
        
        extract( pathinfo( $img ) );
        $mainFile=file_get_contents( $img );
        $apppath = get_site_url();
        $resizepath = '/wp-content/uploads/resizes/';
        
        $loaded = file_put_contents( ".." . $resizepath . md5( $img ). "." .$ext, $mainFile );
        list( $widthO, $heightO) = getimagesize( ".." . $resizepath . md5( $img ). "." .$ext );
        $img_inicial = ".." . $resizepath . md5( $img ) . "." .$ext;

        //recorremos el arreglo que contiene los tamaños de las imagenes 
        $i = 0;
        foreach ( $sizeImg as $key => $size ){
            $aux = $resizepath . md5( $img ) . "_" .$size. "." .$ext;
            $fileFinal = '..' . $aux;
            list( $width1, $height1 ) = explode( 'x', $size );
            $nuevas_img[$i] = $apppath . $aux;
            if( ! file_exists ( '..' . $resizepath . md5( $img ) . '_' . $size . '.'. $ext ) ):     
                //identificamos la existencia de imagick 
                if ( extension_loaded( 'imagick' ) ){
                    
                    imagenMagick( $img_inicial, $width1, $height1, $widthO, $heightO, $fileFinal );
                } else {
                    
                    imagenGD( $img_inicial, $width1, $height1, $fileFinal, $ext);
                }
            endif;
            $i++;
        }
        unlink( $img_inicial );
        return $nuevas_img;
    }
}


/* End of file resize_image_helper.php */
/* Location: ./system/helpers/resize_image_helper.php */

?>