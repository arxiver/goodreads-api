<?php

use Illuminate\Database\Seeder;
use App\Book;
use Faker\Generator as Faker;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $Create = array(
            'title' => "The Bird King",
            'isbn' => 9780802129031,
            'img_url' =>"https://i5.walmartimages.com/asr/8bae6257-b3ed-43ba-b5d4-c55b6479697f_1.c6a36804e0a9cbfd0e408a4b96f8a94e.jpeg?odnHeight=560&odnWidth=560&odnBg=FFFFFF",
            'publication_date'=> "2014-01-31",
            'publisher' => str_random(10),
            'language' => "English",
            'description' => "New from the award-winning author of Alif the Unseen and writer of the Ms. Marvel series, G. Willow Wilson
             Set in 1491 during the reign of the last sultanate in the Iberian peninsula, 
             The Bird King is the story of Fatima, the only remaining Circassian concubine to the sultan, and her dearest friend Hassan, the palace mapmaker. 
              Hassan has a secret--he can draw maps of places he's never seen and bend the shape of reality.
              When representatives of the newly formed Spanish monarchy arrive to negotiate the sultan's surrender, Fatima befriends one of the women, not realizing that she will see Hassan's gift as sorcery and a threat to Christian Spanish rule. With their freedoms at stake,
               what will Fatima risk to save Hassan and escape the palace walls? As Fatima and Hassan traverse Spain with the help of a clever jinn to find safety, The Bird King asks us to consider what love is and the price of freedom at a time when the West and the Muslim world were not yet separate. ",
            'author_id' => 1
        );
        Book::create($Create);

        $Create2 = array(
            'title' => "Sherwood",
            'isbn' => 9780062422330,
            'img_url' =>"https://kbimages1-a.akamaihd.net/6954f4cc-6e4e-46e3-8bc2-81b93f57a723/353/569/90/False/sherwood-7.jpg",
            'publication_date'=>"2014-01-31",
            'publisher' => str_random(10),
            'language' => "English",
            'description' => "Robin of Locksley is dead.
            Maid Marian doesn’t know how she’ll go on, but the people of Locksley town, persecuted by the Sheriff of Nottingham, need a protector. And the dreadful Guy of Gisborne, the Sheriff’s right hand, wishes to step into Robin’s shoes as Lord of Locksley and Marian’s fiancé.
            Who is there to stop them?
            Marian never meant to tread in Robin’s footsteps—never intended to stand as a beacon of hope to those awaiting his triumphant return. But with a sweep of his green cloak and the flash of her sword, Marian makes the choice to become her own hero: Robin Hood. ",
            'author_id' => 2
        );
        Book::create($Create2);
       
        $Create3 = array(
            'title' => "Once & Future",
            'isbn' => 9780316449274,
            'img_url' =>"https://images-na.ssl-images-amazon.com/images/I/51Jb2iLFuXL._SX329_BO1,204,203,200_.jpg",
            'publication_date'=> "2014-01-31",
            'publisher' => str_random(10),
            'language' => "English",
            'description' => "I’ve been chased my whole life. As a fugitive refugee in the territory controlled by the tyrannical Mercer corporation, I’ve always had to hide who I am. Until I found Excalibur.
            Now I’m done hiding.
            My name is Ari Helix. I have a magic sword, a cranky wizard, and a revolution to start.   
            When Ari crash-lands on Old Earth and pulls a magic sword from its ancient resting place, she is revealed to be the newest reincarnation of King Arthur. Then she meets Merlin, who has aged backward over the centuries into a teenager, and together they must break the curse that keeps Arthur coming back. Their quest? Defeat the cruel, oppressive government and bring peace and equality to all humankind.",
            'author_id' => 3
        );
        Book::create($Create3);


        $Create4 = array(
            'title' => "Internment",
            'isbn' => 9780349003344,
            'img_url' =>"https://r.wheelers.co/bk/small/978034/9780349003344.jpg",
            'publication_date'=> "2014-01-31",
            'publisher' => str_random(10),
            'language' => "English",
            'description' => "Rebellions are built on hope.
            Set in a horrifying near-future United States, seventeen-year-old Layla Amin and her parents are forced into an internment camp for Muslim American citizens.
            With the help of newly made friends also trapped within the internment camp, her boyfriend on the outside, and an unexpected alliance, Layla begins a journey to fight for freedom, leading a revolution against the internment camp's Director and his guards.
            Heart-racing and emotional, Internment challenges readers to fight complicit silence that exists in our society today.",
            'author_id' => 4
        );
        Book::create($Create4);
    }
}
