<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Company;
use ApiBundle\Service\Factory\PackageFactory;
use ApiBundle\Service\Normalize\CompanyNormalizer;
use ApiBundle\Service\Request\ProductHandler;
use ApiBundle\Service\Strategy\PackStrategy;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Doctrine\Common\Annotations\AnnotationReader;



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

            /** @var PackStrategy $packStrategy */
            $packStrategy  = $this->get('api.pack_strategy');

            /** @var CompanyNormalizer $companyNormalizer */
            $companyNormalizer  = $this->get('api.company_normalizer');

            $products = $productHandler
                            ->setRequest($request)
                            ->parseProductsFromRequest();

            $companies = $this->getCompanies();

            /** @var Company $company */
            foreach ($companies as $company) {
                $packStrategy->setCompany($company);

                $company->addPackages(PackageFactory::create($products, $packStrategy));
            }

            return $this->createResponse(
                $companyNormalizer
                    ->normalize(
                        $companies,
                        [
                            'groups' => ['ApiResponse']
                        ]
                    ),
                Response::HTTP_OK
            );

        } catch (\Exception $ex) {
            return $this->createResponse($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}