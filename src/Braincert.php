<?php

namespace Stephenjude\Braincert;

use Stephenjude\Braincert\Http\BraincertHttpClient;

/**
 * Class Braincert
 * @package Stephenjude\Braincert
 */
class Braincert extends BraincertHttpClient
{
    /**
     * @param array $params
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function scheduleClass(array $params)
    {
        $response = $this->http('schedule', $params);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param array $params
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function listScheduledClasses(array $params = [])
    {
        $response = $this->http('listclass', $params);

        $this->thowExeptionIfError($response);

        return $response->json('classes');
    }

    /**
     * @param int $classId
     * @return mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function getScheduledClassById($classId)
    {
        $classes = $this->listScheduledClasses();

        return collect($classes)->firstWhere('id', $classId);
    }

    /**
     * @param array $param
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function getScheduledClassUrlById(array $param)
    {
        $response = $this->http('getclasslaunch', $param);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param int $classId
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function deleteScheduledClass($classId)
    {
        $param = ['cid' => $classId];

        $response = $this->http('removeclass', $param);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param int $classId
     * @param int $cancelType
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function cancelScheduledClass($classId, $cancelType = 1)
    {
        $response = $this->http('removeclass', [
            'class_id' => $classId,
            'isCancel' => $cancelType,
        ]);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param array $param
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function scheduledClassReport(array $param)
    {
        $response = $this->http('getclassreport', $param);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param int $classId
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function listRemainingAttendees($classId)
    {
        $response = $this->http('availableAttendees', [
            'class_id' => $classId,
        ]);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param array $param
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function createPricingScheme(array $param)
    {
        $response = $this->http('addSchemes', $param);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param $classId
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function listPricingSchemes($classId)
    {
        $response = $this->http('listSchemes', [
            'class_id' => $classId,
        ]);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param array $param
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function createClassDiscount(array $param)
    {
        $response = $this->http('addSpecials', $param);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param $classId
     * @param null $search
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function listClassDiscount($classId, $search = null)
    {
        $response = $this->http('listdiscount', [
            'class_id' => $classId,
            'search' => $search ?? '',
        ]);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param int $discountId
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function removeClassDiscount($discountId)
    {
        $response = $this->http('removediscount', [
            'discount_id' => $discountId,
        ]);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param int $classId
     * @param string $discountCode
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function applyClassDiscountCoupon($classId, $discountCode)
    {
        $response = $this->http('applycoupon', [
            'class_id' => $classId,
            'discount_code' => $discountCode,
        ]);

        $this->thowExeptionIfError($response);

        return $response->json();
    }

    /**
     * @param array $param
     * @return array|mixed
     * @throws Exceptions\BrainCertHttpException
     */
    public function chargeClassPayment(array $param)
    {
        $response = $this->http('apiclasspayment', $param);

        $this->thowExeptionIfError($response);

        return $response->json();
    }
}
