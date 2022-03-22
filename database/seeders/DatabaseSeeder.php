<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\fac;

use  App\Models\User;
use App\Models\TypeProbleme;
use App\Models\Commentaire;
use App\Models\Competence;
use App\Models\Intervention;
use App\Models\Personnel;
use App\Models\Specialiste;
use App\Models\Ticket;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
     $user1 =  User::create([
           "name" => "admin",
           "email" => "admin@admin.com",
           "password" => Hash::make("admin"),
           'role'=> 'spec'
       ]);

   

       TypeProbleme::create([
           "libelle_tpb" => "Problème logiciel"
       ]);


        TypeProbleme::create([
           "libelle_tpb" => "Problème matériel"
       ]);


       TypeProbleme::create([
        "libelle_tpb" => "Problème utilisateur"
        ]);



        $user2 =   User::create([
            "name" => "JeanLumine",
            "email" => "jlumine@pers.com",
            "password" => Hash::make("123"),
        ]);

        $user3 = User::create([
            "name" => "AutreJean",
            "email" => "jautre@pers.com",
            "password" => Hash::make("123"),
        ]);

       
        $user4 = User::create([
            "name" => "Uzless",
            "email" => "uuzless@pers.com",
            "password" => Hash::make("123"),
        ]);


        $user5 = User::create([
            "name" => "Nestérin",
            "email" => "nNestérin@pers.com",
            "password" => Hash::make("123"),
        ]);


       $jean1 = Personnel::create([
            "login_pers" => "JeanLumine",
            "password_pers" => Hash::make("123")
        ]);
    
        $user2->personel()->save($jean1);

        $jean2 =  Personnel::create([
            "login_pers" => "Uzless",
            "password_pers" => Hash::make("123")
        ]);
        $user4->personel()->save($jean2);
        
        $jean3 =  Personnel::create([
            "login_pers" => "Nestérin",
            "password_pers" => Hash::make("123")
        ]);

        $user5->personel()->save($jean3);

        $jean4 = Personnel::create([
            "login_pers" => "AutreJean",
            "password_pers" => Hash::make("123")
        ]);

        $user3->personel()->save($jean4);

        $user6 = User::create([
            "name" => "RogerLePlusBO",
            "email" => "rroger@resp.com",
            "password" => Hash::make("123"),
            'role'=> 'resp'
        ]);

        $user7 =   User::create([
            "name" => "Rocko Balboii",
            "email" => "rbalboii@spec.com",
            "password" => Hash::make("123"),
            'role'=> 'spec'
        ]);

        $user8 = User::create([
            "name" => "Johnatan Rambi",
            "email" => "jRambi@spec.com",
            "password" => Hash::make("123"),
            'role'=> 'spec'
        ]);

   


        $billy1 = Specialiste::create([
           
            "login_spec"=> "admin",
            "password_spec"=> Hash::make("admin"),
            "responsable_spec" => true 
        ]);

        $user1->specialiste()->save($billy1);

        $billy2 = Specialiste::create([
            "id_user" => 3,
            "login_spec"=> "RogerLePlusBo",
            "password_spec"=> Hash::make("123"),
            "responsable_spec" => true 
        ]);

        $user6->specialiste()->save($billy2);
        $billy3 = Specialiste::create([
            "id_user" => 4,
            "login_spec"=> "Johnnatan Rambi",
            "password_spec"=> Hash::make("123"),
            "responsable_spec" => false 
        ]);

        $user7->specialiste()->save($billy3);

        $billy4 = Specialiste::create([
            "id_user" => 5,
            "login_spec"=> "Rocko Balboii",
            "password_spec"=> Hash::make("123"),
            "responsable_spec" => false 
        ]);
        $user8->specialiste()->save($billy4);

       


        Intervention::create([
            "id_spec" => 1,
            "date_inter" => Carbon::now(),
            "type_inter" => "Tkt fréro"
         ]);

         Ticket::create([
             "id_inter" => 1,
             "id_tpb" => 1,
             "id_pers" => 1,
             "date_tik" => Carbon::now(),
             "urgence_tik" => "URGENT!!!!",
             "poste_tik" => "245_24s",
             "desc_tik" => "Ces baraques ou on était, y a un gosse qui s’est pointé. Ce gosse il avait une boite pour cirer les pompes, il a dit « Chaussures s’il vous plaît ! Chaussures ! ». Moi j’ai dit non, puis il continuait à demander alors Joe à dit oui. Je suis allé chercher deux petites bières, et la boite est piégée. Il ouvre la boite et son corps explose en morceau dans toute la pièce ! Il est étendue, il hurle à la mort. J’ai des bouts de chair partout sur moi ! Comme ça ! J’ai du enlever les morceaux vous savez, ma veste était couverte de mon ami ! Du sang et tout ! J’essaie de remettre tout en place mais son ventre s’ouvre et ses entrailles me tombent dessus ! Y avait personne pour nous aider ! J’étais perdu, et il se met à crier : « J’veux rentrer chez moi ! J’veux rentrer chez moi ! ». Il s’arrêtait plus de crier : « J’veux rentrer chez moi ! J’veux conduire ma Chevrolet 58… » Mais j’arrivais pas à trouver ses jambes… j’arrive pas à trouver ses jambes ! J’peux pas sortir ça de ma tête, ça fait pourtant sept ans… Chaque jour j’y pense ! Je me réveille, j’sais plus ou je suis. Je parle plus à personne, des fois toute une journée, toute une semaine…",
             "precision_tik" => "C'est pas ma guerre",
             "etat_tik" => "Traité"
         ]);

         Commentaire::create([
             "id_inter" =>1,
             "content_com" => "Tu veux une guerre je te ferais une guerre. car c'étais PAS MA GUERRE !!!!"
         ]);
    
         $skill1= Competence::create([
             "id_comp"=>1,
             "libelle_comp" => "Professionnel Logiciel"
         ]);

        $skill2 =  Competence::create([
            "id_comp"=>2,
            "libelle_comp" => "Professionnel Matériel"
        ]);

        $skill3 =  Competence::create([
            "id_comp"=>3,
            "libelle_comp" => "Professionnel Utilisateur"
        ]);


        
        $billy1->competences()->attach($skill1->id_comp);
        $billy2->competences()->attach($skill2->id_comp);
        $billy3->competences()->attach($skill1->id_comp);
        $billy3->competences()->attach($skill2->id_comp);
        $billy3->competences()->attach($skill3->id_comp);
    
       
       
        // \App\Models\User::factory(10)->create();
    }
}
