<?php

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
    ){}

    #[Route('/', name: 'main')]
    public function test(ManagerRegistry $registry): Response
    {
        $articles = $this->articleRepository->findAll();
        return $this->render('pages/main.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/article_item/{id}', name: 'article_item')]
    public function articleItem($id)
    {
        //dump($id); + die($id); = dd($id);

        $articleEntity = $this->articleRepository->find($id);

        return $this->render('pages/view_article.html.twig', [
            'articleEntity' => $articleEntity
        ]);
    }

    #[Route('/form', name: 'form')]
    public function form(): Response
    {
        // Redirection vers la page form
        return $this->render('pages/form.html.twig');
    }
}