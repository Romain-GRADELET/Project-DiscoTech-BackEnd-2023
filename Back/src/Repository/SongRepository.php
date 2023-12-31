<?php

namespace App\Repository;

use App\Entity\Song;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Song>
 *
 * @method Song|null find($id, $lockMode = null, $lockVersion = null)
 * @method Song|null findOneBy(array $criteria, array $orderBy = null)
 * @method Song[]    findAll()
 * @method Song[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SongRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Song::class);
    }

    public function add(Song $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Song $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySongOrder($order = 'ASC')
    {     
        // Alias 's' for 'Song'
        $select = $this->createQueryBuilder('s');

        if ($order === 'ttlASC') {
            $select->orderBy('s.title', 'ASC');
        } elseif ($order === 'ttlDESC') {
            $select->orderBy('s.title', 'DESC');
        } elseif ($order === 'tNbASC') {
            $select->orderBy('s.trackNb', 'ASC');
        }elseif ($order === 'tNbDESC') {
            $select->orderBy('s.trackNb', 'DESC');
        }elseif ($order === 'drtASC') {
            $select->orderBy('s.duration', 'ASC');
        }elseif ($order === 'drtDESC') {
            $select->orderBy('s.duration', 'DESC');
        }

        return $select->getQuery()->getResult();
    }

    /**
     * Find Song by Search
     *
     * @param string $search
     * @return Song[]
     */
    public function findBySearch($search): array
    {
        // Alias 's' for 'Song'
        //dd($search);
        return $this->createQueryBuilder('s')
            // Where name like <search>
            ->andWhere('s.title LIKE :search')
            ->setParameter('search', '%' .$search. '%')
            ->orderBy("s.title", "ASC")
            ->getQuery()
            ->getResult();

    }




//    /**
//     * @return Song[] Returns an array of Song objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Song
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
