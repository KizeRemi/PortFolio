<?php
namespace PortFolioBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MessageRepository extends EntityRepository
{
	public function hasSend($email){
		$query = $this->createQueryBuilder('m')
				->select('m')
				->where('m.email = :email')
				->andWhere('m.hasSeen = 0')
				->setParameter('email', $email)
				->getQuery();
		return $query->getOneOrNullResult();
	}

	public function getMessagesNotSeen(){
		$query = $this->createQueryBuilder('m')
				->select('m')
				->where('m.hasSeen = 0')
				->getQuery();
		return $query->getResult();	
	}
}