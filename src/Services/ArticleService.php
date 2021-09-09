<?php 
namespace App\Services;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService
{
    private $_entityManager = [];
    private $_listeArticle = [];

    function __construct(EntityManagerInterface $em)
    {
        $this->_entityManager = $em;
        $this->_listeArticle = $this->_entityManager->getRepository(Article::class)->findAll();
    }
    
function getList()
    {
        return $this->_listeArticle;
    }
    function addArticle($pArticle)
    {
        array_push($this->_listeArticle,$pArticle);
        $this->_entityManager->persist($pArticle);
        $this->_entityManager->flush();
    }
    public function getArticle($pId)
    {
         $find = false;
         $article = $this->_entityManager->getRepository(Article::class)->find($pId);
         if (isset($article))
             $find = true;
         return  ['found'=>$find,'article'=>$article];
     }
     public function delArticle($pId)
    {
        $article = $this->getArticle($pId);
        if ($article['found']== true)
        {
            $this->_entityManager->remove($article['article']);
            $this->_entityManager->flush();
        }
        
    }
    
}