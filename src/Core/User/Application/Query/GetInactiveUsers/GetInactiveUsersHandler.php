<?php

namespace App\Core\User\Application\Query\GetInactiveUsers;

use App\Core\User\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetInactiveUsersHandler
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {}

    public function __invoke(GetInactiveUsersQuery $query): array
    {
        return $this->entityManager->createQueryBuilder()
            ->select('u.email')
            ->from('App\Core\User\Domain\User', 'u')
            ->where('u.isActive = :isActive')
            ->setParameter('isActive', false)
            ->getQuery()
            ->getSingleColumnResult();
    }
}
