<?php

namespace Database\Seeders;

use App\Models\UserOpinion;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Opinion;

class UserOpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
                     "C'est un peu court, jeune homme ! On pouvait dire... oh ! Dieu ! ... bien des choses en somme...",
                     "si j'avais un tel nez,Il faudrait sur le champ que je me l'amputasse !",
                     "faites-vous fabriquer un hanap ! ",
                     "c'est une péninsule ! ",
                     "monsieur, ou de boîte à ciseaux ? ",
                     "Que paternellement vous vous préoccupâtes De tendre ce perchoir à leurs petites pattes ? ",
                     "La vapeur du tabac vous sort-elle du nez Sans qu'un voisin ne crie au feu de cheminée ? ",
                     "Par ce poids, de tomber en avant sur le sol ! ",
                     "faites-lui faire un petit parasol De peur que sa couleur au soleil ne se fane ! ",
                     "Dut avoir sous le front tant de chair sur tant d'os ! ",
                     "Pour pendre son chapeau c'est vraiment très commode ! ",
                     "T'enrhumer tout entier, excepté le mistral ! ",
                     "c'est la Mer Rouge quand il saigne ! ",
                     "quelle enseigne ! ",
                     "êtes-vous un triton ? ",
                     "Naïf : ce monument, quand le visite-t-on ? ",
                     "C'est là ce qui s'appelle avoir pignon sur rue ! ",
                     "C'est queuqu'navet géant ou ben queuqu'melon nain ! ",
                     "pointez contre cavalerie ! ",
                     "Assurément, monsieur, ce sera le gros lot ! ",
                     "Le voilà donc ce nez qui des traits de son maître A détruit l'harmonie ! Il en rougit, le traître ! ",
                     "vous m'auriez dit Si vous aviez un peu de lettres et d'esprit : Mais d'esprit, ô le plus lamentable des êtres, Vous n'en eûtes jamais un atome, et de lettres Vous n'avez que les trois qui forment le mot : sot !",
                     "Me servir toutes ces folles plaisanteries,",
                     "car Je me les sers moi-même, avec assez de verve, Mais je ne permets pas qu'un autre me les serve.",
                 ] as $comment) {
            UserOpinion::create([
                'user_id' =>  User::all()->random()->id,
                'opinion_id' => Opinion::all()->random()->id,
                'comment' => $comment,
                'points' => rand(-1,1)
            ]);
        }
    }
}
