<?php

namespace ApiBundle\Controller;

use ApiBundle\Service\Request\ProductHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @Route("/pack", name="api_pack")
     * @Method("POST")
     * @return JsonResponse
     */
    public function packAction(Request $request) : JsonResponse
    {
        try {
            /** @var ProductHandler $productHandler */
            $productHandler = $this->get('api.product_handler');

            $products = $productHandler
                            ->setRequest($request)
                            ->parseProductsFromRequest();

            dump($products);die;

        } catch (\Exception $ex) {
            return $this->createResponse($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}