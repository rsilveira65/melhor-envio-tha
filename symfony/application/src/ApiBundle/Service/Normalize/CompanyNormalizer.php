<?php
namespace ApiBundle\Service\Normalize;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Doctrine\Common\Annotations\AnnotationReader;

/**
 * Class CompanyNormalizer
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Service\Normalize
 */
class CompanyNormalizer
{
    private $serializer;

    /**
     * CallNormalizer constructor.
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizers = [new ObjectNormalizer($classMetadataFactory)];

        $this->serializer = new Serializer($normalizers, $encoders);
    }


    /**
     * @param array $companies
     * @param array $responseGroups
     * @return array|object|\Symfony\Component\Serializer\Normalizer\scalar
     */
    public function normalize(array $companies, array $responseGroups)
    {
        return $this->serializer->normalize($companies, null, $responseGroups);
    }
}