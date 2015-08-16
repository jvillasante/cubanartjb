<?php

Bundle::start('plant');

class Seed_Paintings extends \S2\Seed {
  private $paintings;
  private $tags;
  private $authors;
  private $comments;

  public function __construct() {
    $this->tags = array('Serie de lo Subliminal', 'Cartulina', 'Lienzo', 'Serie Animal', 'Serie el Bloque', 'Serie Camino');
    $this->authors = array('', 'Juan L. Brouwer', 'Oscar J. Jacas');
    $this->comments = array('Monlusce lfersa eronerts ler kertase. Lorem ipsum dolor sit amet consect- etuer adipiscing praesent vestibulum molestiet lacuenean fuscem suscipit varius micum sociis natoque penatibuset magnis dis.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
    $this->paintings = array(
      // Juan L. Brouwer
      array(
        'name' => 'Ciudad Calcinada',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/aa992922d5531f8c18e68c9b0e3ef47c3b2eabd5',
      ),
      array(
        'name' => 'Ciudad en Rojo',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/cfd1438daf02bcbc4e2b8f6b69b83297f239a815',
      ),
      array(
        'name' => 'El bien y el mal',
        'dimensions' => '35 x 40.5 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/e435ff3aaa6868a89c0104ecfe39c098d386e212',
      ),
      array(
        'name' => 'Equilibrio',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/224f2d9b339cecdb2f1d3b78bb887bf998977ce0',
      ),
      array(
        'name' => 'Estacionamiento',
        'dimensions' => '80 x 83 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/bb9f8daffd22fc9c7eedf4c71929e8b7c798e6ee',
      ),
      array(
        'name' => 'Estado de Gracia',
        'dimensions' => '100 x 130 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/adfd7e02326b4a3002427db4db89450ab218cf32',
      ),
      array(
        'name' => 'Interior',
        'dimensions' => '100 x 90 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/1dd68e5c21e5a83b2707c28202c36423c03b04dd',
      ),
      array(
        'name' => 'Pistola',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/97aec79c85cf519745f3a3c24de4b653e9a86f71',
      ),
      array(
        'name' => 'Sectores',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/62051e7ffdb0ea228440c2567675412cd92b2d02',
      ),
      array(
        'name' => 'Secuencia',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/433b5106c905e4103eb6839f16c5446d540440ea',
      ),
      array(
        'name' => 'Serie Columnas. No 3. Agudeza',
        'dimensions' => '100 x 133 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/4f6e989b78429c7574fc39b1f5a4e1d303f9880a',
      ),
      array(
        'name' => 'Serie de lo Subliminal. No 1',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/656744773f4aa5c8e476b0ea8714aa2de1980662',
      ),
      array(
        'name' => 'Serie Disolución No 3',
        'dimensions' => '67 x 65.5 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2011,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/b0b7bda998469f1c19dd7b1c9b7a36535fe13e13',
      ),
      array(
        'name' => 'Serie Disolución. No 2',
        'dimensions' => '45.5 x 45.5 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2011,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/8af3d624a8402421ef1af9da72b5a63562d4bb93',
      ),
      array(
        'name' => 'Serie Disolución. No 4',
        'dimensions' => '50 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/c2cf1de4ea1dad5bb885509a77bdf3c333c32c00',
      ),
      array(
        'name' => 'Serie Disolución. No 5',
        'dimensions' => '50 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/13a55a8c6e028460a7258a17f1f632554f2bd678',
      ),
      array(
        'name' => 'Serie Disoución. No 6',
        'dimensions' => '33 x 33.5 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/d606d5499a7cd2a5e935ee81b6dea9ed26db8798',
      ),
      array(
        'name' => 'Serie Disolución No 1',
        'dimensions' => '91 x 110 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2011,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/14de170eec4bc59a3772bec4393c0ccf41d8d94a',
      ),
      array(
        'name' => 'To be or not to be',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/6025f94596c2445f0a776d9bac929829de3c948d',
      ),
      array(
        'name' => 'Transparency Inside',
        'dimensions' => '50 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(1),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/60f8fe46572ddf74fae3eaa175d74f687ab54d9f',
      ),

      // Oscar J. Jacas
      array(
        'name' => 'A prueba de bala',
        'dimensions' => '80 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/109fd1b9b202bf067ad41aabe2f0d41f8ad83c66',
      ),
      array(
        'name' => 'Agua pasada no mueve molino',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/84cb86a6c52cd3ce1d007e820963dcccc999f135',
      ),
      array(
        'name' => 'Coliseo',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/c4e327b21afbfd7200c8b108f8d77721bb303562',
      ),
      array(
        'name' => 'Densidad',
        'dimensions' => '70.5 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/6af8c038f7482f576c508abe8f2f94b1d6d3736a',
      ),
      array(
        'name' => 'Distancia',
        'dimensions' => '80 x 82 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/3975ce41a954b03acf3a7689035b9b9f47d8900f',
      ),
      array(
        'name' => 'Dos puertas',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/ac8dece7a4898f37be6011722ea2961fc13bded8',
      ),
      array(
        'name' => 'Fundición',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/97b235c835c09a7413c6357fc7b455ea9a0e195c',
      ),
      array(
        'name' => 'Influencia externa',
        'dimensions' => '33.5 x 40 cmm',
        'type' => 'Tempera sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/1b415544ed9ce54f0f28687daae86fe761ae18ab',
      ),
      array(
        'name' => 'Inframundo',
        'dimensions' => '50 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/e4dd04fcd75b8e3aae7534d9a05726a336554129',
      ),
      array(
        'name' => 'Intersecciones',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/c3e575e1f5f35f0b7a6fc3fa86656b538e883983',
      ),
      array(
        'name' => 'Límite al cielo',
        'dimensions' => '33 x 33.5 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/136457d73c339508b5b07a9b2d29609643b8f0d8',
      ),
      array(
        'name' => 'Niveles del subconciente',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/7ee00d3d2fe002cb25f3bae4909623a843c24f0b',
      ),
      array(
        'name' => 'Orillas',
        'dimensions' => '105 x 133 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/5b9351d34d2b5784fdadb675d79983296e1663fd',
      ),
      array(
        'name' => 'Reflejo azul',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/c7bb275299f079e37ecaa84ed4133612332cdfd2',
      ),
      array(
        'name' => 'Reflejos',
        'dimensions' => '70 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/f039761754933a9cf3701c6fb2c3068878485192',
      ),
      array(
        'name' => 'Serie Animal. No 1. Toy horse',
        'dimensions' => '65 x 34.5 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/4e0c4fbf143463d51e11e6119a19863a278c98b3',
      ),
      array(
        'name' => 'Serie Animal. No 2. Animal mitológico',
        'dimensions' => '32.5 x 33.5 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/236111d07e8715bbffd37d98629eebd2651a2c18',
      ),
      array(
        'name' => 'Serie Animal. No 5. Fósil',
        'dimensions' => '50 x 33.5 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/ad4c80f027b67311853082f2a31f5165b3c9348d',
      ),
      array(
        'name' => 'Serie Camino. No 1',
        'dimensions' => '100 x 130 cmm',
        'type' => 'Acrílico sobre Lienzo',
        'painter' => $this->getAuthor(2),
        'year' => 2011,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/b6b6c4f7d9d933ef892df79b8986aa4e8c61ce49',
      ),
      array(
        'name' => 'Serie de lo Subliminal. No 4. Reflejos de la Ciudad',
        'dimensions' => '50 x 70 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/17b2827b1a98892b70b849d8043a3c3e62bead0a',
      ),
      array(
        'name' => 'Serie el Bloque. No 5. Reflejo nocturno',
        'dimensions' => '50 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/5f6b069b34f38431d38194bd65ded6b548e347f8',
      ),
      array(
        'name' => 'Serie el Bloque.No 4. Yunque',
        'dimensions' => '50 x 50 cmm',
        'type' => 'Acrílico sobre Cartulina',
        'painter' => $this->getAuthor(2),
        'year' => 2012,
        'comment' => $this->getComment(),
        'image_path' => URL::base().'/uploads/paintings/0fef9d2e73a0def95d24eba4aec17fc439f350cd',
      ),
    );
  }

  public function grow() {
    foreach ($this->paintings as $painting) {
      $p = new Painting;
      $p->name = $painting['name'];
      $p->dimensions = $painting['dimensions'];
      $p->type = $painting['type'];
      $p->painter = $painting['painter'];
      $p->year = $painting['year'];
      $p->comment = $painting['comment'];
      $p->image_path = $painting['image_path'];
      $p->save();
      $p->tag($this->getTags());
    }
  }

  private function getTags() {
    $keys = array_rand($this->tags, rand(2, count($this->tags) - 1));
    $result = array();

    foreach ($keys as $key) {
      $result[]= $this->tags[$key];
    }

    return $result;
  }

  public function getAuthor($index) {
    return $this->authors[$index];
  }

  public function getComment() {
    $index = array_rand($this->comments, 1);
    return $this->comments[$index];
  }

  public function order() {
    return 2;
  }
}


