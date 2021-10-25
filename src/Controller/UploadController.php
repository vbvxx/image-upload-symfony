<?php
// src/Controller/UploadController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\FileUploader;
use Symfony\Component\Routing\Annotation\Route;

class UploadController extends AbstractController
{
    /**
     * @Route("/upload", methods={"POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
      $photo = $request->files->get('photo');
      $photoName = $fileUploader->upload($photo);
      return $this->json(['photoName' => $photoName]);
    }
}
