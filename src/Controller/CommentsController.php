<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentsType;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentsController extends AbstractController
{
    #[Route('/comments', name: 'app_comments')]
    public function index(CommentRepository $repoComments, Request $request, EntityManagerInterface $em): Response
    {
        $comments = $repoComments->findBy (['isValid' => true], ['stars' => 'DESC']);
    
        $commentForm = new Comment();

        $form = $this->createForm(CommentsType::class, $commentForm);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentForm->setIsValid(false);
            $em->persist($commentForm);
            $em->flush();
        }

        if ($request->isXmlHttpRequest()){
            if ($form->isSubmitted() && !$form->isValid()) {

                return new JsonResponse([
                    'success' => false,
                    'content' => $this->renderView('comments/form.html.twig', [
                        'form' => $form->createView(),
                    ]),
                ]);
            }



            return new JsonResponse([
                'success' => true,
                'UrlRedirect' => $this->generateUrl('app_comments'),
            ]);
        }
    

        return $this->render('comments/index.html.twig', [
            'form' => $form->createView(),
            'comments' => $comments,
        ]);
    }
}