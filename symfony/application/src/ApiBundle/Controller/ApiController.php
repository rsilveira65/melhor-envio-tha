<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Call;
use ApiBundle\Entity\CityCode;
use ApiBundle\Entity\Plan;
use ApiBundle\Service\Normalize\CallNormalizer;
use ApiBundle\Service\Strategy\PlanRateCalculation;
use ApiBundle\Service\Strategy\RateCalculation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class ApiController
 * @Route("/")
 *
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Controller
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/calculate", name="api_calculate")
     * @Method("GET")
     */
    public function calculateAction() : JsonResponse
    {
        try {
            dump('here');die;

        } catch (\Exception $ex) {
            return $this->createResponse($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}