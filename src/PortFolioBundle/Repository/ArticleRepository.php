<?php
namespace PortFolioBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
	public function getLastArticle(){
		$query = $this->createQueryBuilder('a')
                ->select('a')
                ->setMaxResults(1)
				->orderBy('a.id', 'DESC');
		return $query->getQuery()->getSingleResult();
	}
}