<?PHP

class Imagen
{
    /**
     * Sube una imagen al servidor en un directorio especificado.
     *
     * @param string $directorio El directorio donde se almacenará la imagen.
     * @param array $datosArchivo Información del archivo proporcionada por $_FILES (contiene 'name', 'tmp_name', etc.).
     * 
     * @throws Exception Si no se puede subir la imagen.
     * 
     * @return string El nombre del archivo generado (incluyendo la extensión).
     */
    public static function subirImagen($directorio, $datosArchivo): string
    {

        //le damos un nuevo nombre
        $og_name = (explode(".", $datosArchivo['name']));
        $extension = end($og_name);
        $filename = time() . ".$extension";


        $fileUpload = move_uploaded_file(
            $datosArchivo['tmp_name'],
            "$directorio/$filename"
        );


        if (!$fileUpload) {
            throw new Exception("No se pudo subir la imagen 😕");
        } else {
            return $filename;
        }
    }

    /**
     * Elimina una imagen del servidor.
     *
     * @param string $archivo La ruta completa del archivo que se desea eliminar.
     * 
     * @throws Exception Si el archivo existe pero no se puede eliminar.
     * 
     * @return bool Devuelve TRUE si el archivo fue eliminado correctamente, 
     *              FALSE si el archivo no existe.
     */
    public static function borrarImagen($archivo): bool
    {

        if (file_exists($archivo)) {

            $fileDelete =  unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se pudo eliminar la imagen 😕");
            } else {
                return TRUE;
            }
        }else{
            return FALSE;
        }
    }
}
