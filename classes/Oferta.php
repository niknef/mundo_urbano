<?PHP
    class Oferta {
        private $id;
        private $temporada;
        private $anio;
        private $descuento;

        /**
         * Devuelve oferta por id
         * 
         * @param int $id El id de la oferta a buscar
         * @return Oferta|null El objeto Oferta o `null` si no se encuentra
         */
        public static function get_x_id(int $id): ?Oferta
        {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM oferta WHERE id = ?";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute([$id]);

            // `fetch()` devuelve un único objeto o `false` si no hay resultados.
            $result = $PDOStatement->fetch();

            return $result ?: null; // Devuelve el objeto o `null`
        }

        /**
         * Edita una oferta en la base de datos
         * 
         * @param string $temporada La temporada de la oferta
         * @param string $anio El año de la oferta
         * @param int $descuento El descuento de la oferta
         */
        public function edit(?string $temporada, ?string $anio, int $descuento){
            $conexion = Conexion::getConexion();
            $query = "UPDATE oferta SET temporada = :temporada, anio = :anio, descuento = :descuento WHERE id = :id";

            $PDOStatement = $conexion->prepare($query);
            $result = $PDOStatement->execute([
                'temporada' => $temporada,
                'anio' => $anio,
                'descuento' => $descuento,
                'id' => $this->id
            ]);

            return $result;
        }

        
        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of temporada
         */ 
        public function getTemporada()
        {
            return $this->temporada;
        }

        /**
         * Set the value of temporada
         *
         * @return  self
         */ 
        public function setTemporada($temporada)
        {
            $this->temporada = $temporada;

            return $this;
        }

        /**
         * Get the value of anio
         */ 
        public function getAnio()
        {
            return $this->anio;
        }

        /**
         * Set the value of anio
         *
         * @return  self
         */ 
        public function setAnio($anio)
        {
            $this->anio = $anio;

            return $this;
        }

        /**
         * Get the value of descuento
         */ 
        public function getDescuento()
        {
            return $this->descuento;
        }

        /**
         * Set the value of descuento
         *
         * @return  self
         */ 
        public function setDescuento($descuento)
        {
            $this->descuento = $descuento;

            return $this;
        }
    }
?>