<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(
        private ArticleRepository $articleRepository,
        private ArticleCrudController $articleCrudController
    ){}

    public function test(ManagerRegistry $registry): Response
    {
        //A FINIR !!!!
        $articles = $this->articleCrudController->index($this->articleRepository);
        //$articles = $this->articleRepository->findAll();

        return $this->render('main.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/form', name: 'form')]
    public function form(): Response
    {
        // Redirection vers la page form
        return $this->render('form.html.twig');
    }
}