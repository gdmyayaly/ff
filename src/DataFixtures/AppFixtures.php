<?php

namespace App\DataFixtures;

use App\Entity\Langue;
use App\Entity\Questions;
use App\Entity\ReponseQuestions;
use App\Entity\Thematique;
use App\Repository\LangueRepository;
use App\Repository\ThematiqueRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $thematiqueRepository;
    private $langueRepository;
    public function __construct(ThematiqueRepository $thematiqueRepository, LangueRepository $langueRepository)
    {
        $this->thematiqueRepository = $thematiqueRepository;
        $this->langueRepository = $langueRepository;
    }
    public function load(ObjectManager $manager)
    {
        $langues = ["Français", "Wolof"];
        for ($i = 0; $i < count($langues); $i++) {
            $langue = new Langue();
            $langue->setNom($langues[$i]);
            $langue->setAudio($langues[$i] . ".mp3");
            $manager->persist($langue);
        }
        $tabtheme = ["Culture Géneral", "Mathématiques", "Français", "Design", "Tech&Digital", "Logique"];
        for ($i = 0; $i < count($tabtheme); $i++) {
            $thematique = new Thematique();
            $thematique->setNom($tabtheme[$i]);
            $manager->persist($thematique);
        }
        $manager->flush();
        // $questionCultureGeneral=array(
        //     0 => array('num' => '1', 'libeller' => 'Comment surnomme-t-on le Sénégal?', 'rep1' => 'Pays de la Téranga', 'rep2' => 'Éléphants', 'rep3' => 'Galsen', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     1 => array('num' => '2', 'libeller' => 'Quelle est la devise du Sénégal?', 'rep1' => 'La patrie, l\'action, la liberté', 'rep2' => 'Un peuple, un but, une foi', 'rep3' => 'Un peuple, une vérité, une loi', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     2 => array('num' => '3', 'libeller' => 'Quel animal symbolise le Sénégal ?', 'rep1' => 'Lion', 'rep2' => 'Éléphant', 'rep3' => 'Singe', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     3 => array('num' => '4', 'libeller' => 'Qui est l\'actuel président du Sénégal ?', 'rep1' => 'Léopold Sédar Senghor', 'rep2' => 'Macky Sall', 'rep3' => 'Abdoulaye Wade', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     4 => array('num' => '5', 'libeller' => 'Quelle est la langue officielle du Sénégal?', 'rep1' => 'Anglais', 'rep2' => 'Wolof', 'rep3' => 'Français', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     5 => array('num' => '6', 'libeller' => 'Quelle est la langue locale la plus parlée au Sénégal?', 'rep1' => 'Peulh', 'rep2' => 'Sérére', 'rep3' => 'Wolof', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     6 => array('num' => '7', 'libeller' => 'Combien de régions compte le Sénégal ?', 'rep1' => '20', 'rep2' => '17', 'rep3' => '14', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     7 => array('num' => '8', 'libeller' => 'Quelle est la capitale du Sénégal?', 'rep1' => 'Saint Louis', 'rep2' => 'Dakar', 'rep3' => 'Gorée', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     8 => array('num' => '9', 'libeller' => 'Dans quel continent se trouve le Sénégal?', 'rep1' => 'Europe', 'rep2' => 'Asie', 'rep3' => 'Afrique', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     9 => array('num' => '10', 'libeller' => 'Qui est le premier président de la République du Sénégal?', 'rep1' => 'Abdou Diouf', 'rep2' => 'Léopold Sédar Senghor', 'rep3' => 'Abdoulaye WADE', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     10 => array('num' => '11', 'libeller' => 'Qui est considéré comme le roi du Mbalakh?', 'rep1' => 'Ismaela LO', 'rep2' => 'Waly SECK', 'rep3' => 'Youssou NDOUR', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     11 => array('num' => '12', 'libeller' => 'Dans quel endroit précis de Dakar se trouve la maison des esclaves?', 'rep1' => 'Plateau', 'rep2' => 'Almadies', 'rep3' => 'Gorée', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     12 => array('num' => '13', 'libeller' => 'Qui fut la première championne du Monde d\'athlétisme (400m en 2001) sénégalaise ?', 'rep1' => 'Amy Mbacké THIAM', 'rep2' => 'Sadio MANE', 'rep3' => 'El Hadji Amadou DIA BA', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     13 => array('num' => '14', 'libeller' => 'Qui est l’actuel roi des arènes?', 'rep1' => 'Gris Bordeaux', 'rep2' => 'Balla Gaye', 'rep3' => 'Modou LO', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     14 => array('num' => '15', 'libeller' => 'Combien d’universités publiques compte le Sénégal?', 'rep1' => '1', 'rep2' => '5', 'rep3' => '7', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     15 => array('num' => '16', 'libeller' => 'Qui est la première femme Premier Ministre du Sénégal?', 'rep1' => 'Mame Madior BOYE', 'rep2' => 'Aminata TOURE (Mimi)', 'rep3' => 'Aminata Mbengue NDIAYE', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     16 => array('num' => '17', 'libeller' => 'En quelle année le Sénégal a eu son indépendance?', 'rep1' => '1957', 'rep2' => '1960', 'rep3' => '1970', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     17 => array('num' => '18', 'libeller' => 'Qui est l’actuel entraîneur de l’équipe nationale de football du Sénégal?', 'rep1' => 'El Hadji DIOUF', 'rep2' => 'Aliou CISSE', 'rep3' => 'Amara TRAORE', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     18 => array('num' => '19', 'libeller' => 'Quel joueur a remporté le ballon d’or fricain en 2019', 'rep1' => 'El Hadji DIOUF', 'rep2' => 'Sadio MANE', 'rep3' => 'Gana Gueye', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     19 => array('num' => '20', 'libeller' => 'Quel est le plus grand stade du Sénégal?', 'rep1' => 'Stade Demba Diop', 'rep2' => 'Stade Galandou Diouf', 'rep3' => 'Stade Leopold Sedar senghor', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     20 => array('num' => '21', 'libeller' => 'Quelle est la superficie du Sénégal?', 'rep1' => '196 722', 'rep2' => '174 000', 'rep3' => '250 125', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     21 => array('num' => '22', 'libeller' => 'Quelle est la région la plus vaste du Sénégal?', 'rep1' => 'Dakar', 'rep2' => 'Thiès', 'rep3' => 'Tambacounda', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     22 => array('num' => '23', 'libeller' => 'Quel pays n’est pas en Afrique?', 'rep1' => 'France', 'rep2' => 'Mali', 'rep3' => 'Togo', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     23 => array('num' => '24', 'libeller' => 'Qui organise l’évènement de mode "Dakar Fashion Week"?', 'rep1' => 'Alfadi', 'rep2' => 'Adama Paris', 'rep3' => 'Diouma Dieng Diakhaté', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     24 => array('num' => '25', 'libeller' => 'Contre quelle équipe le Sénégal a joué la finale de la CAN 2019?', 'rep1' => 'Tunisie', 'rep2' => 'Egypt', 'rep3' => 'Algérie', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     25 => array('num' => '26', 'libeller' => 'Dans quelle région du Sénégal se trouve le pont Faidherbe?', 'rep1' => 'Ziguinchor', 'rep2' => 'Thiès', 'rep3' => 'Saint Louis', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     26 => array('num' => '27', 'libeller' => 'Le Wax est:', 'rep1' => 'Oiseau', 'rep2' => 'Tissu', 'rep3' => 'Bijou', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     27 => array('num' => '28', 'libeller' => 'Comment s\'appelle le plat national sénégalais?', 'rep1' => 'Mafé', 'rep2' => 'Yassa', 'rep3' => 'Thieboudienne', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     28 => array('num' => '29', 'libeller' => 'Quelle est la religion la plus pratiquée au Sénégal?', 'rep1' => 'Islam', 'rep2' => 'Christianisme', 'rep3' => 'Judaisme', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     29 => array('num' => '30', 'libeller' => 'Quel est le pays enclavé dans le Sénégal ?', 'rep1' => 'Guinée Bissau', 'rep2' => 'Gambie', 'rep3' => 'Mauritanie', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     30 => array('num' => '31', 'libeller' => 'Quelle monnaie utilise-t-on au Sénégal ?', 'rep1' => 'Dollar Sénégalais', 'rep2' => 'Franc cfa', 'rep3' => 'Euro Sénégalais', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     31 => array('num' => '32', 'libeller' => 'Combien de CAN le Sénégal a remporté ?', 'rep1' => '2 fois', 'rep2' => '1 fois', 'rep3' => '0 fois', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     32 => array('num' => '33', 'libeller' => 'Quel est l\'indicatif pour appeler au Sénégal ?', 'rep1' => '77', 'rep2' => '33', 'rep3' => '221', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     33 => array('num' => '34', 'libeller' => 'Parmi ces artistes, lequel est sénégalais ?', 'rep1' => 'Salif Keita', 'rep2' => 'Youssou Ndour', 'rep3' => 'Fodé Barro', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     34 => array('num' => '35', 'libeller' => 'De quelle couleur est le drapeau sénégalais ?', 'rep1' => 'Vert , jaune, rouge', 'rep2' => 'Bleu ,blanc, rouge', 'rep3' => 'Vert , jaune , rouge, blanc', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     35 => array('num' => '36', 'libeller' => 'Quel est le sport national du Sénégal ?', 'rep1' => 'Boxe', 'rep2' => 'Lutte', 'rep3' => 'Karaté', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     36 => array('num' => '37', 'libeller' => 'Quel est le surnom de l\'équipe nationale de football du Sénégal ?', 'rep1' => 'Les lions', 'rep2' => 'Les lions de la téranga', 'rep3' => 'Les lions indomptable', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     37 => array('num' => '38', 'libeller' => 'Quel virus affecte les sénégalais en 2020?', 'rep1' => 'Ebola', 'rep2' => 'Coronavirus', 'rep3' => 'Virus', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     38 => array('num' => '39', 'libeller' => 'Quel est le pays ayant colonisé le Sénégal?', 'rep1' => 'France', 'rep2' => 'Gambie', 'rep3' => 'Mali', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     39 => array('num' => '40', 'libeller' => 'Comment s’appelle l\'épouse de l’actuel Président de la République du Sénégal?', 'rep1' => 'Viviane Wade', 'rep2' => 'Mariéme Sall', 'rep3' => 'Mariéme Faye Sall', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     40 => array('num' => '41', 'libeller' => 'Qui a composé la musique de l’hymne national du Sénégal?', 'rep1' => 'Herbert Pepper', 'rep2' => 'Léopold Sédar Senghor', 'rep3' => 'Les Touré Kunda', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     41 => array('num' => '42', 'libeller' => 'En quelle année a eu lieu le naufrage du bateau le JOOLA?', 'rep1' => '1996', 'rep2' => '2002', 'rep3' => '1998', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     42 => array('num' => '43', 'libeller' => 'Dans quelle région se trouve le parc le Niokolo Koba?', 'rep1' => 'Ziguinchor', 'rep2' => 'Tambacounda', 'rep3' => 'Thiès', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     43 => array('num' => '44', 'libeller' => 'Qui est Jules Bocandé?', 'rep1' => 'Un ancien footballeur', 'rep2' => 'Un ancien ministre', 'rep3' => 'Un ancien athlète', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     44 => array('num' => '45', 'libeller' => 'Qui est Coumba Gawlo Seck?', 'rep1' => 'Une chanteuse', 'rep2' => 'Un mannequin', 'rep3' => 'Une femme politique', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     45 => array('num' => '46', 'libeller' => 'Comment s\'appelle l\'Université de Dakar?', 'rep1' => 'L\'Université Blaise Diagne', 'rep2' => 'L\'Université Gaston berger', 'rep3' => 'L\'Université Cheikh Anta Diop ( UCAD)', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        // );
        // $culturegeneral = $this->thematiqueRepository->findOneBy(['nom' => 'Culture Géneral']);
        // for ($i=0; $i <count($questionCultureGeneral) ; $i++) { 
        //     $question= new Questions();
        //     $question->setLibeller($questionCultureGeneral[$i]['libeller']);
        //     $bb = $i + 1;
        //     $audiolib = "Audio/culture/Q" . $bb . "/Q1.mp3";
        //     $question->setAudio($audiolib);
        //     $question->setThematique($culturegeneral);
        //     $manager->persist($question);
        //     for ($j=1; $j <=3 ; $j++) { 
        //         $reponseQuestion=new ReponseQuestions();
        //         if ($questionCultureGeneral[$i]["rep$j"]!=null) {
        //             $reponseQuestion->setLibeller($questionCultureGeneral[$i]["rep$j"]);
        //         }
        //         if ($questionCultureGeneral[$i]["audio"]!=null) {
        //             $audioquestion = "Audio/culture/Q" . $bb . "/R".$j.".mp3";
        //             $reponseQuestion->setAudio($audioquestion);
        //         }else{
        //             $reponseQuestion->setAudio(null);
        //         }
        //         if ($questionCultureGeneral[$i]["picto"]!=null) {
        //             $imgquestion = "Picto/culture/Q" . $bb . "/img".$j.".svg";
        //             $reponseQuestion->setImage($imgquestion);
        //         }else{
        //             $reponseQuestion->setImage(null);
        //         }
        //         if ($questionCultureGeneral[$i]["bonnereponse"]=="rep$j") {
        //             $reponseQuestion->setGoodReponse(true);
        //         }else{
        //             $reponseQuestion->setGoodReponse(false);
        //         }
        //         $reponseQuestion->setQuestion($question);
        //         $manager->persist($reponseQuestion);
        //     }
        //     $reponseQuestion=new ReponseQuestions();
        //     $reponseQuestion->setLibeller("Je ne sais Pas");
        //     $reponseQuestion->setImage("none.png");
        //     $reponseQuestion->setAudio("none.mp3");
        //     $reponseQuestion->setGoodReponse(false);
        //     $reponseQuestion->setQuestion($question);
        //     $manager->persist($reponseQuestion);
        //     $reponseQuestion1=new ReponseQuestions();
        //     $reponseQuestion1->setLibeller("Pas de reponse");
        //     $reponseQuestion1->setGoodReponse(false);
        //     $reponseQuestion1->setQuestion($question);
        //     $reponseQuestion1->setAudio("none.mp3");
        //     $manager->persist($reponseQuestion1);

        // }
        // $manager->flush();
        $questionMath=array(
            0 => array('num' => '1', 'libeller' => 'Un nombre pair est un nombre :', 'rep1' => 'Divisible par 2', 'rep2' => 'Divisible par 4', 'rep3' => 'Qu\'on ne peut pas diviser', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            1 => array('num' => '2', 'libeller' => 'Combien de minutes retrouve t-on dans 1 heure?', 'rep1' => '50', 'rep2' => '60', 'rep3' => '70', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            2 => array('num' => '3', 'libeller' => '2 * 5', 'rep1' => '15', 'rep2' => '18', 'rep3' => '10', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            3 => array('num' => '4', 'libeller' => 'Quel est le double de 2?', 'rep1' => '4', 'rep2' => '8', 'rep3' => '10', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            4 => array('num' => '5', 'libeller' => 'Quel est le quart de 8?', 'rep1' => '4', 'rep2' => '2', 'rep3' => '6', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            5 => array('num' => '6', 'libeller' => 'Quel est le triple de 6?', 'rep1' => '18', 'rep2' => '30', 'rep3' => '12', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            6 => array('num' => '7', 'libeller' => 'Quelle est la moitié de 10?', 'rep1' => '5', 'rep2' => '8', 'rep3' => '3', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            7 => array('num' => '8', 'libeller' => 'Si on enlève 15mn à une heure, combien de minutes restera t-il?', 'rep1' => '30mn', 'rep2' => '45mn', 'rep3' => '5mn', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            8 => array('num' => '9', 'libeller' => 'Quel est le résultat de 12+3?', 'rep1' => '12', 'rep2' => '3', 'rep3' => '15', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            9 => array('num' => '10', 'libeller' => 'Quel est le résultat de 160 +14?', 'rep1' => '304', 'rep2' => '174', 'rep3' => '173', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            10 => array('num' => '11', 'libeller' => 'Quel est le résultat de 145 - 32?', 'rep1' => '177', 'rep2' => '112', 'rep3' => '113', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            11 => array('num' => '12', 'libeller' => 'Quel est le résultat de 386 - 25?', 'rep1' => '361', 'rep2' => '136', 'rep3' => '156', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            12 => array('num' => '13', 'libeller' => 'Quel est le résultat de 100*0?', 'rep1' => '100', 'rep2' => '0', 'rep3' => '1000', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            13 => array('num' => '14', 'libeller' => '1 m est égal à combien de cm?', 'rep1' => '100', 'rep2' => '10', 'rep3' => '1', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            14 => array('num' => '15', 'libeller' => '10 m est égal à combien de cm?', 'rep1' => '10', 'rep2' => '100', 'rep3' => '1000', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            15 => array('num' => '16', 'libeller' => 'Awa a 5 ans, son petit frère Yaya a deux ans de moins qu’elle. Quel est l’âge de Yaya?', 'rep1' => '5ans', 'rep2' => '2ans', 'rep3' => '3ans', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            16 => array('num' => '17', 'libeller' => 'Trouve t-on la même chose en faisant : 4+5 et 5+4?', 'rep1' => 'oui', 'rep2' => 'non', 'rep3' => 'Peu être', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        );
        $math = $this->thematiqueRepository->findOneBy(['nom' => 'Mathématiques']);
        for ($i=0; $i <count($questionMath) ; $i++) { 
            $question= new Questions();
            $question->setLibeller($questionMath[$i]['libeller']);
            $bb = $i + 1;
            $audiolib = "Audio/math/Q" . $bb . "/Q1.mp3";
            $question->setAudio($audiolib);
            $question->setThematique($math);
            $manager->persist($question);
            for ($j=1; $j <=3 ; $j++) { 
                $reponseQuestion=new ReponseQuestions();
                if ($questionMath[$i]["rep$j"]!=null) {
                    $reponseQuestion->setLibeller($questionMath[$i]["rep$j"]);
                }
                if ($questionMath[$i]["audio"]!=null) {
                    $audioquestion = "Audio/math/Q" . $bb . "/R".$j.".mp3";
                    $reponseQuestion->setAudio($audioquestion);
                }else{
                    $reponseQuestion->setAudio(null);
                }
                if ($questionMath[$i]["picto"]!=null) {
                    $imgquestion = "Picto/math/Q" . $bb . "/img".$j.".svg";
                    $reponseQuestion->setImage($imgquestion);
                }else{
                    $reponseQuestion->setImage(null);
                }
                if ($questionMath[$i]["bonnereponse"]=="rep$j") {
                    $reponseQuestion->setGoodReponse(true);
                }else{
                    $reponseQuestion->setGoodReponse(false);
                }
                $reponseQuestion->setQuestion($question);
                $manager->persist($reponseQuestion);
            }
            $reponseQuestion=new ReponseQuestions();
            $reponseQuestion->setLibeller("Je ne sais Pas");
            $reponseQuestion->setImage("none.png");
            $reponseQuestion->setAudio("none.mp3");
            $reponseQuestion->setGoodReponse(false);
            $reponseQuestion->setQuestion($question);
            $manager->persist($reponseQuestion);
            $reponseQuestion1=new ReponseQuestions();
            $reponseQuestion1->setLibeller("Pas de reponse");
            $reponseQuestion1->setGoodReponse(false);
            $reponseQuestion1->setQuestion($question);
            $reponseQuestion1->setAudio("none.mp3");
            $manager->persist($reponseQuestion1);
        }
        $manager->flush();
        $questionFrench=array(
            0 => array('num' => '1', 'libeller' => 'Lequel de ces fruits est une tomate?', 'rep1' => '', 'rep2' => '', 'rep3' => '', 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
            1 => array('num' => '2', 'libeller' => 'Lequel de ces fruits est une pêche?', 'rep1' => '', 'rep2' => '', 'rep3' => '', 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
            2 => array('num' => '3', 'libeller' => 'Lequel de ces fruits est un raisin?', 'rep1' => '', 'rep2' => '', 'rep3' => '', 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
            3 => array('num' => '4', 'libeller' => 'Lequel de ces fruits est une orange?', 'rep1' => '', 'rep2' => '', 'rep3' => '', 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
            4 => array('num' => '5', 'libeller' => 'Une orange en dessous de la table', 'rep1' => '', 'rep2' => '', 'rep3' => '', 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
            5 => array('num' => '6', 'libeller' => 'Je vais ……………. marché', 'rep1' => 'à', 'rep2' => 'au', 'rep3' => 'de', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            6 => array('num' => '7', 'libeller' => 'Remplacer par le mot qui convient : Il faut ……………. travaille plus.', 'rep1' => 'quelles', 'rep2' => 'quel', 'rep3' => 'qu’elle', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            7 => array('num' => '8', 'libeller' => 'Et vos documents ……………. faites vous?', 'rep1' => 'quant', 'rep2' => 'qu\'en', 'rep3' => 'quand', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            8 => array('num' => '9', 'libeller' => 'Remplacer par le mot qui convient : La vache et le mouton, ……………., se réfugient sous l’arbre.', 'rep1' => 'blessé', 'rep2' => 'blessées', 'rep3' => 'blessés', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            9 => array('num' => '10', 'libeller' => 'Remplacer par le mot qui convient : Je veux ……………. silence.', 'rep1' => 'un', 'rep2' => 'du', 'rep3' => 'de', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            10 => array('num' => '11', 'libeller' => 'Remplacer par le mot qui convient : Il me faut ……………. nouvelles chaussures.', 'rep1' => 'de', 'rep2' => 'des', 'rep3' => 'du', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            11 => array('num' => '12', 'libeller' => 'Remplacer par le mot qui convient : Tu ……………. souvent vu.', 'rep1' => 'la', 'rep2' => 'l\'as', 'rep3' => 'l\'a', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            12 => array('num' => '13', 'libeller' => 'Remplacer par le mot qui convient : ……….soient tes résultats, tu arrêteras tes études.', 'rep1' => 'quelques', 'rep2' => 'quelque', 'rep3' => 'quels que', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            13 => array('num' => '14', 'libeller' => 'Quel est le genre du nom Artère?', 'rep1' => 'Masculin (M)', 'rep2' => 'Autre (A)', 'rep3' => 'Feminin (F)', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            14 => array('num' => '15', 'libeller' => 'Quel est le genre du nom Apostrophe?', 'rep1' => 'Feminin', 'rep2' => 'Masculin', 'rep3' => 'Autre', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            15 => array('num' => '16', 'libeller' => 'Remplacer par le mot qui convient : Je n’aime pas attendre, alors ........... à l’heure s’il vous plaît.', 'rep1' => 'sois', 'rep2' => 'êtes', 'rep3' => 'soyez', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            16 => array('num' => '17', 'libeller' => 'Remplacer par le mot qui convient : Pour maigrir, il faut que tu.............du sport.', 'rep1' => 'fais', 'rep2' => 'fasses', 'rep3' => 'faisais', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            17 => array('num' => '18', 'libeller' => 'Remplacer par le mot qui convient :Grâce aux cours de français, je comprends..............les gens.', 'rep1' => 'mieux', 'rep2' => 'moins bien', 'rep3' => 'beaucoup', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            18 => array('num' => '19', 'libeller' => 'Remplacer par le mot qui convient : Demain, retour du soleil ! Il .............beau partout à Dakar.', 'rep1' => 'fait', 'rep2' => 'ferait', 'rep3' => 'fera', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            19 => array('num' => '20', 'libeller' => 'Remplacer par le mot qui convient : Je vais reprendre.........de cette tarte. Elle est délicieuse !', 'rep1' => 'Une partie', 'rep2' => 'Une part', 'rep3' => 'Une pièce', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            20 => array('num' => '21', 'libeller' => 'Remplacer par le mot qui convient : Est-ce qu’il reste des œufs dans le frigo ? Il ..... plus.', 'rep1' => 'n’y en a', 'rep2' => 'n’en a', 'rep3' => 'n’y a', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            21 => array('num' => '22', 'libeller' => 'Remplacer par le mot qui convient : Il ......... les mathématiques au lycée.', 'rep1' => 'étude', 'rep2' => 'étudie', 'rep3' => 'étudié', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            22 => array('num' => '23', 'libeller' => 'Remplacer par le mot qui convient : Il est passé devant ........... café.', 'rep1' => 'le', 'rep2' => 'du', 'rep3' => 'au', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            23 => array('num' => '24', 'libeller' => 'Remplacer par le mot qui convient : Il est tard, ........... lit.', 'rep1' => 'dans', 'rep2' => 'au', 'rep3' => 'le', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            24 => array('num' => '25', 'libeller' => 'Remplacer par le mot qui convient : Je ne sais jamais…...chaussures mettre', 'rep1' => 'quel', 'rep2' => 'qu’elles', 'rep3' => 'quelles', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            25 => array('num' => '26', 'libeller' => 'Remplacer par le mot qui convient : Ne ........... fais pas tout ira bien.', 'rep1' => 't’en', 'rep2' => 'tant', 'rep3' => 'tend', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            26 => array('num' => '27', 'libeller' => 'Remplacer par le mot qui convient : Ce film, est-ce que tu..................vu', 'rep1' => 'la', 'rep2' => 'là', 'rep3' => 'l’as', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            27 => array('num' => '28', 'libeller' => 'Remplacer par le mot qui convient : Je suis ......... ce soir, tout ce bruit m’a fatigué.', 'rep1' => 'las', 'rep2' => 'là', 'rep3' => 'la', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            28 => array('num' => '29', 'libeller' => 'Remplacer par le mot qui convient : Il se.......... bien aujourd’hui.', 'rep1' => 'sens', 'rep2' => 'sent', 'rep3' => 'sans', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            29 => array('num' => '30', 'libeller' => 'Remplacer par le mot qui convient : Il pleut et ..... a pas envie de sortir.', 'rep1' => 'on n’', 'rep2' => 'on', 'rep3' => 'n’', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            30 => array('num' => '31', 'libeller' => 'Remplacer par le mot qui convient : Je n\'ai pas envie ....... envoyer autant.', 'rep1' => 'dans', 'rep2' => 'd’ent', 'rep3' => 'd’en', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            31 => array('num' => '32', 'libeller' => 'Remplacer par le mot qui convient : Ils..........heureux de vous accueillir chez eux.', 'rep1' => 'son', 'rep2' => 'sont', 'rep3' => 's’ont', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            32 => array('num' => '33', 'libeller' => 'Remplacer par le mot qui convient: Babacar, ......... tes gants, il fait froid.', 'rep1' => 'mets', 'rep2' => 'met', 'rep3' => 'mes', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            33 => array('num' => '34', 'libeller' => 'Remplacer par le mot qui convient :Ils ........ dit que je pouvais rester une semaine.', 'rep1' => 'mon', 'rep2' => 'm’ont', 'rep3' => 'mont', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            34 => array('num' => '35', 'libeller' => 'Remplacer par le mot qui convient :je n’aime pas ........', 'rep1' => 'sa', 'rep2' => 'ca', 'rep3' => 'ça', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            35 => array('num' => '36', 'libeller' => 'Remplacer par le mot qui convient : Est-ce que Yaya ....... aidé pour le devoir?', 'rep1' => 't\'a', 'rep2' => 't\'as', 'rep3' => 'ta', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            36 => array('num' => '37', 'libeller' => 'Remplacer par le mot qui convient: Mah ....... donné sa carte bancaire.', 'rep1' => 'ma', 'rep2' => 'm’a', 'rep3' => 'm’as', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            37 => array('num' => '38', 'libeller' => 'Remplacer par le mot qui convient :La caméra se trouve dans le salon. Il ....... trouve', 'rep1' => 'ci', 'rep2' => 'si', 'rep3' => 's\'y', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            38 => array('num' => '39', 'libeller' => 'Remplacer par le mot qui convient: Mets .......... vêtements chauds.', 'rep1' => 'ces', 'rep2' => 'ses', 'rep3' => 's’est', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            39 => array('num' => '40', 'libeller' => 'Remplacer par le mot qui convient : Je ne connais pas …….. homme.', 'rep1' => 'cette', 'rep2' => 'cet', 'rep3' => 'c\'est', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            40 => array('num' => '41', 'libeller' => 'Quel est le synonyme de triste?', 'rep1' => 'faible', 'rep2' => 'effondré', 'rep3' => 'malheureux', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            41 => array('num' => '42', 'libeller' => 'Que signifie l’expression : « Sauter aux yeux »?', 'rep1' => 'C’est évident !', 'rep2' => 'C’est bizarre !', 'rep3' => 'C’est magnifique !', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            42 => array('num' => '43', 'libeller' => 'Que signifie l’expression : « Quand les poules auront des dents » ?', 'rep1' => 'Rarement', 'rep2' => 'jamais', 'rep3' => 'souvent', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            43 => array('num' => '44', 'libeller' => 'Quelle forme est correcte ?', 'rep1' => 'J’appele', 'rep2' => 'j’apele', 'rep3' => 'j’appelle', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            44 => array('num' => '45', 'libeller' => 'Remplacer par le mot qui convient : ………..de te plaindre !', 'rep1' => 'Arêtes', 'rep2' => 'Arrête', 'rep3' => 'Arête', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            45 => array('num' => '46', 'libeller' => 'Quelle forme est correcte ?', 'rep1' => 'j’envoierai', 'rep2' => 'j’enverrai', 'rep3' => 'j’envoyerai', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
            46 => array('num' => '47', 'libeller' => 'Remplacer par le mot qui convient : Elle a … attentivement les leçons.', 'rep1' => 'écoutée', 'rep2' => 'écoutées', 'rep3' => 'écouté', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep3'),
            47 => array('num' => '48', 'libeller' => 'Remplacer par le mot qui convient : Elles se sont … compte de leurs erreurs.', 'rep1' => 'rendu', 'rep2' => 'rendue', 'rep3' => 'rendues', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            48 => array('num' => '49', 'libeller' => 'Remplacer par le mot qui convient : … ! Tu vas réussir.', 'rep1' => 'vas y', 'rep2' => 'vas-y', 'rep3' => 'vas y', 'picto' => null, 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        );
        $french = $this->thematiqueRepository->findOneBy(['nom' => 'Français']);
        for ($i=0; $i <count($questionFrench) ; $i++) { 
            $question= new Questions();
            $question->setLibeller($questionFrench[$i]['libeller']);
            $bb = $i + 1;
            $audiolib = "Audio/french/Q" . $bb . "/Q1.mp3";
            $question->setAudio($audiolib);
            $question->setThematique($french);
            $manager->persist($question);
            for ($j=1; $j <=3 ; $j++) { 
                $reponseQuestion=new ReponseQuestions();
                if ($questionFrench[$i]["rep$j"]!=null) {
                    $reponseQuestion->setLibeller($questionFrench[$i]["rep$j"]);
                }
                if ($questionFrench[$i]["audio"]!=null) {
                    $audioquestion = "Audio/french/Q" . $bb . "/R".$j.".mp3";
                    $reponseQuestion->setAudio($audioquestion);
                }else{
                    $reponseQuestion->setAudio(null);
                }
                if ($questionFrench[$i]["picto"]!=null) {
                    $imgquestion = "Picto/french/Q" . $bb . "/img".$j.".svg";
                    $reponseQuestion->setImage($imgquestion);
                }
                else{
                    $reponseQuestion->setImage(null);
                }
                if ($questionFrench[$i]["bonnereponse"]=="rep$j") {
                    $reponseQuestion->setGoodReponse(true);
                }else{
                    $reponseQuestion->setGoodReponse(false);
                }
                $reponseQuestion->setQuestion($question);
                $manager->persist($reponseQuestion);
            }
            $reponseQuestion=new ReponseQuestions();
            $reponseQuestion->setLibeller("Je ne sais Pas");
            $reponseQuestion->setImage("none.png");
            $reponseQuestion->setAudio("none.mp3");
            $reponseQuestion->setGoodReponse(false);
            $reponseQuestion->setQuestion($question);
            $manager->persist($reponseQuestion);
            $reponseQuestion1=new ReponseQuestions();
            $reponseQuestion1->setLibeller("Pas de reponse");
            $reponseQuestion1->setGoodReponse(false);
            $reponseQuestion1->setQuestion($question);
            $reponseQuestion1->setAudio("none.mp3");
            $manager->persist($reponseQuestion1);
        }
        $manager->flush();
        // $questionDesign=array(
        //     0 => array('num' => '1', 'libeller' => 'Laquelle de ces couleurs ne fait pas partie du drapeau Sénégal?', 'rep1' => 'Bleu', 'rep2' => 'Vert', 'rep3' => 'Rouge', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     1 => array('num' => '2', 'libeller' => 'Quelle couleur symbolise le danger?', 'rep1' => 'Rouge', 'rep2' => 'Violet', 'rep3' => 'Vert', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     2 => array('num' => '3', 'libeller' => 'Quelle est la couleur opposé du blanc?', 'rep1' => 'Noir', 'rep2' => 'Rose', 'rep3' => 'Marron', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     3 => array('num' => '4', 'libeller' => 'Lequel de ces deux vont de paire?', 'rep1' => 'Rouge orange', 'rep2' => 'Vert rouge', 'rep3' => 'Bleu jaune', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     4 => array('num' => '5', 'libeller' => 'La couleur est grise est obtenue en mélangeant deux couleurs. Lesquelles?', 'rep1' => 'Blanc noir', 'rep2' => 'Rouge vert', 'rep3' => 'Jaune bleu', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     5 => array('num' => '6', 'libeller' => 'Choisis la couleur la plus sombre.', 'rep1' => 'Dark Red', 'rep2' => 'Orange', 'rep3' => 'Violet', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     6 => array('num' => '7', 'libeller' => 'Choisis la couleur la plus claire.', 'rep1' => 'Carrot', 'rep2' => 'Marron', 'rep3' => 'Jaune', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     7 => array('num' => '8', 'libeller' => 'Si tu devais créer un whatsapp pour jeune fille de quelle couleur serait-elle?', 'rep1' => 'Rose', 'rep2' => 'Vert', 'rep3' => 'Violet', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     8 => array('num' => '9', 'libeller' => 'Laquelle de ces couleurs ne fait pas penser au froid?', 'rep1' => 'Orange', 'rep2' => 'Aqua', 'rep3' => 'Bleu', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     9 => array('num' => '10', 'libeller' => 'Laquelle de ces couleurs ne fait pas penser à la chaleur?', 'rep1' => 'Turquoise', 'rep2' => 'Jaune', 'rep3' => 'Rouge', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     10 => array('num' => '11', 'libeller' => 'Parmi ces mots lequel n’est pas une police d’écriture?', 'rep1' => 'Arial', 'rep2' => 'Italic', 'rep3' => 'Verdana', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     11 => array('num' => '12', 'libeller' => 'Qu\'est-ce qui permettra de gérer le gras et l’italic sur un texte?', 'rep1' => 'Le style', 'rep2' => 'La taille', 'rep3' => 'La police', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     12 => array('num' => '13', 'libeller' => 'Lequel de ces textes est de type cursive?', 'rep1' => 'Cursive', 'rep2' => 'Sans Serif', 'rep3' => 'Serif', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     13 => array('num' => '14', 'libeller' => 'Que symbolise la couleur jaune?', 'rep1' => 'Richesse', 'rep2' => 'Jeunesse', 'rep3' => 'Paresse', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     14 => array('num' => '15', 'libeller' => 'Quelle forme est plus adaptée quand on veut parler d’un groupe?', 'rep1' => 'Cercle', 'rep2' => 'Carré', 'rep3' => 'Triangle', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     15 => array('num' => '16', 'libeller' => 'Une forme est composée de deux éléments essentiels.', 'rep1' => 'Le fond et le contour', 'rep2' => 'La taille et la couleur', 'rep3' => 'La hauteur et la largeur', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     16 => array('num' => '17', 'libeller' => 'Choisie la taille de police qui convient:', 'rep1' => 'Illustro 15px', 'rep2' => 'Illustro 10px', 'rep3' => 'Illustro 20px', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     17 => array('num' => '18', 'libeller' => 'Que symbolise la couleur orange?', 'rep1' => 'Bonheur', 'rep2' => 'Pluie', 'rep3' => 'Mort', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     18 => array('num' => '19', 'libeller' => 'Lequel de ces termes est representé par la couleur verte?', 'rep1' => 'Nature', 'rep2' => 'Jeunesse', 'rep3' => 'Bonheur', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     19 => array('num' => '20', 'libeller' => 'Laquelle de ses figures a des bordures arrondies?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
        //     20 => array('num' => '21', 'libeller' => 'Lequel des ces logiciels nous permet de faire des montage photo?', 'rep1' => 'Photoshop', 'rep2' => 'Netflix', 'rep3' => 'Vimeo', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     21 => array('num' => '22', 'libeller' => 'Laquelle des ces applications ne peut pas faire de montage photo?', 'rep1' => 'Youtube', 'rep2' => 'Picsart', 'rep3' => 'Photogrid', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     22 => array('num' => '23', 'libeller' => 'A quoi sert le design?', 'rep1' => 'Embellir', 'rep2' => 'Simplifier', 'rep3' => 'Raccourcir', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     23 => array('num' => '25', 'libeller' => 'Comment appel t-on quelqu\'un qui fait du design?', 'rep1' => 'Designer', 'rep2' => 'Déserteur', 'rep3' => 'Dessinateur', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        // );
        // $design = $this->thematiqueRepository->findOneBy(['nom' => 'Design']);
        // for ($i=0; $i <count($questionDesign) ; $i++) { 
        //     $question= new Questions();
        //     $question->setLibeller($questionDesign[$i]['libeller']);
        //     $bb = $i + 1;
        //     $audiolib = "Audio/design/Q" . $bb . "/Q1.mp3";
        //     $question->setAudio($audiolib);
        //     $question->setThematique($design);
        //     $manager->persist($question);
        //     for ($j=1; $j <=3 ; $j++) { 
        //         $reponseQuestion=new ReponseQuestions();
        //         if ($questionDesign[$i]["rep$j"]!=null) {
        //             $reponseQuestion->setLibeller($questionDesign[$i]["rep$j"]);
        //         }
        //         if ($questionDesign[$i]["audio"]!=null) {
        //             $audioquestion = "Audio/design/Q" . $bb . "/R".$j.".mp3";
        //             $reponseQuestion->setAudio($audioquestion);
        //         }else{
        //             $reponseQuestion->setAudio(null);
        //         }
        //         if ($questionDesign[$i]["picto"]!=null) {
        //             $imgquestion = "Picto/design/Q" . $bb . "/img".$j.".svg";
        //             $reponseQuestion->setImage($imgquestion);
        //         }
        //         else{
        //             $reponseQuestion->setImage(null);
        //         }
        //         if ($questionDesign[$i]["bonnereponse"]=="rep$j") {
        //             $reponseQuestion->setGoodReponse(true);
        //         }else{
        //             $reponseQuestion->setGoodReponse(false);
        //         }
        //         $reponseQuestion->setQuestion($question);
        //         $manager->persist($reponseQuestion);
        //     }
        //     $reponseQuestion=new ReponseQuestions();
        //     $reponseQuestion->setLibeller("Je ne sais Pas");
        //     $reponseQuestion->setImage("none.png");
        //     $reponseQuestion->setAudio("none.mp3");
        //     $reponseQuestion->setGoodReponse(false);
        //     $reponseQuestion->setQuestion($question);
        //     $manager->persist($reponseQuestion);
        //     $reponseQuestion1=new ReponseQuestions();
        //     $reponseQuestion1->setLibeller("Pas de reponse");
        //     $reponseQuestion1->setGoodReponse(false);
        //     $reponseQuestion1->setQuestion($question);
        //     $reponseQuestion1->setAudio("none.mp3");
        //     $manager->persist($reponseQuestion1);
        // }
        // $manager->flush();
        // $questionTech=array(
        //     0 => array('num' => '1', 'libeller' => 'Quelle périphérie nous permet de saisir dans un ordinateur?', 'rep1' => 'Souris', 'rep2' => 'Clavier', 'rep3' => 'Tablette', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     1 => array('num' => '2', 'libeller' => 'Où s’affiche les images produites par l\'ordinateur?', 'rep1' => 'Télévision', 'rep2' => 'Ecran', 'rep3' => 'Portable', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     2 => array('num' => '3', 'libeller' => 'A quoi sert un écran d’ordinateur?', 'rep1' => 'Ecrire dans l’ordinateur', 'rep2' => 'Afficher des images produits par l’ordinateur', 'rep3' => 'Parler à un ordinateur', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     3 => array('num' => '4', 'libeller' => 'A quoi sert un clavier?', 'rep1' => 'Saisir du texte', 'rep2' => 'Dessiner dans un ordinateur', 'rep3' => 'Parler à l’ordinateur', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     4 => array('num' => '5', 'libeller' => 'Laquelle des images n’est pas un ordinateur?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
        //     5 => array('num' => '6', 'libeller' => 'Laquelle de ses images n\'est pas un réseau social?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
        //     6 => array('num' => '7', 'libeller' => 'Laquelle de ses images est un adresse e-mail?', 'rep1' => 'anta@growacademy', 'rep2' => 'anta@growsenegal', 'rep3' => 'anta@gmail.com', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     7 => array('num' => '8', 'libeller' => 'Pourquoi utilise t-on facebook?', 'rep1' => 'Rester en contact avec nos proches', 'rep2' => 'Faire du sport', 'rep3' => 'Coudre des habits', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     8 => array('num' => '9', 'libeller' => 'Quel est le logo de instagram?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     9 => array('num' => '10', 'libeller' => 'Quel est le logo de twitter?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     10 => array('num' => '11', 'libeller' => 'Quel est le logo de whatsapp?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     11 => array('num' => '12', 'libeller' => 'Laquelle de ces images nous permet de naviguer sur internet?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     12 => array('num' => '13', 'libeller' => 'L\'informatique est:', 'rep1' => 'Un ordinateur', 'rep2' => 'Une science', 'rep3' => 'une application', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     13 => array('num' => '14', 'libeller' => 'Pour sauver les informations de manière permanente, j\'utilise:', 'rep1' => 'Un disque dur', 'rep2' => 'La souris', 'rep3' => 'La carte mère', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     14 => array('num' => '15', 'libeller' => 'La souris est un outil qui permet:', 'rep1' => 'D\'imprimer', 'rep2' => 'De pointer des éléments', 'rep3' => 'D\'envoyer des fichier', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     15 => array('num' => '16', 'libeller' => 'Pour visiter un siteweb il me faut:', 'rep1' => 'Son nom', 'rep2' => 'Son adress url', 'rep3' => 'Son numero', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     16 => array('num' => '17', 'libeller' => 'Quel est le logo de Snapchat?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
        // );
        // $tech = $this->thematiqueRepository->findOneBy(['nom' => 'Tech&Digital']);
        // for ($i=0; $i <count($questionTech) ; $i++) { 
        //     $question= new Questions();
        //     $question->setLibeller($questionTech[$i]['libeller']);
        //     $bb = $i + 1;
        //     $audiolib = "Audio/tech/Q" . $bb . "/Q1.mp3";
        //     $question->setAudio($audiolib);
        //     $question->setThematique($tech);
        //     $manager->persist($question);
        //     for ($j=1; $j <=3 ; $j++) { 
        //         $reponseQuestion=new ReponseQuestions();
        //         if ($questionTech[$i]["rep$j"]!=null) {
        //             $reponseQuestion->setLibeller($questionTech[$i]["rep$j"]);
        //         }
        //         if ($questionTech[$i]["audio"]!=null) {
        //             $audioquestion = "Audio/tech/Q" . $bb . "/R".$j.".mp3";
        //             $reponseQuestion->setAudio($audioquestion);
        //         }else{
        //             $reponseQuestion->setAudio(null);
        //         }
        //         if ($questionTech[$i]["picto"]!=null) {
        //             $imgquestion = "Picto/tech/Q" . $bb . "/img".$j.".svg";
        //             $reponseQuestion->setImage($imgquestion);
        //         }
        //         else{
        //             $reponseQuestion->setImage(null);
        //         }
        //         if ($questionTech[$i]["bonnereponse"]=="rep$j") {
        //             $reponseQuestion->setGoodReponse(true);
        //         }else{
        //             $reponseQuestion->setGoodReponse(false);
        //         }
        //         $reponseQuestion->setQuestion($question);
        //         $manager->persist($reponseQuestion);
        //     }
        //     $reponseQuestion=new ReponseQuestions();
        //     $reponseQuestion->setLibeller("Je ne sais Pas");
        //     $reponseQuestion->setImage("none.png");
        //     $reponseQuestion->setAudio("none.mp3");
        //     $reponseQuestion->setGoodReponse(false);
        //     $reponseQuestion->setQuestion($question);
        //     $manager->persist($reponseQuestion);
        //     $reponseQuestion1=new ReponseQuestions();
        //     $reponseQuestion1->setLibeller("Pas de reponse");
        //     $reponseQuestion1->setGoodReponse(false);
        //     $reponseQuestion1->setQuestion($question);
        //     $reponseQuestion1->setAudio("none.mp3");
        //     $manager->persist($reponseQuestion1);
        // }
        // $manager->flush();
        // $questionLogique=array(
        //     0 => array('num' => '1', 'libeller' => 'Dans un aquarium se trouvent 4 poissons, deux meurt. Combien reste-il de poissons dans l\'aquarium ?', 'rep1' => '4', 'rep2' => '2', 'rep3' => '0', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     1 => array('num' => '2', 'libeller' => 'Tu participes à une course . A un moment donné, tu doubles le deuxième. Tu deviens...', 'rep1' => 'Deuxième', 'rep2' => '1er', 'rep3' => '3eme', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     2 => array('num' => '3', 'libeller' => 'Un thermomètre montre 10 °C. Combien de degrés montreront deux thermomètres ?', 'rep1' => '10 °C', 'rep2' => '20', 'rep3' => '5', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     3 => array('num' => '4', 'libeller' => 'Amadou met 10 minutes pour aller à l\'école. Combien de minutes mettra-t-il s\'il y va avec un ami ?', 'rep1' => '5 minutes', 'rep2' => '10 min', 'rep3' => '20 min', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     4 => array('num' => '5', 'libeller' => 'Il y a huit bancs dans une école. Trois bancs ont été peints en blanc. Combien de bancs y a-t-il maintenant dans l\'école ?', 'rep1' => 'Huit', 'rep2' => '3', 'rep3' => '5', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     5 => array('num' => '6', 'libeller' => 'Qui est plus léger entre un kilo de pierres et un kilo de sable?', 'rep1' => 'C\'est pareil.', 'rep2' => '1 kilo de pierres', 'rep3' => '1kilo de sable', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     6 => array('num' => '7', 'libeller' => 'Un berger a 27 brebis. Toutes meurent sauf 9. Combien en reste-t-il ?', 'rep1' => '9', 'rep2' => '18', 'rep3' => '10', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     7 => array('num' => '8', 'libeller' => 'Je m\'appelle Fatou. J\'ai un frère Atou. Mon frère a une sœur. Comment s\'appelle-t-elle ?', 'rep1' => 'Fatou', 'rep2' => 'Atou', 'rep3' => 'Sala', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     8 => array('num' => '9', 'libeller' => 'Aminata a 10 ans, son petit frère aliou a la moitié de son âge. Lorsque Aminata aura 20 ans, quel âge aura aliou ?', 'rep1' => '15', 'rep2' => '10', 'rep3' => '7', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     9 => array('num' => '10', 'libeller' => 'Il y a 10 oiseaux dans un nid. Un chasseur tire et tue un oiseau. Combien reste-t-il d\'oiseaux dans le nid ?', 'rep1' => '0', 'rep2' => '9', 'rep3' => '10', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     10 => array('num' => '11', 'libeller' => 'Combien de fois nous pouvons trouver le chiffre 9 de 1 à 100 ?', 'rep1' => '20', 'rep2' => '31', 'rep3' => '9', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     11 => array('num' => '12', 'libeller' => 'Trouvez l\'Intrus dans les Mots suivants:', 'rep1' => 'Papier', 'rep2' => 'Stylo', 'rep3' => '66', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     12 => array('num' => '13', 'libeller' => 'Trouvez l\'Intrus dans les Mots suivants:', 'rep1' => 'Bras', 'rep2' => 'Oreille', 'rep3' => 'Nez/Bouche', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     13 => array('num' => '14', 'libeller' => 'Trouvez l\'Intrus dans les Mots suivants:', 'rep1' => 'Moto', 'rep2' => 'Taxi', 'rep3' => 'Bus/Train', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     14 => array('num' => '15', 'libeller' => 'Combien y a t-il de lettres dans le mot alphabet?', 'rep1' => '8', 'rep2' => '26', 'rep3' => '20', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     15 => array('num' => '16', 'libeller' => 'Combien peut ton mettre de goutte d\'eau dans un verre vide?', 'rep1' => '0', 'rep2' => '1', 'rep3' => '1000', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     16 => array('num' => '17', 'libeller' => 'Combien d\'oeuf le coq peut il pondre dans sa vie?', 'rep1' => '100', 'rep2' => '70', 'rep3' => '0', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     17 => array('num' => '18', 'libeller' => 'Je suis un animal de compagnie très apprécié. On dit que je suis le meilleur ami de l\'homme, qui suis-je ?', 'rep1' => 'Le perroquet', 'rep2' => 'Le chien', 'rep3' => 'Le chat', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     18 => array('num' => '19', 'libeller' => 'Je viens de la savane et j\'en suis le roi, qui suis-je ?', 'rep1' => 'Un singe', 'rep2' => 'Un serpent', 'rep3' => 'Un lion', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        //     19 => array('num' => '20', 'libeller' => '5 soeurs sont dans une pièce. Fatou lit un livre. Coumba cuisine. Amina joue aux lido. Et Binta regarde la télé. Que fait la 5ème soeur ?', 'rep1' => 'Joue au lido', 'rep2' => 'dort', 'rep3' => 'cuisine', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     20 => array('num' => '21', 'libeller' => 'J\'ai 11 frères. Je suis le plus petit d\'entre eux, mais pourtant je suis le 2iéme après le premier. Qui-suis-je ?', 'rep1' => 'Février', 'rep2' => 'Abdoulaye', 'rep3' => 'Mars', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
        //     21 => array('num' => '22', 'libeller' => 'J\'ai un père mais je ne suis pas son fils. J\'ai une mère mais je ne suis pas son fils. Qui suis-je ?', 'rep1' => 'Leur ainé', 'rep2' => 'Leur fille', 'rep3' => 'Leur ami', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep2'),
        //     22 => array('num' => '23', 'libeller' => 'Quelle est la soeur de ta tante qui elle n\'est pas ta tante ?', 'rep1' => 'Ta tante', 'rep2' => 'ton oncle', 'rep3' => 'ta mère', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep3'),
        // );
        // $logique = $this->thematiqueRepository->findOneBy(['nom' => 'Logique']);
        // for ($i=0; $i <count($questionLogique) ; $i++) { 
        //     $question= new Questions();
        //     $question->setLibeller($questionLogique[$i]['libeller']);
        //     $bb = $i + 1;
        //     $audiolib = "Audio/logique/Q" . $bb . "/Q1.ogg";
        //     $question->setAudio($audiolib);
        //     $question->setThematique($logique);
        //     $manager->persist($question);
        //     for ($j=1; $j <=3 ; $j++) { 
        //         $reponseQuestion=new ReponseQuestions();
        //         if ($questionLogique[$i]["rep$j"]!=null) {
        //             $reponseQuestion->setLibeller($questionLogique[$i]["rep$j"]);
        //         }
        //         if ($questionLogique[$i]["audio"]!=null) {
        //             $audioquestion = "Audio/logique/Q" . $bb . "/R".$j.".ogg";
        //             $reponseQuestion->setAudio($audioquestion);
        //         }else{
        //             $reponseQuestion->setAudio(null);
        //         }
        //         if ($questionLogique[$i]["picto"]!=null) {
        //             $imgquestion = "Picto/logique/Q" . $bb . "/img".$j.".svg";
        //             $reponseQuestion->setImage($imgquestion);
        //         }
        //         else{
        //             $reponseQuestion->setImage(null);
        //         }
        //         if ($questionLogique[$i]["bonnereponse"]=="rep$j") {
        //             $reponseQuestion->setGoodReponse(true);
        //         }else{
        //             $reponseQuestion->setGoodReponse(false);
        //         }
        //         $reponseQuestion->setQuestion($question);
        //         $manager->persist($reponseQuestion);
        //     }
        //     $reponseQuestion=new ReponseQuestions();
        //     $reponseQuestion->setLibeller("Je ne sais Pas");
        //     $reponseQuestion->setImage("none.png");
        //     $reponseQuestion->setAudio("none.mp3");
        //     $reponseQuestion->setGoodReponse(false);
        //     $reponseQuestion->setQuestion($question);
        //     $manager->persist($reponseQuestion);
        //     $reponseQuestion1=new ReponseQuestions();
        //     $reponseQuestion1->setLibeller("Pas de reponse");
        //     $reponseQuestion1->setGoodReponse(false);
        //     $reponseQuestion1->setQuestion($question);
        //     $reponseQuestion1->setAudio("none.mp3");
        //     $manager->persist($reponseQuestion1);
        // }
        // $manager->flush();
        //Enregistrement question Tuto
        $questionLogique=array(
            array('num' => '1', 'libeller' => 'Comment surnomme-t-on le Sénégal?', 'rep1' => 'Pays de la Téranga', 'rep2' => 'Éléphants', 'rep3' => 'Galsen', 'picto' => null, 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),
            array('num' => '1', 'libeller' => 'Lequel de ces fruits est une tomate?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => null, 'onlyimage' => 'oui', 'bonnereponse' => 'rep1'),
            array('num' => '1', 'libeller' => 'Quelle périphérie nous permet de saisir dans un ordinateur?', 'rep1' => 'Souris', 'rep2' => 'Clavier', 'rep3' => 'Tablette', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => null, 'bonnereponse' => 'rep1'),

        );
        // $logique = $this->thematiqueRepository->findOneBy(['nom' => 'Logique']);
        for ($i=0; $i <count($questionLogique) ; $i++) { 
            $question= new Questions();
            $question->setLibeller($questionLogique[$i]['libeller']);
            $bb = $i + 1;
            $audiolib = "Audio/tuto/Q" . $bb . "/Q1.mp3";
            $question->setAudio($audiolib);
            // $question->setThematique($logique);
            $manager->persist($question);
            for ($j=1; $j <=3 ; $j++) { 
                $reponseQuestion=new ReponseQuestions();
                if ($questionLogique[$i]["rep$j"]!=null) {
                    $reponseQuestion->setLibeller($questionLogique[$i]["rep$j"]);
                }
                if ($questionLogique[$i]["audio"]!=null) {
                    $audioquestion = "Audio/tuto/Q" . $bb . "/R".$j.".mp3";
                    $reponseQuestion->setAudio($audioquestion);
                }else{
                    $reponseQuestion->setAudio(null);
                }
                if ($questionLogique[$i]["picto"]!=null) {
                    $imgquestion = "Picto/tuto/Q" . $bb . "/img".$j.".svg";
                    $reponseQuestion->setImage($imgquestion);
                }
                else{
                    $reponseQuestion->setImage(null);
                }
                if ($questionLogique[$i]["bonnereponse"]=="rep$j") {
                    $reponseQuestion->setGoodReponse(true);
                }else{
                    $reponseQuestion->setGoodReponse(false);
                }
                $reponseQuestion->setQuestion($question);
                $manager->persist($reponseQuestion);
            }
            $reponseQuestion=new ReponseQuestions();
            $reponseQuestion->setLibeller("Je ne sais Pas");
            $reponseQuestion->setImage("none.png");
            $reponseQuestion->setAudio("none.mp3");
            $reponseQuestion->setGoodReponse(false);
            $reponseQuestion->setQuestion($question);
            $manager->persist($reponseQuestion);
            $reponseQuestion1=new ReponseQuestions();
            $reponseQuestion1->setLibeller("Pas de reponse");
            $reponseQuestion1->setGoodReponse(false);
            $reponseQuestion1->setQuestion($question);
            $reponseQuestion1->setAudio("none.mp3");
            $manager->persist($reponseQuestion1);

        }
        $manager->flush();
    }
}
