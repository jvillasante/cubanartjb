<?php

class Search {
  public static function search_paintings($q) {
    $cleaner = new Cleaner();
    $cleaned_array = $cleaner->parseString($q);
    $stemmed_array = array_map('PorterStemmer::Stem', $cleaned_array);

    $paintings = Painting::with('tags')->distinct();
    $paintings = $paintings->where(function($query) use ($stemmed_array) {
      $query->where('name', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('name', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $paintings = $paintings->or_where(function($query) use ($stemmed_array) {
      $query->where('dimensions', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('dimensions', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $paintings = $paintings->or_where(function($query) use ($stemmed_array) {
      $query->where('type', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('type', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $paintings = $paintings->or_where(function($query) use ($stemmed_array) {
      $query->where('painter', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('painter', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $paintings = $paintings->or_where(function($query) use ($stemmed_array) {
      $query->where('year', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('year', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $paintings = $paintings->or_where(function($query) use ($stemmed_array) {
      $query->where('comment', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('comment', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });

    $paintings = $paintings->order_by('created_at', 'DESC');
    $paintings = $paintings->paginate(Config::get('app.paginator_count'));

    return array(implode(' ', $cleaned_array), $paintings);
  }

  public static function search_events($q) {
    $cleaner = new Cleaner();
    $cleaned_array = $cleaner->parseString($q);
    $stemmed_array = array_map('PorterStemmer::Stem', $cleaned_array);

    $events = GroupEvent::distinct();
    $events = $events->where(function($query) use ($stemmed_array) {
      $query->where('name', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('name', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $events = $events->or_where(function($query) use ($stemmed_array) {
      $query->where('place', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('place', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $events = $events->or_where(function($query) use ($stemmed_array) {
      $query->where('event_date', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('event_date', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $events = $events->or_where(function($query) use ($stemmed_array) {
      $query->where('description', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('description', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });

    $events = $events->order_by('created_at', 'DESC');
    $events = $events->paginate(Config::get('app.paginator_count'));

    return array(implode(' ', $cleaned_array), $events);
  }

  public static function search_users($q) {
    $cleaner = new Cleaner();
    $cleaned_array = $cleaner->parseString($q);
    $stemmed_array = array_map('PorterStemmer::Stem', $cleaned_array);

    $users = User::with('metadata')->distinct();
    $users = $users->where(function($query) use ($stemmed_array) {
      $query->where('username', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('username', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $users = $users->or_where(function($query) use ($stemmed_array) {
      $query->where('email', 'LIKE', '%'.array_get($stemmed_array, 0).'%');
      for ($i = 1; $i < count($stemmed_array); $i++) {
        $query->or_where('email', 'LIKE', '%'.array_get($stemmed_array, $i).'%');
      }
    });
    $users = $users->order_by('created_at', 'DESC');
    $users =  $users->paginate(Config::get('smarttoys.records_per_page'));

    return array(implode(' ', $cleaned_array), $users);
  }
}

class Cleaner {
  private $symbols = array('/','\\','\'','"',',','.','<','>','?',';',':','[',']','{','}','|','=','+','-','_',')','(','*', '&','^','%','$','#','@','!','~','`'	);
  private $stopwords;

  public function __construct() {
    if (Config::get('application.language') == 'en') {
      $this->stopwords = array('a', 'about', 'above', 'above', 'across', 'after', 'afterwards', 'again', 'against', 'all', 'almost', 'alone', 'along', 'already', 'also','although','always','am','among', 'amongst', 'amoungst', 'amount',   'an', 'and', 'another', 'any','anyhow','anyone','anything','anyway', 'anywhere', 'are', 'around', 'as',  'at', 'back',   'be','became', 'because','become','becomes', 'becoming', 'been', 'before', 'beforehand', 'behind', 'being', 'below',   'beside', 'besides', 'between', 'beyond', 'bill', 'both', 'bottom','but', 'by', 'call', 'can', 'cannot', 'cant', 'co',   'con', 'could', 'couldnt', 'cry', 'de', 'describe', 'detail', 'do', 'done', 'down', 'due', 'during', 'each', 'eg', 'eight',   'either', 'eleven','else', 'elsewhere', 'empty', 'enough', 'etc', 'even', 'ever', 'every', 'everyone', 'everything',   'everywhere', 'except', 'few', 'fifteen', 'fify', 'fill', 'find', 'fire', 'first', 'five', 'for', 'former', 'formerly',   'forty', 'found', 'four', 'from', 'front', 'full', 'further', 'get', 'give', 'go', 'had', 'has', 'hasnt', 'have', 'he',   'hence', 'her', 'here', 'hereafter', 'hereby', 'herein', 'hereupon', 'hers', 'herself', 'him', 'himself', 'his', 'how',   'however', 'hundred', 'ie', 'if', 'in', 'inc', 'indeed', 'interest', 'into', 'is', 'it', 'its', 'itself', 'keep', 'last',   'latter', 'latterly', 'least', 'less', 'ltd', 'made', 'many', 'may', 'me', 'meanwhile', 'might', 'mill', 'mine', 'more',   'moreover', 'most', 'mostly', 'move', 'much', 'must', 'my', 'myself', 'name', 'namely', 'neither', 'never', 'nevertheless',   'next', 'nine', 'no', 'nobody', 'none', 'noone', 'nor', 'not', 'nothing', 'now', 'nowhere', 'of', 'off', 'often', 'on',   'once', 'one', 'only', 'onto', 'or', 'other', 'others', 'otherwise', 'our', 'ours', 'ourselves', 'out', 'over', 'own','part',   'per', 'perhaps', 'please', 'put', 'rather', 're', 'same', 'see', 'seem', 'seemed', 'seeming', 'seems', 'serious',   'several', 'she', 'should', 'show', 'side', 'since', 'sincere', 'six', 'sixty', 'so', 'some', 'somehow', 'someone',   'something', 'sometime', 'sometimes', 'somewhere', 'still', 'such', 'system', 'take', 'ten', 'than', 'that', 'the',   'their', 'them', 'themselves', 'then', 'thence', 'there', 'thereafter', 'thereby', 'therefore', 'therein', 'thereupon',   'these', 'they', 'thickv', 'thin', 'third', 'this', 'those', 'though', 'three', 'through', 'throughout', 'thru', 'thus',   'to', 'together', 'too', 'top', 'toward', 'towards', 'twelve', 'twenty', 'two', 'un', 'under', 'until', 'up', 'upon',   'us', 'very', 'via', 'was', 'we', 'well', 'were', 'what', 'whatever', 'when', 'whence', 'whenever', 'where', 'whereafter',   'whereas', 'whereby', 'wherein', 'whereupon', 'wherever', 'whether', 'which', 'while', 'whither', 'who', 'whoever', 'whole',   'whom', 'whose', 'why', 'will', 'with', 'within', 'without', 'would', 'yet', 'you', 'your', 'yours', 'yourself',   'yourselves', 'the');
    } else {
      $this->stopwords = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'el', 'la', 'los', 'les', 'las', 'de', 'del', 'a', 'ante', 'con', 'en', 'para', 'por', 'y', 'o', 'u', 'tu', 'te', 'ti', 'le', 'que', 'al', 'ha', 'un', 'han', 'lo', 'su', 'una', 'estas', 'esto', 'este', 'es', 'tras', 'a', 'acá', 'ahí', 'al', 'algo', 'algún', 'alguna', 'algunas', 'alguno', 'algunos', 'allá', 'alli', 'allí', 'antes', 'aquel', 'aquella', 'aquellas', 'aquello', 'aquellos', 'aqui', 'aquí', 'asi', 'atras', 'aun', 'aunque', 'bajo', 'bastante', 'bien', 'cabe', 'cada', 'casi', 'cierta', 'ciertas', 'cierto', 'ciertos', 'como', 'cómo', 'con', 'conmigo', 'conseguimos', 'conseguir', 'consigo', 'consigue', 'consiguen', 'consigues', 'contigo', 'contra', 'cual', 'cuales', 'cualquier', 'cualquiera', 'cualquieras', 'cuando', 'cuanta', 'cuánta', 'cuantas', 'cuántas', 'cuanto', 'cuánto', 'cuantos', 'cuántos', 'de', 'dejar', 'del', 'demás', 'demas', 'demasiada', 'demasiadas', 'demasiado', 'demasiados', 'dentro', 'desde', 'donde', 'dos', 'el', 'él', 'ella', 'ellas', 'ello', 'ellos', 'en', 'encima', 'entonces', 'entre', 'era', 'eramos', 'eran', 'eras', 'eres', 'es', 'esa', 'esas', 'ese', 'eso', 'esos', 'esta', 'estaba', 'estado', 'estais', 'estamos', 'estan', 'estar', 'estas', 'este', 'esto', 'estos', 'estoy', 'etc', 'fin', 'fue', 'fueron', 'fui', 'fuimos', 'gueno', 'ha', 'hace', 'haceis', 'hacemos', 'hacen', 'hacer', 'haces', 'hacia', 'hago', 'hasta', 'incluso', 'intenta', 'intentais', 'intentamos', 'intentan', 'intentar', 'intentas', 'intento', 'ir', 'jamás', 'junto', 'juntos', 'la', 'largo', 'las', 'lo', 'los', 'mas', 'más', 'me', 'menos', 'mi', 'mía', 'mia', 'mias', 'mientras', 'mio', 'mío', 'mios', 'mis', 'misma', 'mismas', 'mismo', 'mismos', 'modo', 'mucha', 'muchas', 'muchísima', 'muchísimas', 'muchísimo', 'muchísimos', 'mucho', 'muchos', 'muy', 'nada', 'ni', 'ningun', 'ninguna', 'ningunas', 'ninguno', 'ningunos', 'no', 'nos', 'nosotras', 'nosotros', 'nuestra', 'nuestras', 'nuestro', 'nuestros', 'nunca', 'os', 'otra', 'otras', 'otro', 'otros', 'para', 'parecer', 'pero', 'poca', 'pocas', 'poco', 'pocos', 'podeis', 'podemos', 'poder', 'podria', 'podriais', 'podriamos', 'podrian', 'podrias', 'por', 'por qué', 'porque', 'primero', 'primero desde', 'puede', 'pueden', 'puedo', 'pues', 'que', 'qué', 'querer', 'quien', 'quién', 'quienes', 'quienes', 'quiera', 'quienquiera', 'quiza', 'quizas', 'sabe', 'sabeis', 'sabemos', 'saben', 'saber', 'sabes', 'se', 'segun', 'según', 'ser', 'si', 'sí', 'siempre', 'siendo', 'sin', 'sín', 'sino', 'so', 'sobre', 'sois', 'solamente', 'solo', 'somos', 'soy', 'sr', 'sra', 'sres', 'esta', 'su', 'sus', 'suya', 'suyas', 'suyo', 'suyos', 'tal', 'tales', 'también', 'tambien', 'tampoco', 'tan', 'tanta', 'tantas', 'tanto', 'tantos', 'te', 'teneis', 'tenemos', 'tener', 'tengo', 'ti', 'tiempo', 'tiene', 'tienen', 'toda', 'todas', 'todo', 'todos', 'tras', 'tú', 'tu', 'tus', 'tuya', 'tuyo', 'tuyos', 'ultimo', 'un', 'una', 'unas', 'uno', 'unos', 'usa', 'usais', 'usamos', 'usan', 'usar', 'usas', 'uso', 'usted', 'ustedes', 'va', 'vais', 'vamos', 'van', 'varias', 'varios', 'vaya', 'verdad', 'verdadera', 'vosotras', 'vosotros', 'voy', 'vuestra', 'vuestras', 'vuestro', 'vuestros', 'y', 'ya', 'yo');
    }
  }

  function parseString($string) {
    $str = preg_replace("/\s+/", " ", trim($string));
    $str = $this->removeSymbols($str);
    $string_array = $this->removeStopwords($str);
    return $string_array;
  }

  function removeSymbols($string) {
    $string = str_replace($this->symbols, '', $string);
    return trim($string);
  }

  function removeStopwords($string) {
    $words_array = explode(' ', $string);
    $words_array = array_map('strtolower', array_diff($words_array, array('')));
    $words_array = array_values(array_diff($words_array, $this->stopwords));
    return $words_array;
  }
}

