<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Song;
use App\Entity\Style;
use App\Entity\Support;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    /**
     * Create Data
     *
     * @param ObjectManager $manager Equivalent à l'EntityManager
     */
    public function load(ObjectManager $manager): void
    {

        $faker = \Faker\Factory::create();

        // =======================================================
        // TODO : Make 2 users (ADMIN + USER profile)
        // =======================================================
        $admin = new User();
        $admin->setEmail("admin@admin.com");
        // * on donne le mot de passe hashé
        // mdp : admin
        $admin->setPassword('$2y$13$ZdKTqUsVIggw9REUVSBTn.nwh.YjS8TKqlTme3sTi96HhziHxOfhO');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setFirstname("admin");
        $admin->setLastname("admin");
        $admin->setAvatar("");

        $manager->persist($admin);

        $user = new User();
        $user->setEmail("user@user.com");
        // * on donne le mot de passe hashé
        // mdp : user
        $user->setPassword('$2y$13$LU7xmAHYLxg9cWqkshuUHOJUBZH7vDHKA/wENstwKu8rtwyUJgBRy');
        $user->setRoles(['ROLE_USER']);
        $user->setFirstname("user");
        $user->setLastname("user");
        $user->setAvatar("");

        $manager->persist($user);

        // =======================================================
        // TODO : make STYLES
        // =======================================================
        $styles = [
            "Rock", 
            "Rap", 
            "Electro", 
            "House", 
            "Classique", 
            "pop"
        ];

        $stylesImage = [
            "https://images7.alphacoders.com/436/436860.jpg", 
            "https://www.shutterstock.com/image-vector/vector-logo-rap-music-hand-260nw-1365427319.jpg", 
            "https://i.pinimg.com/originals/89/db/9e/89db9ef44ae03b94b8414fb4fd9ed4ce.png",            
            "https://i1.sndcdn.com/artworks-HrSbRlsIqq2FJJqI-kIAvCg-t500x500.jpg", 
            "https://www.gigslutz.co.uk/wp-content/uploads/2022/11/How-to-Understand-and-Appreciate-Classical-Music.jpg", 
            "https://toutelaculture.com/wp-content/uploads/2013/06/decoratzia.com_-600x600.jpg"
        ];

        /** @var Style[] $allStyle */
        $allStyle = [];

        for($i=1 ; $i < count($styles); $i++){

            $newStyle = new Style();

            $newStyle->setName($styles[$i]);
            $newStyle->setImage($stylesImage[$i]);

            $manager->persist($newStyle);

            $allStyle[]= $newStyle;
        }

        // =======================================================
        // TODO : make SUPPORT
        // =======================================================
        $support = [
            "CD", 
            "Cassette", 
            "Vinyl"
        ];

        /** @var Support $allSupport */
        $allSupport = [];

        foreach ($support as $supportName) {
            
            $newSupport = new Support();

            $newSupport->setName($supportName);
            
            $manager->persist($newSupport);

            $allSupport[]=$newSupport;
        }

        // =======================================================
        // TODO : make ARTIST (50 Artists)
        // =======================================================

        /** @var Artist $allArtist */
        $allArtist = [];

        for ($i=1; $i <= 30 ; $i+1) {
            $newArtist = new Artist();
            $newArtist->setFullname($faker->name);

            $manager->persist($newArtist);

            $allArtist[] = $newArtist;
        }

        // =======================================================
        // TODO : make ALBUM (30 albums)
        // =======================================================

        /** @var Album $allAlbum */
        $allAlbum = [];

        for($i=1; $i <= 30 ; $i++){
            $newAlbum = new Album();

            $newAlbum->setName($faker->sentence(3));
            $newAlbum->setEdition($faker->sentence(1));
            $newAlbum->setReleaseDate(new DateTime($faker->date("Y-m-d")));
            $newAlbum->setCreatedAt(new DateTime("now"));
            $newAlbum->setImage($faker->imageUrl(300, 300, "music"));

            $manager->persist($newAlbum);

            $allAlbum[] = $newAlbum;
        }

        // =======================================================
        // TODO : make SONG
        // =======================================================

        /** @var Song $allSong */
        $allsong = [];

        foreach($allAlbum as $album) {

            for ($i=1; $i <= 10 ; $i++) {
                $newSong = new Song();

                $newSong->setTitle($faker->sentence(min(2), max(6)));
                $newSong->setDuration($faker->numberBetween(180000, 300000));
                $newSong->setTrackNb($i);

                $manager->persist($newSong);

            };
        }

        $manager->flush();
    }
}
