<?php

namespace App\Controller;

use App\Services\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(ArticleService $articleService): Response
    {   
        $listeArticle = $articleService->getList();
        return $this->render('article/liste.html.twig', [
            'controller_name' => 'ArticleController',
            'listeArticle'=>$listeArticle,
        ]);
    }
    /**
     * @Route("/article/{pId}", "articleID")
     */

    public function show($pId, ArticleService $articleService): Response
    {
        $article = $articleService->getArticle($pId);
        return $this->render('article/article.html.twig',['article' => $article['article']]);
    }
}
