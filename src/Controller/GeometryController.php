<?php
namespace App\Controller;

use Exception;
use App\Model\Circle;
use App\Model\Triangle;
use App\Service\GeometryService;
use App\Service\ValidateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class GeometryController extends AbstractController
{    
    public function __construct()
    {

    }

    #[Route('/circle/{radius}', methods: ['GET'])]
    public function circle(mixed $radius): JsonResponse
    {
        try{
            [$radius] = ValidateService::tryValidGeometryValues($radius);
            $shape = new Circle($radius);
            return $this->json(
                $shape->calculate(),
            );
        } catch (Exception $e){
            return $this->json($e->getMessage(), 400);
        }
    }

    #[Route('/triangle/{a}/{b}/{c}', methods: ['GET'])]    
    public function triangle(float $a, float $b, float $c): JsonResponse
    {
        try{
            [$a, $b, $c] = ValidateService::tryValidGeometryValues($a, $b, $c);
            $shape = new Triangle($a, $b, $c);
            return $this->json(
                $shape->calculate(),
            );
        } catch (Exception $e){
            return $this->json($e->getMessage(), 400);
        }
    }

    #[Route('/{any}', requirements: ['any' => '.*'])]
    public function notFoundAction(Request $request): Response
    {
        $msg = "<br>I am Manric Vilegas. <br> Please read Readme.md file. <br> Please notify me if there are any other assessments associated with this URL.";
        return new Response('<h1>Route Not Found : '. $request->getUri()."<br>".$msg."</h1>", 400);
    }
}