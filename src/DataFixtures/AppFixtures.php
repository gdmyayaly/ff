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
        $questionCultureGeneral =array(
            0 => array('num' => '1', 'libeller' => 'Comment surnomme-t-on le Sénégal?', 'rep1' => 'Le pays de la Téranga', 'rep2' => 'Les éléphants', 'rep3' => 'Galsen', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Le pays de la Téranga'),
            1 => array('num' => '2', 'libeller' => 'Quelle est la devise du Sénégal?', 'rep1' => 'La patrie, l\'action, la liberté', 'rep2' => 'Un peuple, un but, une foi', 'rep3' => 'Un peuple, une vérité, une loi', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Un peuple, un but, une foi'),
            2 => array('num' => '3', 'libeller' => 'Quel animal symbolise le Sénégal ?', 'rep1' => 'Le lion', 'rep2' => 'L\'éléphant', 'rep3' => 'Le singe', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Le lion'),
            3 => array('num' => '4', 'libeller' => 'Qui est l\'actuel président du Sénégal ?', 'rep1' => 'Léopold Sédar Senghor', 'rep2' => 'Macky Sall', 'rep3' => 'Abdoulaye Wade', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Macky Sall'),
            4 => array('num' => '5', 'libeller' => 'Quelle est la langue officielle du Sénégal?', 'rep1' => 'L\'Anglais', 'rep2' => 'Le Wolof', 'rep3' => 'Le Français', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Le Français'),
            5 => array('num' => '6', 'libeller' => 'Quelle est la langue locale la plus parlée au Sénégal?', 'rep1' => 'Le Peulh', 'rep2' => 'Le Sérére', 'rep3' => 'Le Wolof', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Le Wolof'),
            6 => array('num' => '7', 'libeller' => 'Combien de régions compte le Sénégal ?', 'rep1' => '20', 'rep2' => '17', 'rep3' => '14', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '14'),
            7 => array('num' => '8', 'libeller' => 'Quelle est la capitale du Sénégal?', 'rep1' => 'Saint Louis', 'rep2' => 'Dakar', 'rep3' => 'Gorée', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Dakar'),
            8 => array('num' => '9', 'libeller' => 'Dans quel continent se trouve le Sénégal?', 'rep1' => 'Europe', 'rep2' => 'Asie', 'rep3' => 'Afrique', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Afrique'),
            9 => array('num' => '10', 'libeller' => 'Qui est le premier président de la République du Sénégal?', 'rep1' => 'Abdou Diouf', 'rep2' => 'Léopold Sédar Senghor', 'rep3' => 'Abdoulaye WADE', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Léopold Sédar Senghor'),
            10 => array('num' => '11', 'libeller' => 'Qui est considéré comme le roi du Mbalakh?', 'rep1' => 'Ismaela LO', 'rep2' => 'Waly SECK', 'rep3' => 'Youssou NDOUR', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Youssou NDOUR'),
            11 => array('num' => '12', 'libeller' => 'Dans quel endroit précis de Dakar se trouve la maison des esclaves?', 'rep1' => 'Plateau', 'rep2' => 'Almadies', 'rep3' => 'Gorée', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Gorée'),
            12 => array('num' => '13', 'libeller' => 'Qui fut la première championne du Monde d\'athlétisme (400m en 2001) sénégalaise ?', 'rep1' => 'Amy Mbacké THIAM', 'rep2' => 'Sadio MANE', 'rep3' => 'El Hadji Amadou DIA BA', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Amy Mbacké THIAM'),
            13 => array('num' => '14', 'libeller' => 'Qui est l’actuel roi des arènes?', 'rep1' => 'Gris Bordeaux', 'rep2' => 'Balla Gaye', 'rep3' => 'Modou LO', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Modou LO'),
            14 => array('num' => '15', 'libeller' => 'Combien d’universités publiques compte le Sénégal?', 'rep1' => '1', 'rep2' => '5', 'rep3' => '7', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '7'),
            15 => array('num' => '16', 'libeller' => 'Qui est la première femme Premier Ministre du Sénégal?', 'rep1' => 'Mame Madior BOYE', 'rep2' => 'Aminata TOURE (Mimi)', 'rep3' => 'Aminata Mbengue NDIAYE', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Mame Madior BOYE'),
            16 => array('num' => '17', 'libeller' => 'En quelle année le Sénégal a eu son indépendance?', 'rep1' => '1957', 'rep2' => '1960', 'rep3' => '1970', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '1960'),
            17 => array('num' => '18', 'libeller' => 'Qui est l’actuel entraîneur de l’équipe nationale de football du Sénégal?', 'rep1' => 'El Hadji DIOUF', 'rep2' => 'Aliou CISSE', 'rep3' => 'Amara TRAORE', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Aliou CISSE'),
            18 => array('num' => '19', 'libeller' => 'Quelle joueur a remporté le ballon d’or fricain en 2019', 'rep1' => 'El Hadji DIOUF', 'rep2' => 'Sadio MANE', 'rep3' => 'Gana Gueye', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Sadio MANE'),
            19 => array('num' => '20', 'libeller' => 'Quel est le plus grand stade du Sénégal?', 'rep1' => 'Stade Demba Diop', 'rep2' => 'Stade Galandou Diouf', 'rep3' => 'Stade Leopold Sedar senghor', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Stade Leopold Sedar senghor'),
            20 => array('num' => '21', 'libeller' => 'Quelle est la superficie du Sénégal?', 'rep1' => '196 722', 'rep2' => '250125', 'rep3' => '174000', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '196 722'),
            21 => array('num' => '22', 'libeller' => 'Quelle est la région la plus vaste du Sénégal?', 'rep1' => 'Dakar', 'rep2' => 'Thiès', 'rep3' => 'Tambacounda', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Tambacounda'),
            22 => array('num' => '23', 'libeller' => 'Quel pays n’est pas en Afrique?', 'rep1' => 'France', 'rep2' => 'Mali', 'rep3' => 'Togo', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'France'),
            23 => array('num' => '24', 'libeller' => 'Qui organise l’évènement de mode "Dakar Fashion Week"?', 'rep1' => 'Alfadi', 'rep2' => 'Adama Paris', 'rep3' => 'Diouma Dieng Diakhaté', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Adama Paris'),
            24 => array('num' => '25', 'libeller' => 'Contre quelle équipe le Sénégal a joué la finale de la CAN 2019?', 'rep1' => 'Tunisie', 'rep2' => 'Egypt', 'rep3' => 'Algérie', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Algérie'),
            25 => array('num' => '26', 'libeller' => 'Dans quelle région du Sénégal se trouve le pont Faidherbe?', 'rep1' => 'Ziguinchor', 'rep2' => 'Thiès', 'rep3' => 'Saint Louis', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Saint Louis'),
            26 => array('num' => '27', 'libeller' => 'Le Wax est:', 'rep1' => 'Un oiseau', 'rep2' => 'Un tissu', 'rep3' => 'Un bijou', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Un tissu'),
            27 => array('num' => '28', 'libeller' => 'Comment s\'appelle le plat national sénégalais?', 'rep1' => 'Mafé', 'rep2' => 'Yassa', 'rep3' => 'Thieboudienne', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Thieboudienne'),
            28 => array('num' => '29', 'libeller' => 'Quelle est la religion la plus pratiquée au Sénégal?', 'rep1' => 'L’Islam', 'rep2' => 'Le Christianisme', 'rep3' => 'Le Judaisme', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'L’Islam'),
            29 => array('num' => '30', 'libeller' => 'Quel est le pays enclavé dans le Sénégal ?', 'rep1' => 'Guinée Bissau', 'rep2' => 'Gambie', 'rep3' => 'Mauritanie', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Gambie'),
            30 => array('num' => '31', 'libeller' => 'Quelle monnaie utilise-t-on au Sénégal ?', 'rep1' => 'Dollar Sénégalais', 'rep2' => 'Franc cfa', 'rep3' => 'Euro Sénégalais', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Le franc cfa'),
            31 => array('num' => '32', 'libeller' => 'Combien de CAN le Sénégal a remporté ?', 'rep1' => '2 fois', 'rep2' => '1 fois', 'rep3' => '0 fois', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '0 fois'),
            32 => array('num' => '33', 'libeller' => 'Quel est l\'indicatif pour appeler au Sénégal ?', 'rep1' => '77', 'rep2' => '33', 'rep3' => '221', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '221'),
            33 => array('num' => '34', 'libeller' => 'Parmi ces artistes, lequel est sénégalais ?', 'rep1' => 'Salif Keita', 'rep2' => 'Youssou Ndour', 'rep3' => 'Fodé Barro', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Youssou Ndour'),
            34 => array('num' => '35', 'libeller' => 'De quelles couleurs est le drapeau sénégalais ?', 'rep1' => 'Vert , jaune, rouge', 'rep2' => 'Bleu ,blanc, rouge', 'rep3' => 'Vert , jaune , rouge, blanc', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Vert , jaune, rouge'),
            35 => array('num' => '36', 'libeller' => 'Quel est le sport national du Sénégal ?', 'rep1' => 'La Boxe', 'rep2' => 'La lutte', 'rep3' => 'Le karaté', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'La lutte'),
            36 => array('num' => '37', 'libeller' => 'Quel est le surnom de l\'équipe nationale de football du Sénégal ?', 'rep1' => 'Les lions', 'rep2' => 'Les lions de la téranga', 'rep3' => 'Les lions indomptable', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Les lions de la téranga'),
            37 => array('num' => '38', 'libeller' => 'Sur quel continent se trouve le sénégal?', 'rep1' => 'Amérique', 'rep2' => 'Europe', 'rep3' => 'Afrique', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Afrique'),
            38 => array('num' => '39', 'libeller' => 'Quel virus affecte les sénégalais en 2020?', 'rep1' => 'Ebola', 'rep2' => 'Coronavirus', 'rep3' => 'Virus', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Coronavirus'),
            39 => array('num' => '40', 'libeller' => 'Quel est le pays ayant colonisé le Sénégal?', 'rep1' => 'France', 'rep2' => 'Gambie', 'rep3' => 'Mali', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'France'),
            40 => array('num' => '41', 'libeller' => 'Comment s’appelle l\'épouse de l’actuel Président de la République du Sénégal?', 'rep1' => 'Viviane Wade', 'rep2' => 'Mariéme Sall', 'rep3' => 'Mariéme Faye Sall', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Mariéme Faye Sall'),
            41 => array('num' => '42', 'libeller' => 'Qui a composé la musique de l’hymne national du Sénégal?', 'rep1' => 'Herbert Pepper', 'rep2' => 'Léopold Sédar Senghor', 'rep3' => 'Les Touré Kunda', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Herbert Pepper'),
            42 => array('num' => '43', 'libeller' => 'En quelle année a eu lieu le naufrage du bateau le JOOLA?', 'rep1' => '1996', 'rep2' => '2002', 'rep3' => '1998', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '2002'),
            43 => array('num' => '44', 'libeller' => 'Dans quelle région se trouve le parc le Niokolo Koba?', 'rep1' => 'Ziguinchor', 'rep2' => 'Tambacounda', 'rep3' => 'Thiès', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Tambacounda'),
            44 => array('num' => '45', 'libeller' => 'Qui est Jules Bocandé?', 'rep1' => 'Un ancien footballeur', 'rep2' => 'Un ancien ministre', 'rep3' => 'Un ancien athlète', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Un ancien footballeur'),
            45 => array('num' => '46', 'libeller' => 'Qui est Coumba Gawlo Seck?', 'rep1' => 'Une chanteuse', 'rep2' => 'Un mannequin', 'rep3' => 'Une femme politique', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Une chanteuse'),
            46 => array('num' => '47', 'libeller' => 'Comment s\'appelle l\'Université de Dakar?', 'rep1' => 'L\'Université Blaise Diagne', 'rep2' => 'L\'Université Gaston berger', 'rep3' => 'L\'Université Cheikh Anta Diop ( UCAD)', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'L\'Université Cheikh Anta Diop ( UCAD)'),
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
            0 => array('num' => '1', 'libeller' => 'Un nombre pair est un nombre :', 'rep1' => 'Divisible par 2', 'rep2' => 'Divisible par 4', 'rep3' => 'Qu\'on ne peut pas diviser', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            1 => array('num' => '2', 'libeller' => 'Combien de minutes retrouve t-on dans 1 heure?', 'rep1' => '50', 'rep2' => '60', 'rep3' => '70', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            2 => array('num' => '3', 'libeller' => '2 * 5', 'rep1' => '15', 'rep2' => '18', 'rep3' => '10', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            3 => array('num' => '4', 'libeller' => 'Quel est le double de 2?', 'rep1' => '4', 'rep2' => '8', 'rep3' => '10', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            4 => array('num' => '5', 'libeller' => 'Quel est le quart de 8?', 'rep1' => '4', 'rep2' => '2', 'rep3' => '6', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            5 => array('num' => '6', 'libeller' => 'Quel est le triple de 6?', 'rep1' => '18', 'rep2' => '30', 'rep3' => '12', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            6 => array('num' => '7', 'libeller' => 'Quelle est la moitié de 10?', 'rep1' => '5', 'rep2' => '8', 'rep3' => '3', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            7 => array('num' => '8', 'libeller' => 'Si on enlève 15mn à une heure, combien de minutes restera t-il?', 'rep1' => '30mn', 'rep2' => '45mn', 'rep3' => '5mn', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            8 => array('num' => '9', 'libeller' => 'Quel est le résultat de 12+3?', 'rep1' => '12', 'rep2' => '3', 'rep3' => '15', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            9 => array('num' => '10', 'libeller' => 'Quel est le résultat de 160 +14?', 'rep1' => '304', 'rep2' => '174', 'rep3' => '173', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            10 => array('num' => '11', 'libeller' => 'Quel est le résultat de 145 - 32?', 'rep1' => '177', 'rep2' => '112', 'rep3' => '113', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            11 => array('num' => '12', 'libeller' => 'Quel est le résultat de 386 - 25?', 'rep1' => '361', 'rep2' => '136', 'rep3' => '156', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            12 => array('num' => '13', 'libeller' => 'Quel est le résultat de 100*0?', 'rep1' => '100', 'rep2' => '0', 'rep3' => '1000', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            13 => array('num' => '14', 'libeller' => '1 m est égal à combien de cm?', 'rep1' => '100', 'rep2' => '10', 'rep3' => '1', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            14 => array('num' => '15', 'libeller' => '10 m est égal à combien de cm?', 'rep1' => '10', 'rep2' => '100', 'rep3' => '1000', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            15 => array('num' => '16', 'libeller' => 'Awa a 2 ans, son petit frère Yaya a deux ans de moins qu’elle. Quel est l’âge de Yaya?', 'rep1' => '5ans', 'rep2' => '2ans', 'rep3' => '3ans', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            16 => array('num' => '17', 'libeller' => 'Trouve t-on la même chose en faisant : 4+5 et 5+4?', 'rep1' => 'oui', 'rep2' => 'non', 'rep3' => 'Peu être', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
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
            0 => array('num' => '1', 'libeller' => 'Lequel de ces fruits est une tomate?', 'rep1' => 'Une tomate', 'rep2' => 'Une cerise', 'rep3' => 'Une pomme', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui'),
            1 => array('num' => '2', 'libeller' => 'Lequel de ces fruits est une pêche?', 'rep1' => 'Une pomme', 'rep2' => 'Une pêche', 'rep3' => 'Un avocat', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui'),
            2 => array('num' => '3', 'libeller' => 'Lequel de ces fruits est des raisins?', 'rep1' => 'Une fraise', 'rep2' => 'Un citron', 'rep3' => 'Des raisins', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui'),
            3 => array('num' => '4', 'libeller' => 'Lequel de ces fruits est une orange?', 'rep1' => 'Une pomme', 'rep2' => 'une patate', 'rep3' => 'une orange', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui'),
            4 => array('num' => '5', 'libeller' => 'Une orange en dessous de la table', 'rep1' => 'Une table et une orange au dessus', 'rep2' => 'Une orange en dessous de la table', 'rep3' => 'Une table et une orange à gauche de la table', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui'),
            5 => array('num' => '6', 'libeller' => 'La banane au dessus de la table', 'rep1' => 'Une table et une banane à droite de la table', 'rep2' => 'Une table et une banane en dessous', 'rep3' => 'Une table et une banane à gauche de la table', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui'),
            6 => array('num' => '7', 'libeller' => 'Remplacer par le mot qui convient : Tu ……………. souvent vu.', 'rep1' => 'la', 'rep2' => 'l\'as', 'rep3' => 'l\'a', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            7 => array('num' => '8', 'libeller' => 'Remplacer par le mot qui convient : ……….soient tes résultats, tu arrêteras tes études.', 'rep1' => 'quelques', 'rep2' => 'quelque', 'rep3' => 'quels que', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            8 => array('num' => '9', 'libeller' => 'Quel est le genre du nom Artère?', 'rep1' => 'Masculin (M)', 'rep2' => 'Autre (A)', 'rep3' => 'Feminin (F)', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            9 => array('num' => '10', 'libeller' => 'Quel est le genre du nom Apostrophe?', 'rep1' => 'Feminin', 'rep2' => 'Masculin', 'rep3' => 'Autre', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            10 => array('num' => '11', 'libeller' => 'Remplacer par le mot qui convient : Je n’aime pas attendre, alors ........... à l’heure s’il vous plaît.', 'rep1' => 'sois', 'rep2' => 'êtes', 'rep3' => 'soyez', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            11 => array('num' => '12', 'libeller' => 'Remplacer par le mot qui convient : Pour maigrir, il faut que tu.............du sport.', 'rep1' => 'fais', 'rep2' => 'fasses', 'rep3' => 'faisais', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            12 => array('num' => '13', 'libeller' => 'Remplacer par le mot qui convient :Grâce aux cours de français, je comprends..............les gens.', 'rep1' => 'mieux', 'rep2' => 'moins bien', 'rep3' => 'beaucoup', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            13 => array('num' => '14', 'libeller' => 'Remplacer par le mot qui convient : Demain, retour du soleil ! Il .............beau partout à Dakar.', 'rep1' => 'fait', 'rep2' => 'ferait', 'rep3' => 'fera', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            14 => array('num' => '15', 'libeller' => 'Remplacer par le mot qui convient : Je vais reprendre.........de cette tarte. Elle est délicieuse !', 'rep1' => 'Une partie', 'rep2' => 'Une part', 'rep3' => 'Une pièce', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            15 => array('num' => '16', 'libeller' => 'Remplacer par le mot qui convient : Est-ce qu’il reste des œufs dans le frigo ? - Non, il ..... plus.', 'rep1' => 'n’y en a', 'rep2' => 'n’en a', 'rep3' => 'n’y a', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            16 => array('num' => '17', 'libeller' => 'Remplacer par le mot qui convient : Il ......... les mathématiques au lycée.', 'rep1' => 'étude', 'rep2' => 'étudie', 'rep3' => 'étudié', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            17 => array('num' => '18', 'libeller' => 'Remplacer par le mot qui convient : Il est passé devant ........... café.', 'rep1' => 'le', 'rep2' => 'du', 'rep3' => 'au', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            18 => array('num' => '19', 'libeller' => 'Remplacer par le mot qui convient : Il est tard, ........... lit.', 'rep1' => 'dans', 'rep2' => 'au', 'rep3' => 'le', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            19 => array('num' => '20', 'libeller' => 'Remplacer par le mot qui convient : Je ne sais jamais…...chaussures mettre', 'rep1' => 'quel', 'rep2' => 'qu’elles', 'rep3' => 'quelles', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            20 => array('num' => '21', 'libeller' => 'Remplacer par le mot qui convient : Ne ........... fais pas tout ira bien.', 'rep1' => 't’en', 'rep2' => 'tant', 'rep3' => 'tend', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            21 => array('num' => '22', 'libeller' => 'Remplacer par le mot qui convient : Ce film, est-ce que tu..................vu', 'rep1' => 'la', 'rep2' => 'là', 'rep3' => 'l’as', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            22 => array('num' => '23', 'libeller' => 'Remplacer par le mot qui convient : Je suis ......... ce soir, tout ce bruit m’a fatigué.', 'rep1' => 'las', 'rep2' => 'là', 'rep3' => 'la', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            23 => array('num' => '24', 'libeller' => 'Remplacer par le mot qui convient : Il se.......... bien aujourd’hui.', 'rep1' => 'sens', 'rep2' => 'sent', 'rep3' => 'sans', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            24 => array('num' => '25', 'libeller' => 'Remplacer par le mot qui convient : Il pleut et ..... a pas envie de sortir.', 'rep1' => 'on n’', 'rep2' => 'on', 'rep3' => 'n’', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            25 => array('num' => '26', 'libeller' => 'Remplacer par le mot qui convient : Je n\'ai pas envie ....... envoyer autant.', 'rep1' => 'dans', 'rep2' => 'd’ent', 'rep3' => 'd’en', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            26 => array('num' => '27', 'libeller' => 'Remplacer par le mot qui convient : Ils..........heureux de vous accueillir chez eux.', 'rep1' => 'son', 'rep2' => 'sont', 'rep3' => 's’ont', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            27 => array('num' => '28', 'libeller' => 'Remplacer par le mot qui convient: Babacar, ......... tes gants, il fait froid.', 'rep1' => 'mets', 'rep2' => 'met', 'rep3' => 'mes', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            28 => array('num' => '29', 'libeller' => 'Remplacer par le mot qui convient :Ils ........ dit que je pouvais rester une semaine.', 'rep1' => 'mon', 'rep2' => 'm’ont', 'rep3' => 'mont', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            29 => array('num' => '30', 'libeller' => 'Remplacer par le mot qui convient :je n’aime pas', 'rep1' => 'sa', 'rep2' => 'ca', 'rep3' => 'ça', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            30 => array('num' => '31', 'libeller' => 'Remplacer par le mot qui convient : Est-ce que Yaya ....... aidé pour le devoir?', 'rep1' => 't\'a', 'rep2' => 't\'as', 'rep3' => 'ta', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            31 => array('num' => '32', 'libeller' => 'Remplacer par le mot qui convient: Mah ....... donné sa carte bancaire.', 'rep1' => 'ma', 'rep2' => 'm’a', 'rep3' => 'm’as', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            32 => array('num' => '33', 'libeller' => 'Remplacer par le mot qui convient :La caméra se trouve dans le salon. Il ....... trouve', 'rep1' => 'ci', 'rep2' => 'si', 'rep3' => 's\'y', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            33 => array('num' => '34', 'libeller' => 'Remplacer par le mot qui convient: Mets .......... vêtements chauds.', 'rep1' => 'ces', 'rep2' => 'ses', 'rep3' => 's’est', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            34 => array('num' => '35', 'libeller' => 'Remplacer par le mot qui convient : Je ne connais pas …….. homme.', 'rep1' => 'cette', 'rep2' => 'cet', 'rep3' => 'c\'est', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            35 => array('num' => '36', 'libeller' => 'Quel est le synonyme de triste?', 'rep1' => 'faible', 'rep2' => 'effondré', 'rep3' => 'malheureux', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            36 => array('num' => '37', 'libeller' => 'Que signifie l’expression : « Sauter aux yeux »?', 'rep1' => 'C’est évident !', 'rep2' => 'C’est bizarre !', 'rep3' => 'C’est magnifique !', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            37 => array('num' => '38', 'libeller' => 'Que signifie l’expression : « Quand les poules auront des dents » ?', 'rep1' => 'Rarement', 'rep2' => 'jamais', 'rep3' => 'souvent', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            38 => array('num' => '39', 'libeller' => 'Quelle forme est correcte ?', 'rep1' => 'J’appele', 'rep2' => 'j’apele', 'rep3' => 'j’appelle', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            39 => array('num' => '40', 'libeller' => 'Remplacer par le mot qui convient : ………..de te plaindre !', 'rep1' => 'Arêtes', 'rep2' => 'Arrête', 'rep3' => 'Arête', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            40 => array('num' => '41', 'libeller' => 'Quelle forme est correcte ?', 'rep1' => 'j’envoierai', 'rep2' => 'j’enverrai', 'rep3' => 'j’envoyerai', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            41 => array('num' => '42', 'libeller' => 'Remplacer par le mot qui convient : Elle a … attentivement les leçons.', 'rep1' => 'écoutée', 'rep2' => 'écoutées', 'rep3' => 'écouté', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            42 => array('num' => '43', 'libeller' => 'Remplacer par le mot qui convient : Elles se sont … compte de leurs erreurs.', 'rep1' => 'rendu', 'rep2' => 'rendue', 'rep3' => 'rendues', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
            43 => array('num' => '44', 'libeller' => 'Remplacer par le mot qui convient : … ! Tu vas réussir.', 'rep1' => 'vas y', 'rep2' => 'vas-y', 'rep3' => 'vas y', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non'),
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
            $audiolib = "Audio/french/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($questionfrench[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/french/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/french/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/french/Q' . $bb . '/R3.mp3';
            }
            if ($questionfrench[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/french/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/french/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/french/Q' . $bb . '/img3.svg';
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
        
        $questionlogique=array(
            0 => array('num' => '1', 'libeller' => 'Dans un aquarium se trouvent 4 poissons, deux meurt. Combien reste-il de poissons dans l\'aquarium ?', 'rep1' => '4', 'rep2' => '2', 'rep3' => '0', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            1 => array('num' => '2', 'libeller' => 'Tu participes à une course . A un moment donné, tu doubles le deuxième. Tu deviens...', 'rep1' => 'Deuxième', 'rep2' => '1er', 'rep3' => '3eme', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            2 => array('num' => '3', 'libeller' => 'Un thermomètre montre 10 °C. Combien de degrés montreront deux thermomètres ?', 'rep1' => '10 °C', 'rep2' => '20', 'rep3' => '5', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            3 => array('num' => '4', 'libeller' => 'Amadou met 10 minutes pour aller à l\'école. Combien de minutes mettra-t-il s\'il y va avec un ami ?', 'rep1' => '5 minutes', 'rep2' => '10 min', 'rep3' => '20 min', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            4 => array('num' => '5', 'libeller' => 'Il y a huit bancs dans une école. Trois bancs ont été peints en blanc. Combien de bancs y a-t-il maintenant dans l\'école ?', 'rep1' => 'Huit', 'rep2' => '3', 'rep3' => '5', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            5 => array('num' => '6', 'libeller' => 'Qui est plus léger entre un kilo de pierres et un kilo de sable?', 'rep1' => 'C\'est pareil.', 'rep2' => '1 kilo de pierres', 'rep3' => '1kilo de sable', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            6 => array('num' => '7', 'libeller' => 'Un berger a 27 brebis. Toutes meurent sauf 9. Combien en reste-t-il ?', 'rep1' => '9', 'rep2' => '18', 'rep3' => '10', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            7 => array('num' => '8', 'libeller' => 'Je m\'appelle Fatou. J\'ai un frère Atou. Mon frère a une sœur. Comment s\'appelle-t-elle ?', 'rep1' => 'Fatou', 'rep2' => 'Atou', 'rep3' => 'Sala', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            8 => array('num' => '9', 'libeller' => 'Aminata a 10 ans, son petit frère aliou a la moitié de son âge. Lorsque Aminata aura 20 ans, quel âge aura aliou ?', 'rep1' => '15', 'rep2' => '10', 'rep3' => '7', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            9 => array('num' => '10', 'libeller' => 'Il y a 10 oiseaux dans un nid. Un chasseur tire et tue un oiseau. Combien reste-t-il d\'oiseaux dans le nid ?', 'rep1' => '0', 'rep2' => '9', 'rep3' => '10', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            10 => array('num' => '11', 'libeller' => 'Combien de fois nous pouvons trouver le chiffre 9 de 1 à 100 ?', 'rep1' => '20', 'rep2' => '31', 'rep3' => '9', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            11 => array('num' => '12', 'libeller' => 'Trouvez l\'Intrus dans les Mots suivants:', 'rep1' => 'Papier', 'rep2' => 'Stylo', 'rep3' => '66', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            12 => array('num' => '13', 'libeller' => 'Trouvez l\'Intrus dans les Mots suivants:', 'rep1' => 'Bras', 'rep2' => 'Oreille', 'rep3' => 'Nez/Bouche', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            13 => array('num' => '14', 'libeller' => 'Trouvez l\'Intrus dans les Mots suivants:', 'rep1' => 'Moto', 'rep2' => 'Taxi', 'rep3' => 'Bus/Train', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            14 => array('num' => '15', 'libeller' => 'Combien y a t-il de lettres dans le mot alphabet?', 'rep1' => '8', 'rep2' => '26', 'rep3' => null, 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            15 => array('num' => '16', 'libeller' => 'Combien peut ton mettre de goutte d\'eau dans un verre vide?', 'rep1' => '0', 'rep2' => '1', 'rep3' => '1000', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            16 => array('num' => '17', 'libeller' => 'Combien d\'oeuf le coq peut il pondre dans sa vie?', 'rep1' => '100', 'rep2' => '70', 'rep3' => '0', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            17 => array('num' => '18', 'libeller' => 'Combien de carrés pouvez-vous voir ?', 'rep1' => '12', 'rep2' => '16', 'rep3' => '10', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            18 => array('num' => '19', 'libeller' => 'Combien de carrés pouvez-vous voir ?', 'rep1' => '30', 'rep2' => '16', 'rep3' => '12', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            21 => array('num' => '21', 'libeller' => 'Je viens de la savane et j\'en suis le roi, qui suis-je ?', 'rep1' => 'Un singe', 'rep2' => 'Un serpent', 'rep3' => 'Un lion', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            22 => array('num' => '22', 'libeller' => '5 soeurs sont dans une pièce. Fatou lit un livre. Coumba cuisine. Amina joue aux lido. Et Binta regarde la télé. Que fait la 5ème soeur ?', 'rep1' => 'Joue au lido', 'rep2' => 'dort', 'rep3' => 'cuisine', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            23 => array('num' => '23', 'libeller' => 'J\'ai 11 frères. Je suis le plus petit d\'entre eux, mais pourtant je suis le 2iéme après le premier. Qui-suis-je ?', 'rep1' => 'Février', 'rep2' => 'Abdoulaye', 'rep3' => 'Mars', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            24 => array('num' => '24', 'libeller' => 'J\'ai un père mais je ne suis pas son fils. J\'ai une mère mais je ne suis pas son fils. Qui suis-je ?', 'rep1' => 'Leur ainé', 'rep2' => 'Leur fille', 'rep3' => 'Leur ami', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
            25 => array('num' => '25', 'libeller' => 'Quelle est la soeur de ta tante qui elle n\'est pas ta tante ?', 'rep1' => 'Ta tante', 'rep2' => 'ton oncle', 'rep3' => 'ta mère', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '4'),
        );
        $math = $this->thematiqueRepository->findOneBy(['nom' => 'Logique']);
        for ($j = 0; $j < count($questionlogique); $j++) {
            $bb = $j + 1;
            $libeller = [];
            $question1 = [];
            $question2 = [];
            $question3 = [];
            $nonequestion = [];
            $goodanswer = [];
            $audiolib = "Audio/logique/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($questionlogique[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/logique/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/logique/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/logique/Q' . $bb . '/R3.mp3';
            }
            if ($questionlogique[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/logique/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/logique/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/logique/Q' . $bb . '/img3.svg';
            }
            for ($i = 0; $i < count($allLangue); $i++) {
                $modellib = [];
                $modellib = ["langue" => $allLangue[$i]->getNom(), "libeller" => $questionlogique[$j]["libeller"], "audio" => $audiolib, "image" => $imagelib];
                array_push($libeller, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionlogique[$j]["rep1"], "audio" => $audioquestion1, "image" => $imagequestion1];
                array_push($question1, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionlogique[$j]["rep2"], "audio" => $audioquestion2, "image" => $imagequestion2];
                array_push($question2, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questionlogique[$j]["rep3"], "audio" => $audioquestion3, "image" => $imagequestion3];
                array_push($question3, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => "je sais pas", "audio" => null, "image" => 'none.png'];
                array_push($nonequestion, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "good" => $questionlogique[$j]["rep1"]];
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

        $questiontech=array(
            0 => array('num' => '1', 'libeller' => 'Quelle périphérie nous permet de saisir dans un ordinateur?', 'rep1' => 'Souris', 'rep2' => 'Clavier', 'rep3' => 'Tablette', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            1 => array('num' => '2', 'libeller' => 'Qu\'est ce que l\'unité centrale?', 'rep1' => 'Composant de l\'ordinateur', 'rep2' => 'Boîte à outils', 'rep3' => 'Une application', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            2 => array('num' => '3', 'libeller' => 'Où s’affiche les images produites par l\'ordinateur?', 'rep1' => 'Télévision', 'rep2' => 'Ecran', 'rep3' => 'Portable', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            3 => array('num' => '4', 'libeller' => 'A quoi sert un écran d’ordinateur?', 'rep1' => 'Ecrire dans l’ordinateur', 'rep2' => 'Afficher des images produits par l’ordinateur', 'rep3' => 'Parler à un ordinateur', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            4 => array('num' => '5', 'libeller' => 'Quel logiciel est prédestiné pour les calculs, les graphiques sur l’ordinateur?', 'rep1' => 'Excel', 'rep2' => 'Word', 'rep3' => 'Whatsapp', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            5 => array('num' => '6', 'libeller' => 'Quel logiciel est prédestiné pour écrire des documents sur l’ordinateur?', 'rep1' => 'Excel', 'rep2' => 'Powerpoint', 'rep3' => 'Word', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            6 => array('num' => '7', 'libeller' => 'Laquelle de ses images n’est pas une souris?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Souris'),
            7 => array('num' => '8', 'libeller' => 'Quel icône indique le bouton d\'allumage d’un ordinateur?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Souris'),
            8 => array('num' => '9', 'libeller' => 'A quoi sert un clavier?', 'rep1' => 'Saisir du texte', 'rep2' => 'Dessiner dans un ordinateur', 'rep3' => 'Parler à l’ordinateur', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            9 => array('num' => '10', 'libeller' => 'Laquelle des images n’est pas un ordinateur?', 'rep1' => 'Ordinateur fixe', 'rep2' => 'Tablette', 'rep3' => 'Ordinateur portable', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            10 => array('num' => '11', 'libeller' => 'Laquelle de ses images n\'est pas un réseau social?', 'rep1' => 'Facebook', 'rep2' => 'Instagram', 'rep3' => 'Google', 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            11 => array('num' => '12', 'libeller' => 'Laquelle de ses images est un adresse e-mail?', 'rep1' => 'anta@growacademy', 'rep2' => 'anta@growsenegal', 'rep3' => 'anta@gmail.com', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            12 => array('num' => '13', 'libeller' => 'Pourquoi utilise t-on facebook?', 'rep1' => 'Rester en contact avec nos proches', 'rep2' => 'Faire du sport', 'rep3' => 'Coudre des habits', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            13 => array('num' => '14', 'libeller' => 'Quel est le logo de instagram?', 'rep1' => 'Logo facebook', 'rep2' => 'Logo instagram', 'rep3' => 'Logo pinterest', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            14 => array('num' => '15', 'libeller' => 'Quel est le logo de twitter?', 'rep1' => 'Logo twitter', 'rep2' => 'Oiseau simple', 'rep3' => 'Aigle', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            15 => array('num' => '16', 'libeller' => 'Quel est le logo de whatsapp?', 'rep1' => 'Logo contact téléphone', 'rep2' => 'Logo whatsapp', 'rep3' => 'Logo messenger', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            16 => array('num' => '17', 'libeller' => 'Laquelle de ces images nous permet de naviguer sur internet?', 'rep1' => 'Google Chrome', 'rep2' => 'Word', 'rep3' => 'Zoom', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            17 => array('num' => '18', 'libeller' => 'L\'informatique est:', 'rep1' => 'Un ordinateur', 'rep2' => 'Une science', 'rep3' => 'une application', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            18 => array('num' => '19', 'libeller' => 'Pour sauver les informations de manière permanente, j\'utilise:', 'rep1' => 'Un disque dur', 'rep2' => 'La souris', 'rep3' => 'La carte mère', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            19 => array('num' => '20', 'libeller' => 'La souris est un outil qui permet:', 'rep1' => 'D\'imprimer', 'rep2' => 'De pointer des éléments', 'rep3' => 'D\'envoyer des fichier', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            20 => array('num' => '21', 'libeller' => 'Internet représente un :', 'rep1' => 'Logiciel', 'rep2' => 'Ensemble d\'ordinateurs', 'rep3' => 'Réseau de réseaux', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            21 => array('num' => '22', 'libeller' => 'Pour visiter un siteweb il me faut:', 'rep1' => 'Son nom', 'rep2' => 'Son adress url', 'rep3' => 'Son numero', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Souris'),
            22 => array('num' => '23', 'libeller' => 'Quel est ce réseau social ?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Souris'),
            23 => array('num' => '24', 'libeller' => 'Ou télécharge t-on les réseaux sociaux?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Souris'),
        );
        $math = $this->thematiqueRepository->findOneBy(['nom' => 'Tech&Digital']);
        for ($j = 0; $j < count($questiontech); $j++) {
            $bb = $j + 1;
            $libeller = [];
            $question1 = [];
            $question2 = [];
            $question3 = [];
            $nonequestion = [];
            $goodanswer = [];
            $audiolib = "Audio/tech/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($questiontech[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/tech/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/tech/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/tech/Q' . $bb . '/R3.mp3';
            }
            if ($questiontech[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/tech/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/tech/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/tech/Q' . $bb . '/img3.svg';
            }
            for ($i = 0; $i < count($allLangue); $i++) {
                $modellib = [];
                $modellib = ["langue" => $allLangue[$i]->getNom(), "libeller" => $questiontech[$j]["libeller"], "audio" => $audiolib, "image" => $imagelib];
                array_push($libeller, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiontech[$j]["rep1"], "audio" => $audioquestion1, "image" => $imagequestion1];
                array_push($question1, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiontech[$j]["rep2"], "audio" => $audioquestion2, "image" => $imagequestion2];
                array_push($question2, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiontech[$j]["rep3"], "audio" => $audioquestion3, "image" => $imagequestion3];
                array_push($question3, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => "je sais pas", "audio" => null, "image" => 'none.png'];
                array_push($nonequestion, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "good" => $questiontech[$j]["rep1"]];
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


        $questiondesign=array(
            0 => array('num' => '1', 'libeller' => 'Laquelle de ces couleurs ne fait pas partie du drapeau Sénégal?', 'rep1' => 'Bleu', 'rep2' => 'Vert', 'rep3' => 'Rouge', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            1 => array('num' => '2', 'libeller' => 'Quelle couleur symbolise le danger?', 'rep1' => 'Rouge', 'rep2' => 'Violet', 'rep3' => 'Vert', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            2 => array('num' => '3', 'libeller' => 'Quelle est la couleur opposé du blanc?', 'rep1' => 'Noir', 'rep2' => 'Rose', 'rep3' => 'Marron', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            3 => array('num' => '4', 'libeller' => 'Lequel de ces deux vont de paire?', 'rep1' => 'Rouge orange', 'rep2' => 'Vert rouge', 'rep3' => 'Bleu jaune', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            4 => array('num' => '5', 'libeller' => 'La couleur est grise est obtenue en mélangeant deux couleurs. Lesquelles?', 'rep1' => 'Blanc noir', 'rep2' => 'Rouge vert', 'rep3' => 'Jaune bleu', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            5 => array('num' => '6', 'libeller' => 'Choisis la couleur la plus sombre.', 'rep1' => 'Dark Red', 'rep2' => 'Orange', 'rep3' => 'Violet', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            6 => array('num' => '7', 'libeller' => 'Choisis la couleur la plus claire.', 'rep1' => 'Carrot', 'rep2' => 'Marron', 'rep3' => 'Jaune', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            7 => array('num' => '8', 'libeller' => 'Si tu devais créer un whatsapp pour jeune fille de quelle couleur serait-elle?', 'rep1' => 'Rose', 'rep2' => 'Vert', 'rep3' => 'Violet', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            8 => array('num' => '9', 'libeller' => 'Laquelle de ces couleurs ne fait pas penser au froid?', 'rep1' => 'Orange', 'rep2' => 'Aqua', 'rep3' => 'Bleu', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            9 => array('num' => '10', 'libeller' => 'Laquelle de ces couleurs ne fait pas penser à la chaleur?', 'rep1' => 'Turquoise', 'rep2' => 'Jaune', 'rep3' => 'Rouge', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            10 => array('num' => '11', 'libeller' => 'Parmi ces mots lequel n’est pas une police d’écriture?', 'rep1' => 'Arial', 'rep2' => 'Italic', 'rep3' => 'Verdana', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            11 => array('num' => '12', 'libeller' => 'Qu\'est-ce qui permettra de gérer le gras et l’italic sur un texte?', 'rep1' => 'Le style', 'rep2' => 'La taille', 'rep3' => 'La police', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            12 => array('num' => '13', 'libeller' => 'Lequel de ces textes est de type cursive?', 'rep1' => 'Cursive', 'rep2' => 'Sans Serif', 'rep3' => 'Serif', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            13 => array('num' => '14', 'libeller' => 'Que symbolise la couleur jaune?', 'rep1' => 'Richesse', 'rep2' => 'Jeunesse', 'rep3' => 'Paresse', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            14 => array('num' => '15', 'libeller' => 'Quelle forme est plus adaptée quand on veut parler d’un groupe?', 'rep1' => 'Cercle', 'rep2' => 'Carré', 'rep3' => 'Triangle', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            15 => array('num' => '16', 'libeller' => 'Une forme est composée de deux éléments essentiels.', 'rep1' => 'Le fond et le contour', 'rep2' => 'La taille et la couleur', 'rep3' => 'La hauteur et la largeur', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            16 => array('num' => '17', 'libeller' => 'Choisie la taille de police qui convient:', 'rep1' => 'Illustro 15px', 'rep2' => 'Illustro 10px', 'rep3' => 'Illustro 20px', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            17 => array('num' => '18', 'libeller' => 'Que symbolise la couleur orange?', 'rep1' => 'Bonheur', 'rep2' => 'Pluie', 'rep3' => 'Mort', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            18 => array('num' => '19', 'libeller' => 'Lequel de ces termes est representé par la couleur verte?', 'rep1' => 'Nature', 'rep2' => 'Jeunesse', 'rep3' => 'Bonheur', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            19 => array('num' => '20', 'libeller' => 'Laquelle de ses figures a des bordures arrondies?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'Bleu'),
            20 => array('num' => '21', 'libeller' => 'Lequel des ces logiciels nous permet de faire des montage photo?', 'rep1' => 'Photoshop', 'rep2' => 'Netflix', 'rep3' => 'Vimeo', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            21 => array('num' => '22', 'libeller' => 'Laquelle des ces applications ne peut pas faire de montage photo?', 'rep1' => 'Photogrid', 'rep2' => 'Picsart', 'rep3' => 'Youtube', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            22 => array('num' => '23', 'libeller' => 'A quoi sert le design?', 'rep1' => 'Embellir', 'rep2' => 'Simplifier', 'rep3' => 'Raccourcir', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
            23 => array('num' => '25', 'libeller' => 'Comment appel t-on quelqu\'un qui fait du design?', 'rep1' => 'Designer', 'rep2' => 'Déserteur', 'rep3' => 'Dessinateur', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Bleu'),
        );
        $math = $this->thematiqueRepository->findOneBy(['nom' => 'Design']);
        for ($j = 0; $j < count($questiondesign); $j++) {
            $bb = $j + 1;
            $libeller = [];
            $question1 = [];
            $question2 = [];
            $question3 = [];
            $nonequestion = [];
            $goodanswer = [];
            $audiolib = "Audio/design/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($questiondesign[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/design/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/design/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/design/Q' . $bb . '/R3.mp3';
            }
            if ($questiondesign[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/design/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/design/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/design/Q' . $bb . '/img3.svg';
            }
            for ($i = 0; $i < count($allLangue); $i++) {
                $modellib = [];
                $modellib = ["langue" => $allLangue[$i]->getNom(), "libeller" => $questiondesign[$j]["libeller"], "audio" => $audiolib, "image" => $imagelib];
                array_push($libeller, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiondesign[$j]["rep1"], "audio" => $audioquestion1, "image" => $imagequestion1];
                array_push($question1, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiondesign[$j]["rep2"], "audio" => $audioquestion2, "image" => $imagequestion2];
                array_push($question2, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiondesign[$j]["rep3"], "audio" => $audioquestion3, "image" => $imagequestion3];
                array_push($question3, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => "je sais pas", "audio" => null, "image" => 'none.png'];
                array_push($nonequestion, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "good" => $questiondesign[$j]["rep1"]];
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


        //QUIzz Tuto
        $questiontuto=array(
            0 => array('num' => '1', 'libeller' => 'Quelle est la capitale du Sénégal', 'rep1' => 'Thiès', 'rep2' => 'Dakar', 'rep3' => 'Saint-Louis', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => 'Une Dakar'),
            1 => array('num' => '2', 'libeller' => 'Lequel de ces fruits est une Tomate?', 'rep1' => null, 'rep2' => null, 'rep3' => null, 'picto' => 'oui', 'audio' => 'non', 'onlyimage' => 'oui', 'bonnereponse' => 'img3.svg'),
            2 => array('num' => '3', 'libeller' => 'Combien vaut 1+1', 'rep1' => '1', 'rep2' => '2', 'rep3' => '3', 'picto' => 'non', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '2'),
            3 => array('num' => '4', 'libeller' => 'Quel animal symbolise le Sénégal ?', 'rep1' => 'Éléphant', 'rep2' => 'Lion', 'rep3' => 'Singe', 'picto' => 'oui', 'audio' => 'oui', 'onlyimage' => 'non', 'bonnereponse' => '2'),
        );
        for ($j = 0; $j < count($questiontuto); $j++) {
            $bb = $j + 1;
            $libeller = [];
            $question1 = [];
            $question2 = [];
            $question3 = [];
            $nonequestion = [];
            $goodanswer = [];
            $audiolib = "Audio/Tuto/Q" . $bb . "/Q1.mp3";
            $imagelib = null;
            $audioquestion1 = null;
            $imagequestion1 = null;
            $audioquestion2 = null;
            $imagequestion2 = null;
            $audioquestion3 = null;
            $imagequestion3 = null;
            if ($questiontuto[$j]["audio"] === "oui") {
                $audioquestion1 = 'Audio/Tuto/Q' . $bb . '/R1.mp3';
                $audioquestion2 = 'Audio/Tuto/Q' . $bb . '/R2.mp3';
                $audioquestion3 = 'Audio/Tuto/Q' . $bb . '/R3.mp3';
            }
            if ($questiontuto[$j]["picto"] === "oui") {
                $imagequestion1 = 'Picto/Tuto/Q' . $bb . '/img1.svg';
                $imagequestion2 = 'Picto/Tuto/Q' . $bb . '/img2.svg';
                $imagequestion3 = 'Picto/Tuto/Q' . $bb . '/img3.svg';
            }
            for ($i = 0; $i < count($allLangue); $i++) {
                $modellib = [];
                $modellib = ["langue" => $allLangue[$i]->getNom(), "libeller" => $questiontuto[$j]["libeller"], "audio" => $audiolib, "image" => $imagelib];
                array_push($libeller, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiontuto[$j]["rep1"], "audio" => $audioquestion1, "image" => $imagequestion1];
                array_push($question1, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiontuto[$j]["rep2"], "audio" => $audioquestion2, "image" => $imagequestion2];
                array_push($question2, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => $questiontuto[$j]["rep3"], "audio" => $audioquestion3, "image" => $imagequestion3];
                array_push($question3, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "question" => "je sais pas", "audio" => null, "image" => 'none.png'];
                array_push($nonequestion, $modellib);
                $modellib = ["langue" => $allLangue[$i]->getNom(), "good" => $questiontuto[$j]["bonnereponse"]];
                array_push($goodanswer, $modellib);
            }
            $question = new Questionnaires();
            $question->setLibeller($libeller);
            $question->setReponse1($question1);
            $question->setReponse2($question2);
            $question->setReponse3($question3);
            $question->setReponse4($nonequestion);
            $question->setBonnereponse($goodanswer);
            // $question->setThematique($math);
            $manager->persist($question);
        }
        $manager->flush();
    }
}
