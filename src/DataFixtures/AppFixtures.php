<?php

namespace App\DataFixtures;

use App\Entity\Langue;
use App\Entity\Questionnaires;
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
        $theme = [
            "Culture Géneral" => [
                "Français" => ["debut" => "culturegeneraldebutfr.mp3", "fin" => "culturegeneralfinfr.mp3"],
                "Wolof" => ["debut" => "culturegeneraldebutwolof.mp3", "fin" => "culturegeneralfinwolof.mp3"],
            ],
            "Mathématiques" => [
                "Français" => ["debut" => "mathdebutfr.mp3", "fin" => "mathfinfr.mp3"],
                "Wolof" => ["debut" => "mathdebutwolof.mp3", "fin" => "mathfinwolof.mp3"],
            ],
            "Français" => [
                "Français" => ["debut" => "francaisdebutfr.mp3", "fin" => "francaisfinfr.mp3"],
                "Wolof" => ["debut" => "francaisdebutwolof.mp3", "fin" => "francaisfinwolof.mp3"],
            ],
            "Design" => [
                "Français" => ["debut" => "designdebutfr.mp3", "fin" => "designfinfr.mp3"],
                "Wolof" => ["debut" => "designdebutwolof.mp3", "fin" => "designfinwolof.mp3"],
            ],
            "Tech&Digital" => [
                "Français" => ["debut" => "techdigitaldebutfr.mp3", "fin" => "techdigitalfinfr.mp3"],
                "Wolof" => ["debut" => "techdigitaldebutwolof.mp3", "fin" => "techdigitalfinwolof.mp3"],
            ],
            "Logique" => [
                "Français" => ["debut" => "logiquedebutfr.mp3", "fin" => "logiquefinfr.mp3"],
                "Wolof" => ["debut" => "logiquedebutwolof.mp3", "fin" => "logiquefinwolof.mp3"],
            ]
        ];
        for ($i = 0; $i < count($theme); $i++) {
            $thematique = new Thematique();
            $thematique->setNom($tabtheme[$i]);

            $thematique->setMedia($theme[$tabtheme[$i]]);
            $manager->persist($thematique);
        }
        $manager->flush();
        $questionCultureGeneral = array(
            0 => array('num' => '1', 'libeller' => "Comment surnomme-t-on le Sénégal?", "rep1" => "Le pays de la Téranga", "rep2" => "Les éléphants", "rep3" => "Galsen", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Le pays de la Téranga"),
            1 => array('num' => '2', 'libeller' => "Quelle est la devise du Sénégal?", "rep1" => "La patrie, l'action, la liberté", "rep2" => "Un peuple, un but, une foi", "rep3" => "Un peuple, une vérité, une loi", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Un peuple, un but, une foi"),
            2 => array('num' => '3', 'libeller' => "Quel animal symbolise le Sénégal ?", "rep1" => "Le lion", "rep2" => "L'éléphant", "rep3" => "Le singe", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Le lion"),
            3 => array('num' => '4', 'libeller' => "Qui est l'actuel président du Sénégal ?", "rep1" => "Léopold Sédar Senghor", "rep2" => "Macky Sall", "rep3" => "Abdoulaye Wade", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Macky Sall"),
            4 => array('num' => '5', 'libeller' => "Quelle est la langue officielle du Sénégal?", "rep1" => "L'Anglais", "rep2" => "Le Wolof", "rep3" => "Le Français", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Le Français"),
            5 => array('num' => '6', 'libeller' => "Quelle est la langue locale la plus parlée au Sénégal?", "rep1" => "Le Peulh", "rep2" => "Le Sérére", "rep3" => "Le Wolof", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Le Wolof"),
            // 6 => array('num' => '7', 'libeller' => "Combien de régions compte le Sénégal ?", "rep1" => "20", "rep2" => "17", "rep3" => "14", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "14"),
            // 7 => array('num' => '8', 'libeller' => "Quelle est la capitale du Sénégal?", "rep1" => "Saint Louis", "rep2" => "Dakar", "rep3" => "Gorée", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Dakar"),
            // 8 => array('num' => '9', 'libeller' => "Dans quel continent se trouve le Sénégal?", "rep1" => "Europe", "rep2" => "Asie", "rep3" => "Afrique", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Afrique"),
            // 9 => array('num' => '10', 'libeller' => "Qui est le premier président de la République du Sénégal?", "rep1" => "Abdou Diouf", "rep2" => "Léopold Sédar Senghor", "rep3" => "Abdoulaye WADE", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Léopold Sédar Senghor"),
            // 10 => array('num' => '11', 'libeller' => "Qui est considéré comme le roi du Mbalakh?", "rep1" => "Ismaela LO", "rep2" => "Waly SECK", "rep3" => "Youssou NDOUR", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Youssou NDOUR"),
            // 11 => array('num' => '12', 'libeller' => "Dans quel endroit précis de Dakar se trouve la maison des esclaves?", "rep1" => "Plateau", "rep2" => "Almadies", "rep3" => "Gorée", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Gorée"),
            // 12 => array('num' => '13', 'libeller' => "Qui fut la première championne du Monde d'athlétisme (400m en 2001) sénégalaise ?", "rep1" => "Amy Mbacké THIAM", "rep2" => "Sadio MANE", "rep3" => "El Hadji Amadou DIA BA", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Amy Mbacké THIAM"),
            // 13 => array('num' => '14', 'libeller' => "Qui est l’actuel roi des arènes?", "rep1" => "Gris Bordeaux", "rep2" => "Balla Gaye", "rep3" => "Modou LO", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Modou LO"),
            // 14 => array('num' => '15', 'libeller' => "Combien d’universités publiques compte le Sénégal?", "rep1" => "8", "rep2" => "5", "rep3" => "7", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "8"),
            // 15 => array('num' => '16', 'libeller' => "Qui est la première femme Premier Ministre du Sénégal?", "rep1" => "Mame Madior BOYE", "rep2" => "Aminata TOURE (Mimi)", "rep3" => "Aminata Mbengue NDIAYE", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Mame Madior BOYE"),
            // 16 => array('num' => '17', 'libeller' => "En quelle année le Sénégal a eu son indépendance?", "rep1" => "1957", "rep2" => "1960", "rep3" => "1970", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "1960"),
            // 17 => array('num' => '18', 'libeller' => "Qui est l’actuel entraîneur de l’équipe nationale de football du Sénégal?", "rep1" => "El Hadji DIOUF", "rep2" => "Aliou CISSE", "rep3" => "Amara TRAORE", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Aliou CISSE"),
            // 18 => array('num' => '19', 'libeller' => "Quelle joueur a remporté le ballon d’or fricain en 2019", "rep1" => "El Hadji DIOUF", "rep2" => "Sadio MANE", "rep3" => "Gana Gueye", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Sadio MANE"),
            // 19 => array('num' => '20', 'libeller' => "Quel est le plus grand stade du Sénégal?", "rep1" => "Stade Demba Diop", "rep2" => "Stade Galandou Diouf", "rep3" => "Stade Leopold Sedar senghor", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Stade Leopold Sedar senghor"),
            // 20 => array('num' => '21', 'libeller' => "Quelle est la superficie du Sénégal?", "rep1" => "196 712", "rep2" => "250125", "rep3" => "174000", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "196 712"),
            // 21 => array('num' => '22', 'libeller' => "Quelle est la région la plus vaste du Sénégal?", "rep1" => "Dakar", "rep2" => "Thiès", "rep3" => "Tambacounda", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Tambacounda"),
            // 22 => array('num' => '23', 'libeller' => "Quel pays n’est pas en Afrique?", "rep1" => "France", "rep2" => "Mali", "rep3" => "Togo", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "France"),
            // 23 => array('num' => '24', 'libeller' => "Qui organise l’évènement de mode Dakar Fashion Week ?", "rep1" => "Alfadi", "rep2" => "Adama Paris", "rep3" => "Diouma Dieng Diakhaté", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Adama Paris"),
            // 24 => array('num' => '25', 'libeller' => "Contre quelle équipe le Sénégal a joué la finale de la CAN 2019?", "rep1" => "Tunisie", "rep2" => "Egypt", "rep3" => "Algérie", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Algérie"),
            // 25 => array('num' => '26', 'libeller' => "Dans quelle région du Sénégal se trouve le pont Faidherbe?", "rep1" => "Ziguinchor", "rep2" => "Thiès", "rep3" => "Saint Louis", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Saint Louis"),
            // 26 => array('num' => '28', 'libeller' => "Le Wax est:", "rep1" => "Un oiseau", "rep2" => "Un tissu", "rep3" => "Un bijou", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Un tissu"),
            // 27 => array('num' => '29', 'libeller' => "Comment s'appelle le plat national sénégalais?", "rep1" => "Mafé", "rep2" => "Yassa", "rep3" => "Thieboudienne", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Thieboudienne"),
            // 28 => array('num' => '30', 'libeller' => "Quelle est la religion la plus pratiquée au Sénégal?", "rep1" => "L’Islam", "rep2" => "Le Christianisme", "rep3" => "Le Judaisme", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "L’Islam"),
            // 29 => array('num' => '31', 'libeller' => "Quel est le pays enclavé dans le Sénégal ?", "rep1" => "Guinée Bissau", "rep2" => "Gambie", "rep3" => "Mauritanie", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Gambie"),
            // 30 => array('num' => '32', 'libeller' => "Quelle monnaie utilise-t-on au Sénégal ?", "rep1" => "Le Dollar Sénégalais", "rep2" => "Le franc cfa", "rep3" => "Le euro senegalais", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Le franc cfa"),
            // 31 => array('num' => '33', 'libeller' => "Combien de CAN le Sénégal a remporté ?", "rep1" => "2 fois", "rep2" => "1 fois", "rep3" => "0 fois", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "0 fois"),
            // 32 => array('num' => '34', 'libeller' => "Quel est l'indicatif pour appeler au Sénégal ?", "rep1" => "77", "rep2" => "33", "rep3" => "221", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "221"),
            // 33 => array('num' => '35', 'libeller' => "Parmi ces artistes, lequel est sénégalais ?", "rep1" => "Salif Keita", "rep2" => "Youssou Ndour", "rep3" => "Fodé Barro", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Youssou Ndour"),
            // 34 => array('num' => '36', 'libeller' => "De quelles couleurs est le drapeau sénégalais ?", "rep1" => "Vert , jaune, rouge", "rep2" => "Bleu ,blanc, rouge", "rep3" => "Vert , jaune , rouge, blanc", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Vert , jaune, rouge"),
            // 35 => array('num' => '37', 'libeller' => "Quel est le sport national du Sénégal ?", "rep1" => "La Boxe", "rep2" => "La lutte", "rep3" => "Le karaté", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "La lutte"),
            // 36 => array('num' => '38', 'libeller' => "Quel est le surnom de l'équipe nationale de football du Sénégal ?", "rep1" => "Les lions", "rep2" => "Les lions de la téranga", "rep3" => "Les lions indomptable", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Les lions de la téranga"),
            // 37 => array('num' => '39', 'libeller' => "Sur quel continent se trouve le sénégal?", "rep1" => "Amérique", "rep2" => "Europe", "rep3" => "Afrique", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Afrique"),
            // 38 => array('num' => '40', 'libeller' => "Quel virus affecte les sénégalais en 2020?", "rep1" => "Ebola", "rep2" => "Coronavirus", "rep3" => "Virus", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Coronavirus"),
            // 39 => array('num' => '41', 'libeller' => "Quelle est la superficie du Sénégal?", "rep1" => "197 000 km2", "rep2" => "200 000km2", "rep3" => "196 772 km2", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "196 772 km2"),
            // 40 => array('num' => '42', 'libeller' => "Quel est le pays ayant colonisé le Sénégal?", "rep1" => "France", "rep2" => "Gambie", "rep3" => "Mali", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "France"),
            // 41 => array('num' => '43', 'libeller' => "Comment s’appelle l'épouse de l’actuel Président de la République du Sénégal?", "rep1" => "Viviane Wade", "rep2" => "Mariéme Sall", "rep3" => "Mariéme Faye Sall", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Mariéme Faye Sall"),
            // 42 => array('num' => '44', 'libeller' => "Quelle styliste Sénégalaise organise Le DAKAR fashion week", "rep1" => "Collé Sow Ardo", "rep2" => "Diouma Dieng Diakhaté", "rep3" => "Adama Paris", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Adama Paris"),
            // 43 => array('num' => '45', 'libeller' => "Qui a composé la musique de l’hymne national du Sénégal?", "rep1" => "Herbert Pepper", "rep2" => "Léopold Sédar Senghor", "rep3" => "Les Touré Kunda", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Herbert Pepper"),
            // 44 => array('num' => '46', 'libeller' => "En quelle année a eu lieu le naufrage du bateau le JOOLA?", "rep1" => "1996", "rep2" => "2002", "rep3" => "1998", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "2002"),
            // 45 => array('num' => '47', 'libeller' => "Dans quelle région se trouve le parc le Niokolo Koba?", "rep1" => "Ziguinchor", "rep2" => "Tambacounda", "rep3" => "Thiès", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Tambacounda"),
            // 46 => array('num' => '48', 'libeller' => "Qui est Jules Bocandé?", "rep1" => "Un ancien footballeur", "rep2" => "Un ancien ministre", "rep3" => "Un ancien athlète", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Un ancien footballeur"),
            // 47 => array('num' => '49', 'libeller' => "Qui est Coumba Gawlo Seck?", "rep1" => "Une chanteuse", "rep2" => "Un mannequin", "rep3" => "Une femme politique", "picto" => "oui", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "Une chanteuse"),
            // 48 => array('num' => '50', 'libeller' => "Comment s'appelle l'Université de Dakar?", "rep1" => "L'Université Blaise Diagne", "rep2" => "L'Université Gaston berger", "rep3" => "L'Université Cheikh Anta Diop ( UCAD)", "picto" => "non", "audio" => "oui", "onlyimage" => "non", "bonnereponse" => "L'Université Cheikh Anta Diop ( UCAD)"),
        );
        $culturegeneral = $this->thematiqueRepository->findOneBy(['nom' => 'Culture Géneral']);
        $allLangue = $this->langueRepository->findAll();
        for ($j = 0; $j < count($questionCultureGeneral); $j++) {
            $bb = $j + 1;
            $libeller = [];
            $question1 = [];
            $question2 = [];
            $question3 = [];
            $nonequestion = [];
            $goodanswer = [];
            $audiolib = "Audio/culture/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($questionCultureGeneral[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/culture/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/culture/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/culture/Q' . $bb . '/R3.mp3';
            }
            if ($questionCultureGeneral[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/culture/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/culture/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/culture/Q' . $bb . '/img3.svg';
            }
            for ($i = 0; $i < count($allLangue); $i++) {
                $modellib = [];
                $modellib = ["langue" => $allLangue[$i]->getNom(), "libeller" => $questionCultureGeneral[$j]["libeller"], "audio" => $audiolib, "image" => $imagelib];
                array_push($libeller, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionCultureGeneral[$j]["rep1"], "audio" => $audioquestion1, "image" => $imagequestion1];
                array_push($question1, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionCultureGeneral[$j]["rep2"], "audio" => $audioquestion2, "image" => $imagequestion2];
                array_push($question2, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionCultureGeneral[$j]["rep3"], "audio" => $audioquestion3, "image" => $imagequestion3];
                array_push($question3, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => "je sais pas", "audio" => null, "image" => 'none.png'];
                array_push($nonequestion, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "good" => $questionCultureGeneral[$j]["rep1"]];
                array_push($goodanswer, $modellib);
            }
            $question = new Questionnaires();
            $question->setLibeller($libeller);
            $question->setReponse1($question1);
            $question->setReponse2($question2);
            $question->setReponse3($question3);
            $question->setReponse4($nonequestion);
            $question->setBonnereponse($goodanswer);
            $question->setThematique($culturegeneral);
            $manager->persist($question);
        }
        $manager->flush();
        $quesionMath = array(
            0 => array('num' => '1', 'libeller' => 'Un nombre pair est un nombre :', 'rep1' => 'Divisible par 2', 'rep2' => 'Divisible par 4', 'rep3' => 'Qu\'on ne peut pas diviser', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Divisible par 2'),
            1 => array('num' => '2', 'libeller' => 'Combien de minutes retrouve t-on dans 1 heure?', 'rep1' => '50', 'rep2' => '60', 'rep3' => '70', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '60'),
            2 => array('num' => '7', 'libeller' => '2 * 5', 'rep1' => '15', 'rep2' => '18', 'rep3' => '10', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '10'),
            3 => array('num' => '8', 'libeller' => 'Quel est le double de 2?', 'rep1' => '4', 'rep2' => '8', 'rep3' => '10', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            4 => array('num' => '9', 'libeller' => 'Quel est le quart de 8?', 'rep1' => '4', 'rep2' => '2', 'rep3' => '6', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '2'),
            // 5 => array('num' => '10', 'libeller' => 'Quel est le triple de 6?', 'rep1' => '18', 'rep2' => '30', 'rep3' => '12', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '18'),
            // 6 => array('num' => '11', 'libeller' => 'Quelle est la moitié de 10?', 'rep1' => '5', 'rep2' => '8', 'rep3' => '3', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '5'),
            // 7 => array('num' => '13', 'libeller' => 'Si on enlève 15mn à une heure, combien de minutes restera t-il?', 'rep1' => '30mn', 'rep2' => '45mn', 'rep3' => '5mn', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '45mn'),
            // 8 => array('num' => '14', 'libeller' => 'Quel est le résultat de 12+3?', 'rep1' => '12', 'rep2' => '3', 'rep3' => '15', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '15'),
            // 9 => array('num' => '15', 'libeller' => 'Quel est le résultat de 160 +14?', 'rep1' => '304', 'rep2' => '174', 'rep3' => '173', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '174'),
            // 10 => array('num' => '17', 'libeller' => 'Quel est le résultat de 145 - 32?', 'rep1' => '177', 'rep2' => '112', 'rep3' => '113', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '113'),
            // 11 => array('num' => '18', 'libeller' => 'Quel est le résultat de 386 - 25?', 'rep1' => '361', 'rep2' => '136', 'rep3' => '156', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '361'),
            // 12 => array('num' => '19', 'libeller' => 'Quel est le résultat de 100*0?', 'rep1' => '100', 'rep2' => '0', 'rep3' => '1000', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '0'),
            // 13 => array('num' => '20', 'libeller' => '1 m est égal à combien de cm?', 'rep1' => '100', 'rep2' => '10', 'rep3' => '1', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '100'),
            // 14 => array('num' => '21', 'libeller' => '10 m est égal à combien de cm?', 'rep1' => '10', 'rep2' => '100', 'rep3' => '1000', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '1000'),
            // 15 => array('num' => '22', 'libeller' => 'Awa a 5 ans, son petit frère Yaya a deux ans de moins qu’elle. Quel est l’âge de Yaya?', 'rep1' => '5ans', 'rep2' => '2ans', 'rep3' => '3ans', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '3ans'),
            // 16 => array('num' => '24', 'libeller' => 'Trouve t-on la même chose en faisant : 4+5 et 5+4?', 'rep1' => 'oui', 'rep2' => 'non', 'rep3' => 'Peu être', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'oui'),
        );
        $math = $this->thematiqueRepository->findOneBy(['nom' => 'Mathématiques']);
        for ($j = 0; $j < count($quesionMath); $j++) {
            $bb = $j + 1;
            $libeller = [];
            $question1 = [];
            $question2 = [];
            $question3 = [];
            $nonequestion = [];
            $goodanswer = [];
            $audiolib = "Audio/math/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($quesionMath[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/math/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/math/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/math/Q' . $bb . '/R3.mp3';
            }
            if ($quesionMath[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/math/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/math/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/math/Q' . $bb . '/img3.svg';
            }
            for ($i = 0; $i < count($allLangue); $i++) {
                $modellib = [];
                $modellib = ["langue" => $allLangue[$i]->getNom(), "libeller" => $quesionMath[$j]["libeller"], "audio" => $audiolib, "image" => $imagelib];
                array_push($libeller, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $quesionMath[$j]["rep1"], "audio" => $audioquestion1, "image" => $imagequestion1];
                array_push($question1, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $quesionMath[$j]["rep2"], "audio" => $audioquestion2, "image" => $imagequestion2];
                array_push($question2, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $quesionMath[$j]["rep3"], "audio" => $audioquestion3, "image" => $imagequestion3];
                array_push($question3, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => "je sais pas", "audio" => null, "image" => 'none.png'];
                array_push($nonequestion, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "good" => $quesionMath[$j]["rep1"]];
                array_push($goodanswer, $modellib);
            }
            $question = new Questionnaires();
            $question->setLibeller($libeller);
            $question->setReponse1($question1);
            $question->setReponse2($question2);
            $question->setReponse3($question3);
            $question->setReponse4($nonequestion);
            $question->setBonnereponse($goodanswer);
            $question->setThematique($math);
            $manager->persist($question);
        }
        $manager->flush();
        $questionfrench=array(
            0 => array('num' => '1', 'libeller' => 'Lequel de ces fruits est une tomate?', 'rep1' => 'Une tomate', 'rep2' => 'Une cerise', 'rep3' => 'Une pomme', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Une tomate'),
            1 => array('num' => '2', 'libeller' => 'Lequel de ces fruits est une pêche?', 'rep1' => 'Une pomme', 'rep2' => 'Une pêche', 'rep3' => 'Un avocat', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Une pêche'),
            2 => array('num' => '3', 'libeller' => 'Lequel de ces fruits est des raisins?', 'rep1' => 'Une fraise', 'rep2' => 'Un citron', 'rep3' => 'Des raisins', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Des raisins'),
            3 => array('num' => '4', 'libeller' => 'Lequel de ces fruits est une orange?', 'rep1' => 'Une pomme', 'rep2' => 'une patate', 'rep3' => 'une orange', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'une orange'),
            4 => array('num' => '5', 'libeller' => 'Une orange en dessous de la table', 'rep1' => 'Une table et une orange au dessus', 'rep2' => 'Une orange en dessous de la table', 'rep3' => 'Une table et une orange à gauche de la table', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => ''),
            5 => array('num' => '6', 'libeller' => 'La banane au dessus de la table', 'rep1' => 'Une table et une banane à droite de la table', 'rep2' => 'Une table et une banane en dessous', 'rep3' => 'Une table et une banane à gauche de la table', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => ''),
            // 6 => array('num' => '7', 'libeller' => 'Remplacer par le mot qui convient : Tu ……………. souvent vu.', 'rep1' => 'la', 'rep2' => 'l\'as', 'rep3' => 'l\'a', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'l’as'),
            // 7 => array('num' => '8', 'libeller' => 'Remplacer par le mot qui convient : ……….soient tes résultats, tu arrêteras tes études.', 'rep1' => 'quelques', 'rep2' => 'quelque', 'rep3' => 'quels que', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'quels que'),
            // 8 => array('num' => '9', 'libeller' => 'Quel est le genre du nom Artère?', 'rep1' => 'Masculin (M)', 'rep2' => 'Autre (A)', 'rep3' => 'Feminin (F)', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Feminin (F)'),
            // 9 => array('num' => '10', 'libeller' => 'Quel est le genre du nom Apostrophe?', 'rep1' => 'Feminin', 'rep2' => 'Masculin', 'rep3' => 'Autre', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
            // 10 => array('num' => '11', 'libeller' => 'Remplacer par le mot qui convient : Je n’aime pas attendre, alors ........... à l’heure s’il vous plaît.', 'rep1' => 'sois', 'rep2' => 'êtes', 'rep3' => 'soyez', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
            // 11 => array('num' => '12', 'libeller' => 'Remplacer par le mot qui convient : Pour maigrir, il faut que tu.............du sport.', 'rep1' => 'fais', 'rep2' => 'fasses', 'rep3' => 'faisais', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
            // 12 => array('num' => '13', 'libeller' => 'Remplacer par le mot qui convient :Grâce aux cours de français, je comprends..............les gens.', 'rep1' => 'mieux', 'rep2' => 'moins bien', 'rep3' => 'beaucoup', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
            // 13 => array('num' => '14', 'libeller' => 'Remplacer par le mot qui convient : Demain, retour du soleil ! Il .............beau partout à Dakar.', 'rep1' => 'fait', 'rep2' => 'ferait', 'rep3' => 'fera', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
            // 14 => array('num' => '15', 'libeller' => 'Remplacer par le mot qui convient : Je vais reprendre.........de cette tarte. Elle est délicieuse !', 'rep1' => 'Une partie', 'rep2' => 'Une part', 'rep3' => 'Une pièce', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
            // 15 => array('num' => '16', 'libeller' => 'Remplacer par le mot qui convient : Est-ce qu’il reste des œufs dans le frigo ? - Non, il ..... plus.', 'rep1' => 'n’y en a', 'rep2' => 'n’en a', 'rep3' => 'n’y a', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
            // 16 => array('num' => '17', 'libeller' => 'Remplacer par le mot qui convient : Il ......... les mathématiques au lycée.', 'rep1' => 'étude', 'rep2' => 'étudie', 'rep3' => 'étudié', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => ''),
        );
        $math = $this->thematiqueRepository->findOneBy(['nom' => 'Français']);
        for ($j = 0; $j < count($questionfrench); $j++) {
            $bb = $j + 1;
            $libeller = [];
            $question1 = [];
            $question2 = [];
            $question3 = [];
            $nonequestion = [];
            $goodanswer = [];
            $audiolib = "Audio/Français/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($questionfrench[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/Français/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/Français/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/Français/Q' . $bb . '/R3.mp3';
            }
            if ($questionfrench[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/Français/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/Français/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/Français/Q' . $bb . '/img3.svg';
            }
            for ($i = 0; $i < count($allLangue); $i++) {
                $modellib = [];
                $modellib = ["langue" => $allLangue[$i]->getNom(), "libeller" => $questionfrench[$j]["libeller"], "audio" => $audiolib, "image" => $imagelib];
                array_push($libeller, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionfrench[$j]["rep1"], "audio" => $audioquestion1, "image" => $imagequestion1];
                array_push($question1, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionfrench[$j]["rep2"], "audio" => $audioquestion2, "image" => $imagequestion2];
                array_push($question2, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionfrench[$j]["rep3"], "audio" => $audioquestion3, "image" => $imagequestion3];
                array_push($question3, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => "je sais pas", "audio" => null, "image" => 'none.png'];
                array_push($nonequestion, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "good" => $questionfrench[$j]["rep1"]];
                array_push($goodanswer, $modellib);
            }
            $question = new Questionnaires();
            $question->setLibeller($libeller);
            $question->setReponse1($question1);
            $question->setReponse2($question2);
            $question->setReponse3($question3);
            $question->setReponse4($nonequestion);
            $question->setBonnereponse($goodanswer);
            $question->setThematique($math);
            $manager->persist($question);
        }
        $manager->flush();
    }
}
