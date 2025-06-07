<?php

namespace Database\Seeders;
use App\Models\{Post, User, Category};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::all();
        $categorias = Category::all()->keyBy('name');

        $posts = [
            // cine
            [
                'title' => '¿Por qué David Lynch es el maestro del cine moderno?',
                'category' => 'cine',
                'content' => 'Anoche volví a ver "Eraserhead" y cada vez me convenzo más de que Lynch no hace películas, hace experiencias sensoriales. ¿Alguien más siente que "Inland Empire" se entiende mejor después de varios visionados?',
                'image_path' => 'storage/posts/eraserhead.jpg'
            ],
            [
                'title' => 'Antonioni y el arte de no decir nada con estilo',
                'category' => 'cine',
                'content' => 'Estuve releyendo ensayos sobre "L\'Eclisse" y creo que el vacío narrativo de Antonioni es su forma de hablarnos de la incomunicación. No es aburrido: es existencialismo puro.',
                'image_path' => 'storage/posts/antonioni.jpg'
            ],
            [
                'title' => '¿Es "El Padrino" la mejor película de todos los tiempos?',
                'category' => 'cine',
                'content' => 'Recién vi "El Padrino" y me sigue pareciendo una obra maestra. ¿Alguien más piensa que la actuación de Marlon Brando es insuperable? ¿O prefieren "Apocalypse Now"?',
                'image_path' => 'storage/posts/godfather.jpg'
            ],
            [
                'title' => '¿Qué opinan de la trilogía de "El Señor de los Anillos"?',
                'category' => 'cine',
                'content' => 'Siempre me ha fascinado cómo Peter Jackson logró capturar la esencia de los libros. ¿Alguien más piensa que la versión extendida de "Las Dos Torres" es la mejor película de fantasía jamás hecha?',
                'image_path' => 'storage/posts/lotr.jpg'
            ],
            [
                'title' => '¿Es "Blade Runner" una película de culto o un clásico moderno?',
                'category' => 'cine',
                'content' => 'Recién vi "Blade Runner 2049" y me dejó pensando en cómo el cine sci-fi ha evolucionado. ¿Alguien más cree que la original es insuperable o prefieren la secuela?',
                'image_path' => 'storage/posts/bladerunner.jpg'
            ],

            // música
            [
                'title' => '¿Es "OK Computer" el mejor disco de la historia?',
                'category' => 'música',
                'content' => 'Recién escuché "OK Computer" y me sigue volando la cabeza. ¿Alguien más piensa que es un disco que define una era? ¿O prefieren algo más reciente como "A Moon Shaped Pool"?',
                'image_path' => 'storage/posts/okcomputer.jpg'
            ],
            [
                'title' => '¿Qué opinan de la evolución de Björk?',
                'category' => 'música',
                'content' => 'Desde "Debut" hasta "Fossora", Björk ha cambiado tanto. ¿Creen que su música sigue siendo tan innovadora o se está repitiendo? A mí me encanta cómo siempre busca nuevos sonidos.',
                'image_path' => 'storage/posts/bjork.jpg'
            ],
            [
                'title' => '¿Es "The Dark Side of the Moon" el disco más sobrevalorado?',
                'category' => 'música',
                'content' => 'No me malinterpreten, amo a Pink Floyd, pero siento que "The Dark Side of the Moon" es un disco que se ha vuelto casi un cliché. ¿Alguien más piensa que hay discos menos conocidos de la banda que son igual de buenos?',
                'image_path' => 'storage/posts/darksideofthemoon.jpg'
            ],
            [
                'title' => '¿Es "Kid A" el último gran disco conceptual?',
                'category' => 'música',
                'content' => 'Radiohead rompió todos los esquemas con "Kid A". Me impresiona cómo aún hoy suena como algo salido del futuro. ¿Qué opinan? ¿Fue su punto más alto o prefieren "OK Computer"?',
                'image_path' => 'storage/posts/kida.jpg'
            ],
            [
                'title' => 'Hablemos de "The Velvet Underground & Nico"',
                'category' => 'música',
                'content' => 'No sé ustedes, pero creo que sin este disco no existiría casi ninguna banda indie actual. Su crudeza, la producción de Warhol, todo es arte puro. ¿Alguien más lo tiene en vinilo?',
                'image_path' => 'storage/posts/velvetunderground.jpg'
            ],

            // mascotas
            [
                'title' => 'Mi gato no deja de mirarme raro',
                'category' => 'mascotas',
                'content' => "Desde ayer mi gato se queda parado mirándome fijo desde la puerta. ¿Es normal? ¿Le pasa a alguien más con sus gatos o estoy viviendo el comienzo de una película de terror felina?",
                'image_path' => 'storage/posts/gatomirando.jpg'
            ],
            [
                'title' => 'Mi perra aprendió a abrir la heladera',
                'category' => 'mascotas',
                'content' => "No es chiste. Anoche escuché ruidos y cuando llegué estaba mi perra con una bandeja de milanesas. ¿Ideas para asegurar la heladera?"
            ],
            [
                'title' => 'Mi loro me imita cuando estoy en la ducha',
                'category' => 'mascotas',
                'content' => "Es raro, pero cada vez que me meto a bañar, mi loro empieza a cantar canciones de los 80. ¿Alguien más tiene un loro con gustos músicales tan peculiares?"
            ],
            [
                'title' => 'Mi pez beta se pelea con su reflejo',
                'category' => 'mascotas',
                'content' => "No sé si es normal, pero mi pez beta pasa horas atacando su reflejo en el vidrio. ¿Alguien más ha visto esto? ¿Es una forma de ejercicio o está loco?"
            ],

            // me pasó
            [
                'title' => 'Me quedé encerrado en el baño del trabajo',
                'category' => 'me pasó',
                'content' => "Fue una experiencia surrealista. El pestillo se rompió y tuve que pedir ayuda por debajo de la puerta. ¿Alguien más ha tenido un momento así de incómodo en el trabajo?",
                'image_path' => 'storage/posts/encerrado.jpg'
            ],
            [
                'title' => 'Me olvidé las llaves dentro del auto y tuve que llamar a un cerrajero',
                'category' => 'me pasó',
                'content' => "Fue un día horrible, pero al menos el cerrajero era muy simpático. ¿A alguien más le ha pasado algo así? ¿Algún truco para no olvidar las llaves?",
                'image_path' => 'storage/posts/llavesauto.jpg'
            ],
            [
                'title' => 'Me encontré con un ex en el supermercado y fue incómodo',
                'category' => 'me pasó',
                'content' => "No sé qué es peor, el momento incómodo o que me vio con la lista de compras más aburrida del mundo. ¿A alguien más le ha pasado algo así? ¿Cómo lo manejaron?"
            ],
            [
                'title' => 'Me confundieron con un famoso en el subte',
                'category' => 'me pasó',
                'content' => "Esto fue rarísimo: una señora me paró para pedirme una foto porque pensaba que era un actor de novelas turcas. Me dejó pensando si realmente me parezco o era una excusa para sacarse una selfie."
            ],
            [
                'title' => '¿Soy yo o los ascensores se paran más cuando estás solo?',
                'category' => 'me pasó',
                'content' => "Me pasó dos veces esta semana que el ascensor se quedó trabado unos segundos y justo estaba solo. ¿Alguien sabe si es normal o estoy viviendo una película de suspenso sin saberlo?"
            ],

            // ot
            [
                'title' => '¿Qué olor de tu infancia te gustaría embotellar?',
                'category' => 'off-topic',
                'content' => "Para mí es el olor a plastilina y a pan recién horneado. ¿Y ustedes? Hay olores que deberían poder guardarse en frascos para días tristes."
            ],
            [
                'title' => 'Sobre el remake de Resident Evil 4',
                'category' => 'off-topic',
                'content' => "Tengo sentimientos encontrados con el remake. Por un lado, el sistema de combate mejoró un montón, pero por otro, siento que perdió algo de la atmósfera original. ¿A ustedes qué les pareció?",
                'image_path' => 'storage/posts/re4.jpg'
            ],
            [
                'title' => '¿Es normal que me dé miedo la oscuridad a los 30?',
                'category' => 'off-topic',
                'content' => "No sé si es la pandemia o qué, pero cada vez que apago las luces siento que algo me está mirando. ¿Alguien más tiene este miedo infantil que nunca se va del todo?"
            ],
            [
                'title' => 'Redescubrí Pikmin y me voló la cabeza',
                'category' => 'off-topic',
                'content' => "Siempre pensé que Pikmin era un jueguito simpático nomás, pero rejugando la saga me doy cuenta que tiene una estrategia que roza lo filosófico.",
                'image_path' => 'storage/posts/pikmin.jpg'
            ],
            [
                'title' => '¿Por qué la gente ama tanto a Dark Souls?',
                'category' => 'off-topic',
                'content' => "Recién empecé a jugarlo y no entiendo por qué es tan adorado. ¿Es el desafío? ¿La atmósfera? ¿O es que nos gusta sufrir en los videojuegos?"
            ],
            [
                'title' => '¿Alguien más está jugando Chrono Trigger en Steam?',
                'category' => 'off-topic',
                'content' => "Recién lo compré y me encanta cómo han remasterizado los gráficos. ¿Alguien más lo está disfrutando? ¿Qué opinan de los cambios respecto a la versión original?"
            ],
            [
                'title' => '¿Qué opinan de la serie de Castlevania en Netflix?',
                'category' => 'off-topic',
                'content' => "Me encantó cómo adaptaron el lore del juego. ¿Alguien más piensa que es una de las mejores series animadas que han salido últimamente?",
                'image_path' => 'storage/posts/castlevania.jpg'
            ],
        ];

        foreach ($posts as $data) {
            $user = $usuarios->random();
            $categoria = $categorias[$data['category']];

            $post = Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'user_id' => $user->id,
                'category_id' => $categoria->id,
                'habilitated' => true,
                'image_path' => $data['image_path'] ?? null,
                'views' => rand(10, 300),
                'rating' => 0,
        ]);
        }
    }
}
