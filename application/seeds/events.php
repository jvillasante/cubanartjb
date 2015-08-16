<?php

Bundle::start('plant');

class Seed_Events extends \S2\Seed {
  private $events;

  public function __construct() {
    $this->events = array(
      array(
        'name' => 'Exposición: Grupo "Espacio Azul"',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, 12, 22, 1997)),
        'description' => 'En esta ocasión la muestra estará integrada por 13 plásticos que darán a conocer desde diversas estéticas sus más recientes obras integrándose  con la de pintores que tienen un presupuesto estético sólido pero enmarcado en una  etapa anterior de la Plástica Cubana. Grupo "Espacio Azul" Está formado por artistas de diversas tendencias y generaciones distintas. Está encabezado por el pintor Marcos Peña quien pinta desde hace más de 40 años y de quien Carlos Enríquez pintor cubano dijera: ...Es una joven promesa y habrá que contar con el en lo adelante. Este propósito ha sido unir a muchos con el fin de yuxtaponer resultados que sin querer se re contextualizan logrando exposiciones con discursos diferentes posibilitando un diálogo que apuesta por la pluralidad tan necesaria.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
      array(
        'name' => 'Neque porro quisquam est qui',
        'place' => 'Galería de la Revista Bohemia. La Habana. Cuba.',
        'event_date' => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(2000, 2013))),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      ),
    );
  }

  public function grow() {
    foreach ($this->events as $event) {
      $e = new GroupEvent;
      $e->name = $event['name'];
      $e->place = $event['place'];
      $e->event_date = $event['event_date'];
      $e->description = $event['description'];
      $e->save();
    }
  }

  public function order() {
    return 5;
  }
}
